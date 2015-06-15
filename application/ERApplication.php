<?php

class ERApplication{
    static private $_instance = null;
    private $_paths = array();
    private $_mainCfg = array();
    private $_fc = null;

    private function __construct() {
        $this->_mainCfg = require_once "config/main.cfg.php";
    }
    private function __clone() {}

    static public function getInstance() {
        if(self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function init() {
        $this->_paths = $this->_mainCfg['application']['paths'];
        $this->setIncludePath($this->_paths);
        spl_autoload_register();
        if(class_exists("FrontController")) {
            $this->_fc = FrontController::getInstance();
        }
        $method = "parseUri";
        if(method_exists($this->_fc,$method)) {
            $this->_fc->$method();
        }
    }

    private function setIncludePath(array $paths) {
        $pathStr = "";
        foreach($paths as $path) {
            $pathStr .= PATH_SEPARATOR.$path;
        }
        set_include_path(get_include_path().$pathStr);
    }

    public function getFC() {
        return $this->_fc;
    }
}