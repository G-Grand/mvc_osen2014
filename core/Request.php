<?php

class Request {
    private $_requestUri;
    private $_userIp;

    public function setRequestUri($requestUri) {
        $this->_requestUri = $requestUri; }

    public function getRequestUri() {
        return $this->_requestUri; }

    public function setUserIp($userIp) {
        $this->_userIp = $userIp; }

    public function getUserIp() {
        return $this->_userIp; }

    public function __construct(){}

    public function setRequestFromServer() {
        $this->_requestUri = $_SERVER["REQUEST_URI"];
        $this->_userIp = $_SERVER["REMOTE_ADDR"];
    }


}