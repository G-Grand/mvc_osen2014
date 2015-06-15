<?php

class Request {
    private $_requestUri;
    private $_userIp;

    public function __construct(array $server=null){
        if($server) {
            $this->_requestUri = $server["REQUEST_URI"];
            $this->_userIp = $server["REMOTE_ADDR"];
        }
    }
}