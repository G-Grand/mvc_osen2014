<?php

class FrontController {
    static private $_instance;

    private function __construct(){
        $uc = new UserController();
        $uc->addAction();
    }
    private function __clone(){}

    static public function getInstance() {
        if(self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function parseUri($uri) {
        //TODO: разобрать урл и исходя из данных урла выбрать контроллер и метод
    }
}