<?php

namespace app\controllers\auth;

use app\forms\auth\UserForm;
use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use MongoDB\Driver\Session;
use PDOException;

class UserCtrl {

    private $form;
    private $user_data;

    public function __construct() {
        $this->form = new UserForm();
        $this->user_data = array();
    }

    private function getInitialFromDb(){
        try{
            $this->user_data = App::getDB()->get("users", ["nickname", "firstName", "lastName", "email"], ["id"=>SessionUtils::load("id", true)]);

            $this->form->nickname = $this->user_data["nickname"];
            $this->form->firstName = $this->user_data["firstName"];
            $this->form->lastName = $this->user_data["lastName"];
            $this->form->email = $this->user_data["email"];
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function validate(): bool {
        $this->form->nickname = ParamUtils::getFromRequest('nickname');
        $this->form->firstName = ParamUtils::getFromRequest('firstName');
        $this->form->lastName = ParamUtils::getFromRequest('lastName');
        $this->form->email = ParamUtils::getFromRequest('email');
        $this->form->password = ParamUtils::getFromRequest('password');
        $this->form->newPassword = ParamUtils::getFromRequest('newPassword');
        $this->form->repeatedNewPassword = ParamUtils::getFromRequest('repeatedNewPassword');


        $v = new Validator();

        $v->validate($this->form->nickname,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nazwa użytkownika jest wymagana',
            'min_length' => 3,
            'max_length' => 32,
            'validator_message' => 'Nazwa użytkownika powinna zawierać od 3 do 32 znaków'
        ]);

        $v->validate($this->form->firstName,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Imię jest wymagane',
            'min_length' => 3,
            'max_length' => 32,
            'validator_message' => 'Imię powinno zawierać od 3 do 32 znaków'
        ]);

        $v->validate($this->form->lastName,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nazwisko jest wymagane',
            'min_length' => 3,
            'max_length' => 32,
            'validator_message' => 'Nazwisko powinno zawierać od 3 do 32 znaków'
        ]);

        $v->validate($this->form->email,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Email jest wymagany',
            'min_length' => 3,
            'max_length' => 320,
            'regexp' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',
            'validator_message' => 'Email powinien zawierać od 3 do 320 znaków i być poprawny'
        ]);

        $v->validate($this->form->password,[
            'required' => true,
            'required_message' => 'Stare hasło jest wymagane',
            'min_length' => 4,
            'max_length' => 64,
            'validator_message' => 'Hasło powinno zawierać od 4 do 64 znaków'
        ]);

        if(!empty($this->form->newPassword) || !empty($this->form->repeatedNewPassword)){
            if($this->form->newPassword == $this->form->repeatedNewPassword){
                $v->validate($this->form->newPassword,[
                    'required' => true,
                    'required_message' => 'Wystąpił mocno nieprzewidziany błąd',
                    'min_length' => 4,
                    'max_length' => 64,
                    'validator_message' => 'Hasło powinno zawierać od 4 do 64 znaków'
                ]);
            }else{
                Utils::addErrorMessage("Podane nowe hasła muszą być takie same");
            }
        }

        if(App::getMessages()->isError()) return false;

        //add user
        try {
            if($this->form->nickname != App::getDB()->get("users", ["nickname"], ["id" => SessionUtils::load("id", true)])["nickname"]){
                $isNicknameOccupied = App::getDB()->has("users", ["nickname" => $this->form->nickname]);
                if($isNicknameOccupied) Utils::addErrorMessage("Ta nazwa użytkownika jest już zajęta");
            }

            if($this->form->email != App::getDB()->get("users", ["email"], ["id" => SessionUtils::load("id", true)])["email"]) {
                $isEmailOccupied = App::getDB()->has("users", ["email" => $this->form->email]);
                if ($isEmailOccupied) Utils::addErrorMessage("Ten email jest już zajęty");
            }

            if(App::getMessages()->isError()) return false;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

        return !App::getMessages()->isError();
    }

    public function action_user_show() {
        $this->getInitialFromDb(); //initial form
        $this->generateView();
    }
    public function action_user() {
        if($this->validate()){
            try{
                if(empty($this->form->newPassword)){
                    App::getDB()->update("users", [
                        "nickname" => $this->form->nickname,
                        "firstName" => $this->form->firstName,
                        "lastName" => $this->form->lastName,
                        "email" => $this->form->email,
                        "updatedAt" => time(),
                        "updatedBy" => SessionUtils::load("id", true)
                    ], ["id" => SessionUtils::load("id", true)]);
                }else{
                    App::getDB()->update("users", [
                        "nickname" => $this->form->nickname,
                        "firstName" => $this->form->firstName,
                        "lastName" => $this->form->lastName,
                        "email" => $this->form->email,
                        "password" => md5($this->form->newPassword),
                        "updatedAt" => time(),
                        "updatedBy" => SessionUtils::load("id", true)
                    ], ["id" => SessionUtils::load("id", true)]);
                }

                //update info in session
                SessionUtils::store("nickname", $this->form->nickname);
                SessionUtils::store("firstName", $this->form->firstName);
                SessionUtils::store("lastName", $this->form->lastName);

                Utils::addInfoMessage("Pomyślnie zaktualizowano konto");
            }catch(PDOException $e){
                Utils::addErrorMessage("Błąd połączenia z bazą danych");
            }
        }else{
            Utils::addInfoMessage("Nie wprowadzono żadnych zmian");
        }
        $this->form->password = "";
        $this->form->newPassword = "";
        $this->form->repeatedNewPassword = "";
        $this->generateView();
    }
    public function action_user_delete(){
        $this->form->password = ParamUtils::getFromRequest("password", true, "Aby usunąć konto, musisz podać stare hasło.");
        if(!App::getMessages()->isError()) {
            try {
                if (App::getDB()->has("users", ["id" => SessionUtils::load("id", true), "password" => md5($this->form->password)])) {
                    App::getDB()->delete("users", ["id" => SessionUtils::load("id", true)]);
                    App::getRouter()->redirectTo("index");
                } else {
                    Utils::addErrorMessage("Błedne hasło");
                }
            } catch (PDOException $e) {
                Utils::addErrorMessage("Błąd połączenia z bazą danych");
            }
        }

        $this->getInitialFromDb();
        $this->generateView();
    }

    public function generateView(){
        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->display("auth/User.tpl");

    }

}
