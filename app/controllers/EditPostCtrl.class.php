<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use Couchbase\Role;
use PDOException;
use app\forms\PostEditForm;

class EditPostCtrl{

    private $form;
    private $post_id;

    public function __construct() {
        $this->form = new PostEditForm();
    }

    private function getInitialFromDb(){
        try{
            $this->form->body = App::getDB()->get("posts", ["body"], ["id"=>$this->post_id])["body"];
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    private function getParams(){
        $this->form->body = ParamUtils::getFromRequest("body", false);
        $this->post_id = ParamUtils::getFromCleanURL(1, true, "Brakuje informacji o poście");
    }

    private function validate(): bool {
        $v = new Validator();

        $v->validate($this->form->body,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Opis posta jest wymagany',
            'min_length' => 3,
            'max_length' => 300,
            'validator_message' => 'Post powinien zawierać od 3 do 300 znaków'
        ]);

        if (App::getMessages()->isError()) return false;

        try{
            if(App::getDB()->count("posts", ["id" => $this->post_id]) == 1){
                return true;
            }
            Utils::addErrorMessage("Nie znaleziono postu");
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return false;
    }

    private function checkEditPermissions(){
        try{
            if(App::getDB()->get("posts", ["user_id"],["id" => $this->post_id])["user_id"] == SessionUtils::load("id", true)){
                return true;
            }
            Utils::addErrorMessage("Brak uprawnień do edytowania postu");
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return false;
    }

    private function checkDeletePermissions(){
        try{
            if(RoleUtils::inRole("moderator") || App::getDB()->get("posts", ["user_id"],["id" => $this->post_id])["user_id"] == SessionUtils::load("id", true)){
                return true;
            }
            Utils::addErrorMessage("Brak uprawnień do usunięcia postu");
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return false;
    }

    private function editPost(){
        try {
            App::getDB()->update("posts",[
                "body" => $this->form->body,
                "updatedAt" => time()
            ], [
                "id" => $this->post_id
            ]);
            Utils::addInfoMessage("Edytowano post");
            return true;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return false;
    }

    private function deletePost(){
        try {
            App::getDB()->delete("posts", [
                "id" => $this->post_id
            ]);
            Utils::addInfoMessage("Usunięto post");
            return true;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return false;
    }

    public function action_edit_post_show() {
        $this->getParams();
        $this->getInitialFromDb();
        $this->generateView();
    }
    public function action_edit_post() {
        $this->getParams();
        if($this->validate() && $this->checkEditPermissions()){
            $this->editPost();
        }
        $this->generateView();

    }
    public function action_delete_post(){
        $this->getParams();
        if($this->checkDeletePermissions()){
            if($this->deletePost()){
                App::getRouter()->forwardTo("index");
            }
        }
        $this->generateView();
    }

    public function generateView(){
        App::getSmarty()->assign("post_id", $this->post_id);
        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->display("EditPost.tpl");
    }

}
