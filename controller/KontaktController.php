<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 20. 04. 2017
 * Time: 13:43
 */

require_once ("ViewHelper.php");

class KontaktController {
    public static function index(){
        echo ViewHelper::render("view/kontakt.php");
    }
}
?>