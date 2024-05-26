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

            //users who logged user doesnt follow
            $followed_users = App::getDB()->select("follows", "@followed_user_id", [
                "following_user_id" => SessionUtils::load("id", true)
            ]);

            //add myself to followed_users to prevent displaying me
            $followed_users[] = SessionUtils::load("id", true);

            if(count($followed_users)>0){
                $this->suggestions = App::getDB()->rand("users", ["nickname", "firstName", "lastName"], [
                    "id[!]" => $followed_users,
                    "LIMIT" => 7
                ]);
            }

        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd bazy danych, nie udało się pobrać sugerownych użytkowników");
            $this->suggestions = array();
        }
    }

    private function getPosts(){
        try{
            //we have to check if there ale followed users before (error occurs if not)
            if(App::getDB()->count("follows", "followed_user_id",  [
                "following_user_id" => SessionUtils::load("id", true)
            ])>0){

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
                        "LIMIT" => 10,
                        "ORDER" => [
                            "posts.createdAt" => "DESC"
                        ]
                    ]);

                //add likes, comments no and is_liked to each post
                for($i=0; $i<count($this->posts); $i++){
                    $this->posts[$i]["likes"] = App::getDB()->count("likes", ["post_id" => $this->posts[$i]["id"]]);
                    $this->posts[$i]["comments"] = App::getDB()->count("comments", ["post_id" => $this->posts[$i]["id"]]);
                    $this->posts[$i]["is_liked"] = App::getDB()->count("likes", ["post_id" => $this->posts[$i]["id"], "user_id" => SessionUtils::load("id", true)])>0;
                }

            }else{
                $this->posts = array();
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
