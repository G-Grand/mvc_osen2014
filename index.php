<?php

require_once "application/ERApplication.php";

$app = ERApplication::getInstance();
$fc = $app ->init();
$fc->run();

