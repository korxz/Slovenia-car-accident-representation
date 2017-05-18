<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 21. 03. 2017
 * Time: 14:45
 */

require_once 'model/AbstractDB.php';

class NesrecaDB extends AbstractDB {

    public static function insert(array $params) {
        return parent::modify("INSERT INTO nesreca (id_nesrece, klas_nesrece, st_ue, datum, ura, x,y )"
                            . " VALUES (:id_nesrece, :klas_nesrece, :st_ue, :datum, :ura, :x, :y) ", $params);
}

    public static function update(array $params) {
        return parent::modify("UPDATE book SET id_nesrece = :id_nesrece, klas_nesrece = :klas_nesrece "
                            . "st_ue = :st_ue, datum = :datum, ura = :ura, x = :x, x = :y ", $params);
    }

    public static function delete(array $id_nesrece) {
        return parent::modify("DELETE FROM nesreca WHERE id_nesrece = :id_nesrece", $id_nesrece);
    }

    public static function get(array $id_nesrece) {
        return parent::query("SELECT id_nesrece, klas_nesrece, st_ue, datum, ura, x, y "
                            . " FROM nesreca WHERE id_nesrece = :id_nesrece", $id_nesrece);
    }

    public static function getAll() {
        return parent::query("SELECT * FROM NESRECA;");
    }

    #poizvedba, ki bo preštela koliko nesreč je podanih v PB
    public static function getNumberOfNesreca() {
        return parent::query("SELECT count(id_nesrece) as number FROM NESRECA");
    }

    #poizvedva, ki bo dobila glede na posledice nesreče podatke o številu in posledici
    public static function getNumberOfKlas() {
        return parent::query("SELECT count(klas_nesrece) as number, klas_nesrece FROM nesreca GROUP BY klas_nesrece");
    }

    #TIP
    public static function getTip(array $params) {
        #echo gettype($params["omejitevQuery"]); INTEGER
        #echo gettype($params["tip"]); STRING

        return parent::query("SELECT nesreca.id_nesrece, krajevne_lastnosti.vzrok, krajevne_lastnosti.tip, nesreca.klas_nesrece, nesreca.x, nesreca.y "
                            ." FROM nesreca LEFT JOIN krajevne_lastnosti ON krajevne_lastnosti.id_nesrece = nesreca.id_nesrece "
                           ." WHERE krajevne_lastnosti.tip = :tip LIMIT 20000", $params);
    }

    #KLAS
    public static function getKlas(array $params) {
        return parent::query("SELECT nesreca.id_nesrece, krajevne_lastnosti.vzrok, krajevne_lastnosti.tip, nesreca.klas_nesrece, nesreca.x, nesreca.y "
            ." FROM nesreca LEFT JOIN krajevne_lastnosti ON krajevne_lastnosti.id_nesrece = nesreca.id_nesrece "
            ." WHERE nesreca.klas_nesrece = :klas LIMIT 20000", $params);
    }

    #VZROK
    public static function getVzrok(array $params) {
        return parent::query("SELECT nesreca.id_nesrece, krajevne_lastnosti.vzrok, krajevne_lastnosti.tip, nesreca.klas_nesrece, nesreca.x, nesreca.y "
            ." FROM nesreca LEFT JOIN krajevne_lastnosti ON krajevne_lastnosti.id_nesrece = nesreca.id_nesrece "
            ." WHERE krajevne_lastnosti.vzrok = :vzrok LIMIT 20000", $params);
    }

    #TIP&KLAS
    public static function getTipKlas(array $params) {
        return parent::query("SELECT nesreca.id_nesrece, krajevne_lastnosti.vzrok, krajevne_lastnosti.tip, nesreca.klas_nesrece, nesreca.x, nesreca.y "
            ." FROM nesreca LEFT JOIN krajevne_lastnosti ON krajevne_lastnosti.id_nesrece = nesreca.id_nesrece "
            ." WHERE nesreca.klas_nesrece = :klas AND krajevne_lastnosti.tip = :tip LIMIT 20000", $params);
    }

    #TIP&VZROK
    public static function getTipVzrok(array $params) {
        return parent::query("SELECT nesreca.id_nesrece, krajevne_lastnosti.vzrok, krajevne_lastnosti.tip, nesreca.klas_nesrece, nesreca.x, nesreca.y "
            ." FROM nesreca LEFT JOIN krajevne_lastnosti ON krajevne_lastnosti.id_nesrece = nesreca.id_nesrece "
            ." WHERE krajevne_lastnosti.vzrok = :vzrok AND krajevne_lastnosti.tip = :tip LIMIT 20000", $params);
    }

    #KLAS&VZROK
    public static function getKlasVzrok(array $params) {
        return parent::query("SELECT nesreca.id_nesrece, krajevne_lastnosti.vzrok, krajevne_lastnosti.tip, nesreca.klas_nesrece, nesreca.x, nesreca.y "
            ." FROM nesreca LEFT JOIN krajevne_lastnosti ON krajevne_lastnosti.id_nesrece = nesreca.id_nesrece "
            ." WHERE nesreca.klas_nesrece = :klas AND krajevne_lastnosti.vzrok = :vzrok LIMIT 20000", $params);
    }

    #TIP&KLAS&VZROK
    public static function getTipKlasVzrok(array $params) {
        return parent::query("SELECT nesreca.id_nesrece, krajevne_lastnosti.vzrok, krajevne_lastnosti.tip, nesreca.klas_nesrece, nesreca.x, nesreca.y "
            ." FROM nesreca LEFT JOIN krajevne_lastnosti ON krajevne_lastnosti.id_nesrece = nesreca.id_nesrece "
            ." WHERE nesreca.klas_nesrece = :klas AND krajevne_lastnosti.vzrok = :vzrok AND krajevne_lastnosti.tip = :tip LIMIT 20000", $params);
    }
}