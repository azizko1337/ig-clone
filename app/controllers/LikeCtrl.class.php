<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use PDOException;
use app\forms\SearchProfileForm;

class LikeCtrl
{
    private $user_id;
    private $post_id;

    private function getParams(){
        $this->post_id = ParamUtils::getFromRequest('post_id');
        $this->user_id = SessionUtils::load("id", true);
    }

    private function isPostLiked(){
        try{
            $like = App::getDB()->count("likes", [
                "user_id" => $this->user_id,
                "post_id" => $this->post_id
            ]);
            return $like >= 1;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie wiadomo czy post jest polubiony");
            return false;
        }
    }

    private function likePost(){
        try{
            App::getDB()->insert("likes", [
                "user_id" => $this->user_id,
                "post_id" => $this->post_id
            ]);
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie oddano polubienia");
        }
    }

    private function unlikePost(){
        try{
            App::getDB()->delete("likes", [
                "user_id" => $this->user_id,
                "post_id" => $this->post_id
            ]);
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie usunięto polubienia");
        }
    }

    private function getPostLikes(){
        try{
            return App::getDB()->count("likes", ["post_id" => $this->post_id]);
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie wczytano polubień");
            return 0;
        }
    }

    private function getPostComments(){
        try{
            return App::getDB()->count("comments", ["post_id" => $this->post_id]);
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie wczytano komentarzy");
            return 0;
        }
    }

    public function action_like(){
        $this->getParams();
        $isPostLiked = $this->isPostLiked();
        if($isPostLiked){
            $this->unlikePost();
        }else{
            $this->likePost();
        }

        $likes = $this->getPostLikes();
        $comments = $this->getPostComments();

        $response = array("liked" => !$isPostLiked, "likes" => $likes, "comments" => $comments);
        header('Content-type: application/json');
        echo json_encode($response);
        exit();
    }
}