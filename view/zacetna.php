<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "bootstrap.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<link real="shortcut icon" type="image/ico" href="static/images/favicon.ico" />
<meta charset="UTF-8" />
<title>Domov</title>

<head><meta name="viewport" content="width=device-width, initial-scale=1"></head>


<?php include_once "functions/php/header.php"; ?>

    <div class="container-fluid">
        <p>Namen naše spletne aplikacije je povečanje preventivne priprave udeležencev v prometu na vožnjo.
        Rešitev deluje tako, da uporabnik v podmeniju <strong>Pregled</strong> izbere ustrezne parametre ter
        si za potek svoje poti ogleda predhodne nesreče na poti. S tem lahko pridobi informacije o tem
        kateri cestni odsek je nevaren in mora na tem delu biti še posebaj pozoren.</p>
        <h4>Trenutno se v naši bazi nahaja <strong><?= $number[0]["number"] ?></strong> nesreč.</h4>
      <!-- KAKO SE U CONSOLE LOG IZPIŠE
       <script>
            console.log(<?= json_encode($number[0]["number"]); ?>);
        </script> -->
    </div>
        <div class="row text-center">
            <h3>Kategorizacija nesreč glede na posledice:</h3>
            <br/>
            <?php foreach ($klas_number as $nesreca): ?>
                <?php $klas =  "";
                switch ($nesreca["klas_nesrece"]) {
                    case "B":
                        $klas = "Brez poškodb";
                        break;
                    case "H":
                        $klas = "Hujša poškodba";
                        break;
                    case "L":
                        $klas = "Lažja poškodba";
                        break;
                    case "S":
                        $klas = "Smrt";
                        break;
                    default:
                        $klas = "Neznano";
                }?>
                <div class="col-md-1 col-lg-offset-1">
                    <row>
                    <div class="circle"><p><?= $nesreca["number"]?></p></div>
                    <h4><strong><?= $klas?></strong></h4>
                    </row>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<br/>

<?php include_once "functions/php/footer.php"; ?>
