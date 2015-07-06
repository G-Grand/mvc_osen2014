<?php
/**
 * Created by JetBrains PhpStorm.
 * User: teacher
 * Date: 06.07.15
 * Time: 19:12
 * To change this template use File | Settings | File Templates.
 */

class RenderModel {

    public function render($fileName) {
        $tplDir = ERApplication::$_mainCfg['application']['paths']['templateDirectory'];
        $file = (ERApplication::fileExists($fileName,"tpl")) ? $fileName. ".tpl" : "404.tpl";
        ob_start();
        include $tplDir . DIRECTORY_SEPARATOR . $file;
        return ob_get_clean();
    }
}