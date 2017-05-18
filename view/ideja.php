<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "bootstrap.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<link real="shortcut icon" type="image/ico" href="static/images/favicon.ico" />
<meta charset="UTF-8" />
<title>Ideja</title>

<head><meta name="viewport" content="width=device-width, initial-scale=1"></head>


<?php include_once "functions/php/header.php"; ?>
<body>
    <div class="container-fluid">
        <p>Ideja naša spletne rešitve je povečati varnost v prometu s preventivnim zmanjšanjem prometnih nesreč in nezgod. Za prikaz prometnih nesreč smo uporabili Google Maps API, ki omogoča
        prikaz kazalcev prometnih nesreč na zemljevidu. Uporabnik si ima možnost ogledati kje so se znotraj Republike Slovenije v letih med 1993 in 2015 zgodile prometne nesreče in iz tega
        prepozna mesta na katerih jih prišlo do povečanega števila nesreč ter na njih skuša voziti previdneje kot bi sicer.</p>
        <div class="container-fluid">
            <h2>Kako se rešitev uporablja?</h2>
            <p>Rešitev je na voljo v zavihku <a href="<?= "pregled" ?>">Pregled</a> in deluje tako, da uporabnik izberi kombinacijo parametrov <b>zrok nesreče</b>, <b>tip nesreče</b>, <b>posledice nesreče</b>
            ter <b>število prikazanih kazalnikov</b> na podlagi katerih se izriše zemljevid v katerem so nesreče prikazane. S klikom na kazalnik posamezne nesreče si uporabnik lahko ogleda
            še bolj podrobne informacije o sami nesreči.</p>
            <br/>
            <h2>Podatki</h2>
            <p>Podatki smo pridobili iz spletne strani <a href="http://www.policija.si/index.php/statistika">Policije</a> v obliki tekstovnih datotek. Ker podatki, kot taki niso bili primerni
            za hranjene v podatkovni bazi jih je bilo potrebno ustrezno obdelati. Ta del izdelave končne rešitve je opravil en izmed avtorjev rešitve Jernej Rejc. Obdelani podatki ter že izdelana
            podatkovna baza so na voljo na tej <a href="https://github.com/ReversePhoenix/Prometne_Nesrece">povezavi</a>. Obdelovanje podatkov je bilo narejeno s pomočjo programskega jezik
                Python, podatkov baza pa je izdelana z orodjem MySql.</p>
        </div>
    </div>
</body>
<?php include_once "functions/php/footer.php"; ?>
