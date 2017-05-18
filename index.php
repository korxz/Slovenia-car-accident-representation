<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 21. 03. 2017
 * Time: 12:10
 */


// enables sessions for the entire app
session_start();

require_once( "controller/NesrecaController.php");
require_once ("controller/IdejaController.php");
require_once ("controller/PregledController.php");
require_once ("controller/KontaktController.php");

define("BASE_URL", "Prometne-MVC");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

/* Uncomment to see the contents of variables
  var_dump(BASE_URL);
  var_dump(IMAGES_URL);
  var_dump(CSS_URL);
  var_dump($path);
  exit(); */

// ROUTER: defines mapping between URLS and controllers
$urls = [
    "zacetna" => function () {
        NesrecaController::index();
    },
    "ideja" => function () {
        IdejaController::index();
    },
    "pregled" => function () {
    #prestel bo koliko parametrov je nastavljeni v poizvedbi
    $counter = 0;
    $boolean_vzrok = false;
    $boolean_klas = false;
    $boolean_tip = false;
        if(isset($_GET["tip"])) {
            $counter++;
            $boolean_tip = true;
        }
        if(isset($_GET["klas"])) {
            $counter++;
            $boolean_klas = true;
        }
        if(isset($_GET["vzrok"])) {
            $counter++;
            $boolean_vzrok = true;
        }

        if($counter == 1) {
            if($boolean_vzrok) {
                PregledController::Vzrok($_GET["vzrok"], $_GET["omejitevQuery"]);
            }
            elseif ($boolean_klas) {
                PregledController::Klas($_GET["klas"], $_GET["omejitevQuery"]);
            }
            elseif ($boolean_tip) {
                PregledController::Tip($_GET["tip"], intval($_GET["omejitevQuery"]));
            }
        }
        elseif ($counter == 2) {
            if($boolean_klas && $boolean_tip) {
                PregledController::TipKlas($_GET["tip"], $_GET["klas"], $_GET["omejitevQuery"]);
            }
            elseif ($boolean_klas && $boolean_vzrok) {
                PregledController::KlasVzrok($_GET["klas"], $_GET["vzrok"], $_GET["omejitevQuery"]);
            }
            elseif ($boolean_vzrok && $boolean_tip) {
                PregledController::TipVzrok($_GET["tip"], $_GET["vzrok"], $_GET["omejitevQuery"]);
            }
        }
        elseif (($counter == 3)) {
            PregledController::TipKlasVzrok($_GET["tip"], $_GET["klas"], $_GET["vzrok"], $_GET["omejitevQuery"]);
        }
        PregledController::index();

    },

    "kontakt" => function() {
        KontaktController::index();
    },

    "" => function () {
        ViewHelper::redirect("zacetna");
    },
];

try {
    if (isset($urls[$path])) {
        $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (InvalidArgumentException $e) {
    ViewHelper::error404();
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
}
