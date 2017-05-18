<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "bootstrap.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<link real="shortcut icon" type="image/ico" href="static/images/favicon.ico" />
<meta charset="UTF-8" />
<title>Pregled</title>

<head><meta name="viewport" content="width=device-width, initial-scale=1"></head>


<?php include_once "functions/php/header.php"; ?>

<?php include_once "functions/php/dropdownPregled.php"; ?>

<!-- IF ZANKA K PREVERI ČE JE ŽE POSLAN BIL GET REQUEST, DA NI POLE ERRORJA OD FOREACH -->


<div id="map" style="width: 100%; height: 600px;"></div>
<script>
    function get(name){
        if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
            return decodeURIComponent(name[1]);
    }

    //za precistit string, ki ga dobiš iz URL ker vsebuje Brez+Poskodb => Brez Poskodb
    function clear(string) {
        var temp = string.split("+");
        if(temp.length > 1)
        {
            return temp[0]+" "+temp[1];
        }
        else
        {
            return temp[0];
        }
    }

    function initMap() {
        var ljubljana = {lat: 46.0552778, lng: 14.5144444};

        //counter, da omejimo prikaze markerjev na zemljevidu
        var limit = parseInt(<?= json_encode($_GET["omejitevQuery"]) ?>);
        var counter = 0;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: ljubljana
        });
        <?php
        foreach ($nesrece as $nesreca) :
        if(($nesreca["x"] > 1 || $nesreca["y"] > 1)) {?>
        if(counter < limit) {
            var pos = {
                lat: parseFloat(<?=json_encode($nesreca["x"])?>),
                lng: parseFloat(<?=json_encode($nesreca["y"])?>)
            };
            var marker = new google.maps.Marker({
                position: pos,
                map: map
            });
            counter++;
            //razlog zakaj je prislo, do nesrece
            var besediloNesrece = "";
            if(document.URL.indexOf("tip") != -1)
            {
                var tip = get("tip");
                besediloNesrece += clear(tip)+"<br />";
            }
            if(document.URL.indexOf("klas") != -1)
            {
                var klas = get("klas");
                besediloNesrece += clear(klas)+"<br />";
            }
            if(document.URL.indexOf("vzrok") != -1)
            {
                var vzrok = get("vzrok");
                besediloNesrece += clear(vzrok)+"<br />";
            }

            var iw = new google.maps.InfoWindow({
                content: besediloNesrece
            });
            google.maps.event.addListener(marker, "click", function(e) {
                iw.open(map, this);
            });
        }

        <?php  } endforeach;?>
    }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=APIKEY&callback=initMap">
</script>


<?php include_once "functions/php/footer.php"; ?>