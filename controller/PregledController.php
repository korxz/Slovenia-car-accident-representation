<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 23. 03. 2017
 * Time: 18:22
 */

require_once ("model/NesrecaDB.php");
require_once ("ViewHelper.php");
include "functions/php/pretvoriKratice.php";

class PregledController {
    public static function index() {
        echo ViewHelper::render("view/pregled.php");
    }

    #TIP
    public static function Tip($tip, $omejitevQuery) {
        #klic da pretvori kratice npr "Oplazenje" => "OP"
        $tip = pretvoriKratice::pretvoriTip($tip);
        echo ViewHelper::render("view/pregled.php", ["nesrece" => NesrecaDB::getTip(["tip" =>$tip, "omejitevQuery" => $omejitevQuery])]);
    }

    #KLAS
    public static function Klas($klas, $omejitevQuery) {
        $klas = pretvoriKratice::pretvoriKlas($klas, $omejitevQuery);
        echo ViewHelper::render("view/pregled.php", ["nesrece" => NesrecaDB::getKlas(["klas" => $klas, "omejitevQuery" => $omejitevQuery])]);
    }

    #VZROK
    public static function Vzrok($vzrok, $omejitevQuery) {
        $vzrok = pretvoriKratice::pretvoriVzrok($vzrok);
        echo ViewHelper::render("view/pregled.php", ["nesrece" => NesrecaDB::getVzrok(["vzrok" => $vzrok, "omejitevQuery" => $omejitevQuery])]);
    }

    #TIP&KLAS
    public static function TipKlas($tip, $klas, $omejitevQuery) {
        $tip = pretvoriKratice::pretvoriTip($tip);
        $klas = pretvoriKratice::pretvoriKlas($klas);
        echo ViewHelper::render("view/pregled.php", ["nesrece" => NesrecaDB::getTipKlas(["tip" => $tip, "klas" => $klas, "omejitevQuery" => $omejitevQuery])]);
    }

    #TIP&VZROK
    public static function TipVzrok($tip, $vzrok, $omejitevQuery) {
        $tip = pretvoriKratice::pretvoriTip($tip);
        $vzrok = pretvoriKratice::pretvoriVzrok($vzrok);
        echo ViewHelper::render("view/pregled.php", ["nesrece" => NesrecaDB::getTipVzrok(["tip" => $tip, "vzrok" => $vzrok, "omejitevQuery" => $omejitevQuery])]);
    }

    #KLAS&VZROK
    public static function KlasVzrok($klas, $vzrok, $omejitevQuery) {
        $klas = pretvoriKratice::pretvoriKlas($klas);
        $vzrok = pretvoriKratice::pretvoriVzrok($vzrok);
        echo ViewHelper::render("view/pregled.php", ["nesrece" => NesrecaDB::getKlasVzrok(["klas" => $klas, "vzrok" => $vzrok, "omejitevQuery" => $omejitevQuery])]);
    }

    #TIP&KLAS&VZROK
    public static function TipKlasVzrok($tip, $klas, $vzrok, $omejitevQuery) {
        $tip = pretvoriKratice::pretvoriTip($tip);
        $klas = pretvoriKratice::pretvoriKlas($klas);
        $vzrok = pretvoriKratice::pretvoriVzrok($vzrok);
        echo ViewHelper::render("view/pregled.php", ["nesrece" => NesrecaDB::getTipKlasVzrok(["tip" => $tip, "klas" => $klas, "vzrok" => $vzrok, "omejitevQuery" => $omejitevQuery])]);
    }
}