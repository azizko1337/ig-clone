<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\Utils;
use core\SessionUtils;
use \PDOException;

class FeedCtrl {
    private $posts;
    private $page;
    private $size = 2;

    private function getPage(){
        $this->page = ParamUtils::getFromCleanURL(1, false);
    }

    private function validate(){
        return is_numeric($this->page);
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
                        "LIMIT" => [($this->size*$this->page), $this->size],
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

    public function action_feed() {
        $this->getPage();
        if($this->validate()){
            $this->getPosts();
        }
        $this->generateView();
    }

    public function generateView(){
        App::getSmarty()->assign("posts", $this->posts);
        App::getSmarty()->display("components/Feed.tpl");
    }

}
