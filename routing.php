<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('index'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('index', 'IndexCtrl');
//Utils::addRoute('action_name', 'controller_class_name');