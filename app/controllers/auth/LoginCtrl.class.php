<?php

namespace app\controllers\auth;

use app\forms\auth\LoginForm;
use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use PDOException;

class LoginCtrl {

    private $form;
    private $user_data;

    public function __construct() {
        $this->form = new LoginForm();
    }


    public function validate(): bool {
        if(!empty(SessionUtils::load("id", true))) return true;

        $this->form->nickname = ParamUtils::getFromRequest('nickname');
        $this->form->password = ParamUtils::getFromRequest('password');

        $v = new Validator();
        $v->validate($this->form->nickname,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Login jest wymagany',
            'min_length' => 3,
            'max_length' => 32,
            'validator_message' => 'Login powinien zawierać od 3 do 32 znaków'
        ]);

        $v->validate($this->form->password,[
            'required' => true,
            'required_message' => 'Hasło jest wymagane',
        ]);

        if(App::getMessages()->isError()) return false;

        try{
            $this->user_data = App::getDB()->get("users", ["id", "nickname", "firstName", "lastName"],[
                "nickname" => $this->form->nickname,
                "password" => md5($this->form->password)
            ]);
            if(empty($this->user_data)){
                Utils::addErrorMessage("Nieprawidłowa nazwa użytkownika lub hasło");
            }
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

        return !App::getMessages()->isError();
    }

    private function addRoles(): bool{
        try{
            $roles = App::getDB()->select("user_role", ["role_name"], ["user_id" => $this->user_data["id"]]);
            if(is_null($roles)) {
                Utils::addErrorMessage("Nie masz żadnej roli"); //useless, system will pass anyway
                return true;                                           //cause return true
            };

            foreach($roles as $role){
                RoleUtils::addRole($role["role_name"]);
            }
            return true;
        }catch(PDOException $e){
            Utils::addErrorMessage("Nie udało się połączyć z bazą danych.");
        }
        return false;
    }

    public function action_login_show() {
        $this->generateView();
    }
    public function action_login() {
        if($this->validate() && $this->addRoles()){
            SessionUtils::store("id", $this->user_data["id"]);
            SessionUtils::store("nickname", $this->user_data["nickname"]);
            SessionUtils::store("firstName", $this->user_data["firstName"]);
            SessionUtils::store("lastName", $this->user_data["lastName"]);
            App::getRouter()->redirectTo("index");
        }else{
            $this->form->password = "";
            $this->generateView();
        }

    }
    public function action_logout() {
        SessionUtils::remove("id"); //redundant?
        SessionUtils::remove("nickname");
        SessionUtils::remove("firstName");
        SessionUtils::remove("lastName");

        $_SESSION = null;
        session_destroy();
        App::getRouter()->redirectTo('login_show');
    }

    public function generateView(){
        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->display("auth/Login.tpl");
    }

}
