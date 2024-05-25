<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('index'); #default action
App::getRouter()->setLoginRoute('logout'); #action to forward if no permissions

Utils::addRoute('index', 'IndexCtrl', ["user"]);

Utils::addRoute('login', 'auth\LoginCtrl');
Utils::addRoute('login_show', 'auth\LoginCtrl');
Utils::addRoute('logout', 'auth\LoginCtrl');

Utils::addRoute('register', 'auth\RegisterCtrl');
Utils::addRoute('register_show', 'auth\RegisterCtrl');

Utils::addRoute("user_show", 'auth\UserCtrl', ["user"]);
Utils::addRoute("user", 'auth\UserCtrl', ["user"]);
Utils::addRoute("user_delete", 'auth\UserCtrl', ["user"]);

Utils::addRoute("add_post_show", "AddPostCtrl", ["user"]);
Utils::addRoute("add_post", "AddPostCtrl", ["user"]);

Utils::addRoute("search_profile", "SearchProfileCtrl", ["user"]);
Utils::addRoute("profile", "ProfileCtrl", ["user"]);

Utils::addRoute("like", "LikeCtrl", ["user"]);

//Utils::addRoute('action_name', 'controller_class_name');