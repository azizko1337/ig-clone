<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\SessionUtils;
use \PDOException;

class IndexCtrl {
    private $suggestions;
    private $posts;

    private function getSuggestions(){
        try{
            //random users different from logged user
//            $this->suggestions = App::getDB()->rand("users", ["nickname", "firstName", "lastName"], ["id[!]" => SessionUtils::load("id", true), "LIMIT" => 7]);
            $followed_users = App::getDB()->select("follows", ["followed_user_id"], [
                "following_user_id[!]" => SessionUtils::load("id", true)
            ]);
            $followed_users = array_map(function($e){
                return $e["followed_user_id"];
            }, $followed_users);

            //users who logged user doesnt follow
            $this->suggestions = App::getDB()->rand("users", ["nickname", "firstName", "lastName"], [
                "id[!]" => $followed_users,
                "LIMIT" => 7
            ]);
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd bazy danych, nie udało się pobrać sugerownych użytkowników");
            $this->suggestions = array();
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
                    "user_id" => App::getDB()->select("follows", "followed_user_id",  [
                        "following_user_id" => SessionUtils::load("id", true)
                    ]),
                    "LIMIT" => 10
                ]);

            //add likes and comments no to each post
            for($i=0; $i<count($this->posts); $i++){
                $this->posts[$i]["likes"] = App::getDB()->count("likes", ["post_id" => $this->posts[$i]["id"]]);
                $this->posts[$i]["comments"] = App::getDB()->count("comments", ["post_id" => $this->posts[$i]["id"]]);
                $this->posts[$i]["is_liked"] = App::getDB()->count("likes", ["post_id" => $this->posts[$i]["id"], "user_id" => SessionUtils::load("id", true)])>0;
            }


        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd bazy danych, nie udało się pobrać postów");
        }
    }

    public function action_index() {
        $this->getSuggestions();
        $this->getPosts();
        $this->generateView();
    }

    public function generateView(){
        App::getSmarty()->assign("suggestions", $this->suggestions);
        App::getSmarty()->assign("posts", $this->posts);
        App::getSmarty()->assign("user", array(
            "id" => SessionUtils::load("id", true),
            "nickname" => SessionUtils::load("nickname", true),
            "firstName" => SessionUtils::load("firstName", true),
            "lastName" => SessionUtils::load("lastName", true),
        ));

        App::getSmarty()->display("Index.tpl");
    }

}
