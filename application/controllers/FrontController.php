<?php

class FrontController {
    static private $_instance;
    private $_request;

    private function __construct(){}
    private function __clone(){}

    static public function getInstance() {
        if(self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function run() {
        $this->_request = $_SERVER["REQUEST_URI"];
        $strURI = explode("?",$this->_request);
        $path = explode("/",trim($strURI[0],"/"));
        $ctrl = (isset($path[0])) ?  (ucfirst($path[0]) . "Controller") : "IndexController";
        $method = (isset($path[1])) ? ($path[1] . "Action") : "indexAction";

        var_dump(get_declared_classes());

        if(!class_exists($ctrl)) {
            $obj = new $ctrl();
            var_dump(get_declared_classes());
            if(method_exists($obj,$method)) {
                $obj->$method();
            }else {
                echo "АЙ ай ай !!! ";
            }
        }else {
            echo "АЙ ай ай !!! ";
        }

    }

    public function parseUri($uri) {
        //TODO: разобрать урл и исходя из данных урла выбрать контроллер и метод
    }
}