<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 24. 03. 2017
 * Time: 15:52
 */

require_once ("ViewHelper.php");
require_once ("model/KrajevneDB.php");

class KrajevneController {
    public static function index() {
        ViewHelper::render("view/zacetna.php");
    }
}