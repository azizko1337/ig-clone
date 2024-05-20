<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use PDOException;
use app\forms\SearchUserForm;

class SearchUserCtrl{
    private $form;
    private $users;

    public function __construct() {
        $this->form = new SearchUserForm();
        $this->users = array();
    }

    private function validate(): bool {
        $this->form->nickname = ParamUtils::getFromRequest('nickname');


        $v = new Validator();

        $v->validate($this->form->nickname,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Treść wyszukiwania jest wymagana',
            'min_length' => 3,
            'max_length' => 50,
            'validator_message' => 'Zapytanie powinno zawierać od 3 do 50 znaków'
        ]);

        return !App::getMessages()->isError();
    }

    private function getUsers(){
        try {
            $this->users = App::getDB()->select("users", ["id", "nickname", "firstName", "lastName"],[
                "id[!]" => SessionUtils::load("id", true),
                "nickname[~]" => $this->form->nickname
            ]);
            return true;
        }catch(PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
        return false;
    }

    public function action_search_user() {
        if($this->validate()){
            $this->getUsers();
        }
        $this->generateView();
    }

    public function generateView(){
        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->assign("users", $this->users);

        App::getSmarty()->display("SearchUser.tpl");
    }

}
