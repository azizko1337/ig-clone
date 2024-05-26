<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use PDOException;
use app\forms\SearchProfileForm;

class FollowCtrl
{
    private $following_user_id;
    private $followed_user_id;

    private function getParams(){
        $this->following_user_id = SessionUtils::load("id", true);
        $this->followed_user_id = ParamUtils::getFromRequest('user_id');
    }

    private function isUserFollowed(){
        try{
            $follow = App::getDB()->count("follows", [
                "following_user_id" => $this->following_user_id,
                "followed_user_id" => $this->followed_user_id
            ]);
            return $follow >= 1;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie wiadomo czy użytkownik jest śledzony");
            return false;
        }
    }

    private function followUser(){
        try{
            App::getDB()->insert("follows", [
                "following_user_id" => $this->following_user_id,
                "followed_user_id" => $this->followed_user_id
            ]);
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie dodano followa");
        }
    }

    private function unfollowUser(){
        try{
            App::getDB()->delete("follows", [
                "following_user_id" => $this->following_user_id,
                "followed_user_id" => $this->followed_user_id
            ]);
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych, nie usunięto followa");
        }
    }

    public function action_follow(){
        $this->getParams();

        $isUserFollowed = $this->isUserFollowed();
        if($isUserFollowed){
            $this->unfollowUser();
        }else{
            $this->followUser();
        }

        $response = array("followed" => !$isUserFollowed);
        header('Content-type: application/json');
        echo json_encode($response);
        exit();
    }
}