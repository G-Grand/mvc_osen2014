<?php

use \Entity\User;

class UserController implements IController {

    public function findAction() {}

    public function showAllAction() {}

    public function addAction(){
        $user = new User();
        var_dump($user);
    }

    public function updateAction() {}
}