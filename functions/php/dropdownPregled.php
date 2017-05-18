<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "bootstrap.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">

<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 28. 03. 2017
 * Time: 19:38
 */

##############################################################################
# Pri prvem polju uporabnik izbere VZROK zaradi katerega je prišlo do nesreče#
# Pri drugem izbere, do kakšnega TIPA nesreče je prišlo                      #
# Pri tretjem izbere klas oziroma klas_nesrece, kar pomeni posledice nesreče #
# Pri četrtem izbere limit števeila vrnjenih zadetkov poizvedbe. Če je preveč#
# primerov poizvedbe, se da v brskalniku ne more prikazati.                  #
##############################################################################
?>


<form action ="#" method="get" style="text-align: center">
    <div class="control-label">
        <select name="vzrok" id="drp">
            <option disabled selected>Izberite vzrok nesrece</option>
            <option>Nepravilnost na cesti</option>
            <option>Neprilagojena hitrost</option>
            <option>Nepravilnost pesca</option>
            <option>Neupostevanje pravil o prednosti</option>
            <option>Nepravilno prehitevanje</option>
            <option>Premik z vozilom</option>
            <option>Nepravilna smer voznje</option>
            <option>Nepravilnosti na tovoru</option>
            <option>Nepravilnosti na vozilu</option>
            <option>Neustrezna varnostna razdalja</option>
            <option>Ostalo</option>
        </select>


        <select name = "tip" id="drp" >
            <option disabled selected>Izberite tip nesrece</option>
            <option>Celno trcenje</option>
            <option>Bocno trcenje</option>
            <option>Naletno trcenje</option>
            <option>Oplazenje</option>
            <option>Ostalo</option>
            <option>Povozenje pesca</option>
            <option>Povozenje zivali</option>
            <option>Prevrnitev vozila</option>
            <option>Trcenje v objekt</option>
            <option>Trcenje v stojece</option>
        </select>



        <select id="drp" name="klas" >
            <option disabled selected>Izberite vrsto poskodb</option>
            <option>Brez poskodb</option>
            <option>Lazja poskodba</option>
            <option>Hujsa poskodba</option>
            <option>Smrt</option>
        </select>

        <select id="drp" name="omejitevQuery" )>
            <option selected>100</option>
            <option>1000</option>
            <option>5000</option>
            <option>10000</option>
            <option>20000</option>
        </select>


    </div>
    <div class="control-label" style="margin-top:5px;">
        <input type="submit" class="btn btn-success" name="save" value="Potrdi" />
    </div>
</form>

<?php
$str = "";
if(isset($_GET["tip"])) {
    $str .= $_GET["tip"] . ", ";

}
if(isset($_GET["vzrok"])) {
    $str .= $_GET["vzrok"] . ", ";

}
if (isset($_GET["klas"])) {
    $str .= $_GET["klas"] . ", ";

}

?>

<div class="container-fluid text-center">
    <h3>Izbrani parametri so: <?php echo rtrim($str ,", "); ?></h3>
</div>
