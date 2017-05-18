<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 23. 03. 2017
 * Time: 18:22
 */

require_once ("model/NesrecaDB.php");
require_once ("ViewHelper.php");

class IdejaController {
    public static function index() {
        echo ViewHelper::render("view/ideja.php");
    }
}