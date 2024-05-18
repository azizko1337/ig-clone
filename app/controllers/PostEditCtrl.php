<?php

namespace app\controllers;


use app\forms\PostEditForm;
use core\ParamUtils;
use core\App;
use core\Validator;

class PostEditCtrl
{
    private $form;
    public function __construct(){
        $this->form = new PostEditForm();
    }

    public function validateSave(){
        $this->form->id = ParamUtils::getFromPost("id", true, "Niepoprawne wywołanie.");

        $v = new Validator();
        $this->form->body = $v->validateFromPost("body", [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj opis zdjęcia',
            'min_length' => 2,
            'max_length' => 200,
            'validator_message' => 'Opis musi mieć od 2 do 200 znaków.'
        ]);
    }
}