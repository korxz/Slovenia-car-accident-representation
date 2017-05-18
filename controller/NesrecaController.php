<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 21. 03. 2017
 * Time: 15:40
 */

require_once ("model/NesrecaDB.php");
require_once ("ViewHelper.php");

class NesrecaController {
    public static function index() {
        echo ViewHelper::render("view/zacetna.php", ["number" => NesrecaDB::getNumberOfNesreca(), "klas_number" => NesrecaDB::getNumberOfKlas()]);
    }
}