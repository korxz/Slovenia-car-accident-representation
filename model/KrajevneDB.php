<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 24. 03. 2017
 * Time: 15:55
 */

class KrajevneDB {
    public static function insert(array $params) {
        return parent::modify("INSERT INTO krajevne_lastnosti (id_nesrece, odsek, sifra_oznaka, kraj_nesrece, hisna_st, prizorisce, vzrok, tip) "
                            . " VALUES (:id_nesrece, :odsek, :sifra_oznaka, :kraj_nesrece, :hisna_st, :prizorisce, :vzrok, :tip", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE krajevne_lastnosti SET id_nesrece = :id_nesrece, odsek = :odsek "
                            . " sifra_oznaka = :sifra_oznaka, kraj_nesrece = :kraj_nesrece, hisna_st = :hisna_st, "
                            . " prizorisce = :prizorisce, vzrok = :vzrok, tip = :tip", $params);
    }

    public static function delete(array $id_nesrece) {
        return parent::modify("DELETE FROM krajevne_lastnosti WHERE id_nesrece = :id_nesrece", $id_nesrece);
    }

    public static function get(array $id_nesrece) {
        return parent::query("SELECT id_nesrece, odsek, sifra_oznaka, kraj_nesrece, hisna_st, prizorisce, vzrok, tip "
                            . " FROM krajevne_lastnosti WHERE id_nesrece = :id_nesrece", $id_nesrece);
    }

    public static function getAll() {
        return parent::query("SELECT * FROM krajevne_lastnosti");
    }
}