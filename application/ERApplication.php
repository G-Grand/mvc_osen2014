<?php

class ERApplication{
    static private $_instance = null;
    private $_paths = array();
    static public $_mainCfg = array();
    private $_fc = null;

    private function __construct() {
        self::$_mainCfg = require_once "config/main.cfg.php";
    }
    private function __clone() {}

    static public function getInstance() {
        if(self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function init() {
        $this->_paths = self::$_mainCfg['application']['paths'];
        $this->setIncludePath($this->_paths);
        $this->setAutoload();
        $this->initFC();
        return $this->_fc;
    }

    private function setIncludePath(array $paths) {
        $pathStr = "";
        foreach($paths as $path) {
            $pathStr .= PATH_SEPARATOR.$path;
        }
        set_include_path(get_include_path().$pathStr);
    }

    private function initFC() {
        if(class_exists("FrontController")) {
            $this->_fc = FrontController::getInstance(); }
    }

    private function setAutoload() {
        spl_autoload_register(function($className) {
            $classFile = str_ireplace("\\",DIRECTORY_SEPARATOR,$className);
            if(ERApplication::fileExists($classFile,"php")) {
                spl_autoload($className);
            }else {
                echo "NO file!!!";
            }
        });
    }

    static public function fileExists($file,$ext) {
        $paths = explode(PATH_SEPARATOR,get_include_path());
        foreach($paths as $path) {
            $filePath = $path . DIRECTORY_SEPARATOR . $file . "." . $ext;
            if(file_exists($filePath)) { return true; }
        }
        return false;
    }


    public function getFC() {
        return $this->_fc;
    }
}