<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use PDOException;
use app\forms\PostEditForm;

class AddPostCtrl{

    private $form;

    public function __construct() {
        $this->form = new PostEditForm();
    }


    private function validate(): bool {
        $this->form->body = ParamUtils::getFromRequest('body');


        $v = new Validator();

        $v->validate($this->form->body,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Opis posta jest wymagany',
            'min_length' => 3,
            'max_length' => 300,
            'validator_message' => 'Post powinien zawierać od 3 do 300 znaków'
        ]);

        return !App::getMessages()->isError();
    }

    private function addPost(){
        try {
            App::getDB()->insert("posts", [
                "user_id" => SessionUtils::load("id", true),
                "body" => $this->form->body,
            ]);
            return true;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return false;
    }

    public function action_add_post_show() {
        $this->generateView();
    }
    public function action_add_post() {
        if($this->validate() && $this->addPost()){
            App::getRouter()->redirectTo("post");
        }
        $this->generateView();
    }

    public function generateView(){
        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->display("AddPost.tpl");
    }

}
