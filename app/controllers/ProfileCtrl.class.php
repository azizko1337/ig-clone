<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use PDOException;

class ProfileCtrl
{
    private $user;
    private $posts;

    public function __construct(){
        $user = array();
        $posts = array();
    }

    private function getParams(){
        $this->user["nickname"] = ParamUtils::getFromCleanURL(1, true, "Nie podano nazwy użytkownika");
    }

    private function validate(){
        try{
            return App::getDB()->has("users", ["nickname" => $this->user["nickname"]]);
        }
        catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return false;
    }

    private function getUser(){
        try{
            $this->user = App::getDB()->get("users", ["id", "nickname", "firstName", "lastName"], ["nickname" => $this->user["nickname"]]);
        }
        catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    private function getPosts(){
        try{
            $this->posts = App::getDB()->select("posts",
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
                    "user_id" => $this->user["id"],
                    "LIMIT" => 10
                ]);

            for($i=0; $i<count($this->posts); $i++){
                $this->posts[$i]["likes"] = App::getDB()->count("likes", ["post_id" => $this->posts[$i]["id"]]);
                $this->posts[$i]["comments"] = App::getDB()->count("comments", ["post_id" => $this->posts[$i]["id"]]);
            }
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function action_profile(){
        $this->getParams();
        if($this->validate()){
            $this->getUser();
            $this->getPosts();
        }else{
            Utils::addErrorMessage("Nie znaleziono użytkownika");
        }
        $this->generateView();
    }

    private function generateView(){
        App::getSmarty()->assign("user", $this->user);
        App::getSmarty()->assign("posts", $this->posts);

        App::getSmarty()->display("Profile.tpl");
    }
}