<?php

namespace app\controllers;

use core\App;
use core\Messages;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use PDOException;
use app\forms\PostEditForm;
use app\forms\CommentEditForm;

class CommentCtrl{
    private $post;
    private $comments;
    private $user_id;
    private $post_id;
    private $form;
    private $comment_id;

    public function __construct(){
        $this->form = new CommentEditForm();
    }

    private function getParams(){
        $this->user_id = SessionUtils::load("id", true);
        $this->post_id = ParamUtils::getFromCleanURL(1, true, "Brak informacji o poście");
        $this->comment_id =  ParamUtils::getFromCleanURL(2, false);
        $this->form->body = ParamUtils::getFromRequest("body");
        return !App::getMessages()->isError();
    }

    private function getPost(){
        try{
            $this->post = App::getDB()->get("posts",
                [
                    "[>]users" => ["user_id" => "id"]
                ],
                [
                    "posts.id",
                    "user_id",
                    "body",
                    "nickname",
                    "posts.createdAt"
                ], [
                    "posts.id" => $this->post_id,
                ]
            );

            $this->post["likes"] = App::getDB()->count("likes", ["post_id" => $this->post_id]);
            $this->post["comments"] = App::getDB()->count("comments", ["post_id" => $this->post_id]);
            $this->post["is_liked"] = App::getDB()->count("likes", ["post_id" => $this->post_id, "user_id" => $this->user_id])>0;
        }
        catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie można pobrać postu");
        }
    }
    private function getComments(){
        try{
            $this->comments = App::getDB()->select("comments",
                [
                    "[>]users" => ["user_id" => "id"]
                ],
                [
                    "comments.id",
                    "user_id",
                    "body",
                    "nickname",
                    "comments.createdAt"
                ], [
                    "post_id" => $this->post_id,
                    "ORDER" => [
                        "comments.createdAt" => "DESC"
                    ]
                ]);
            if(!$this->comments) $this->comments = array();
        }
        catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie można pobrać komentarzy");
        }
    }

    private function validateAdd(){
        $v = new Validator();

        $v->validate($this->form->body,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Treść komentarza jest wymagana',
            'min_length' => 1,
            'max_length' => 200,
            'validator_message' => 'Komentarz powinien zawierać od 1 do 200 znaków'
        ]);

        return !App::getMessages()->isError();
    }

    private function validateDelete(){
        try{
            return App::getDB()->count("comments", [
                "id" => $this->comment_id,
                "post_id" => $this->post_id
            ]) >= 1;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie udało się znaleźć komentarza");
            return false;
        }
    }
    private function checkPermissionToDelete(){
        try{
            if(App::getDB()->get("comments", ["user_id"], [
                    "id" => $this->comment_id,
                    "post_id" => $this->post_id
                ])["user_id"] == $this->user_id || RoleUtils::inRole("moderator")) return true;
            Utils::addErrorMessage("Nie masz uprawnień, aby usunąć ten komentarz");
            return false;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie udało się sprawdzić uprawnień");
            return false;
        }
    }

    private function deleteComment(){
        try{
            App::getDB()->delete("comments", [
                "id" => $this->comment_id,
            ]);
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie udało się usunąć komentarza");
        }
    }

    private function addComment(){
        try{
            App::getDB()->insert("comments", [
                "user_id" => $this->user_id,
                "post_id" => $this->post_id,
                "body" => $this->form->body
            ]);
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie udało się dodać komentarza");
        }
    }

    public function action_comment_delete(){
        $this->getParams();
        $this->getPost();

        if($this->validateDelete() && $this->checkPermissionToDelete()){
            $this->deleteComment();
            Utils::addInfoMessage("Usunięto komentarz");
        }

        $this->getComments();
        $this->generateView();
    }

    public function action_comment_show(){
        $this->getParams();
        $this->getPost();
        $this->getComments();
        $this->generateView();
    }

    public function action_comment_add(){
        $this->getParams();
        $this->getPost();
        if(!App::getMessages()->isError() && $this->validateAdd()){
            $this->addComment();
        }

        $this->getComments();
        $this->generateView();
    }

    private function generateView(){
        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->assign("posts", array($this->post));
        App::getSmarty()->assign("comments", $this->comments);
        App::getSmarty()->display("Comment.tpl");
    }
}