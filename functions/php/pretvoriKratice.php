<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 28. 03. 2017
 * Time: 23:20
 *
 * Funkcija, ki pretvarja BESEDNE IZBIRE v KRATICE:
 * Brez poškodb -> B da lahko poizvedujemo po bazi, kjer so zapisi v Kraticah
 *
 */
class pretvoriKratice
{
    public static function pretvoriKlas($klas)
    {
        if ($klas == "Brez poskodb") return "B";
        if ($klas == "Lazja poskodba") return "L";
        if ($klas == "Hujsa poskodba") return "H";
        if ($klas == "Smrt") return "S";
    }

    public static function pretvoriTip($tip)
    {
        if($tip == "Celno trcenje") return "ČT";
        if($tip == "Bocno trcenje") return "BT";
        if($tip == "Naletno trcenje") return "NT";
        if($tip == "Oplazenje") return "OP";
        if($tip == "Ostalo") return "OS";
        if($tip == "Povozenje pesca") return "PP";
        if($tip == "Prevrnitev vozila") return "PR";
        if($tip == "Povozenje zivali") return "PZ";
        if($tip == "Trcenje v objekt") return "TO";
        if($tip == "Trcenje v stojece") return "TV";
    }

    public static function pretvoriVzrok($vzrok)
    {
        if ($vzrok == "Nepravilnost na cesti") return "CE";
        if ($vzrok == "Neprilagojena hitrost") return "HI";
        if ($vzrok == "Nepravilnost pesca") return "NP";
        if ($vzrok == "Ostalo") return "OS";
        if ($vzrok == "Neupostevanje pravil o prednosti") return "PD";
        if ($vzrok == "Nepravilno prehitevanje") return "PR";
        if ($vzrok == "Premik z vozilom") return "PV";
        if ($vzrok == "Nepravilna smer voznje") return "SV";
        if ($vzrok == "Nepravilnosti na tovoru") return "TO";
        if ($vzrok == "Nepravilnosti na vozilu") return "VO";
        if ($vzrok == "Neustrezna varnostna razdalja") return "VR";
    }
}

