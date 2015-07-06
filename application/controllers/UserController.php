<?php

use \Entity\User;

class UserController implements IController {

    public function indexAction() {
        echo "no action!";
    }

    public function findAction() {
        echo "We found Yr user!";
    }

    public function showAllAction() {}

    public function addAction(){
        $user = new User();
//        var_dump($user);
    }

    public function updateAction() {}
}