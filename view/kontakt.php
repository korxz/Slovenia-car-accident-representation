<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 20. 04. 2017
 * Time: 13:41
 */
?>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "bootstrap.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<link real="shortcut icon" type="image/ico" href="static/images/favicon.ico" />
<meta charset="UTF-8" />
<title>Prijavi napako</title>

<head><meta name="viewport" content="width=device-width, initial-scale=1"></head>

<?php require_once ("functions/php/sendEmail.php"); ?>
<?php include_once "functions/php/header.php"; ?>

<div class="container-fluid">
    <p>Če želite prijaviti napako, ki ste jo opazili na naši strani ali kontaktirati avtorje strani nam prosimi pišite na spodnji obrazec.</p>
    <p>Polja označeno z <span style="color:red">*</span> so obvezna.</p>
</div>

<div class="container">
<form class="form-horizontal" role="form" method="post" action="#">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Ime in priimek</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Ime in priimek" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">E-mail<span style="color:red">*</span></label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="primer@naslov.si" >
        </div>
    </div>

    <div class="form-group">
        <label for="message" class="col-sm-2 control-label">Sporočilo<span style="color:red">*</span></label>
        <div class="col-sm-10">
            <textarea class="prijavi form-control" rows="4" name="message" maxlength="500" placeholder="Vaše sporočilo..."></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input id="submit" name="submit" type="submit" value="Pošlji" class="btn btn-primary">
            <div class="g-recaptcha" data-sitekey="6LecrB8UAAAAAAk89J6soMYJFHniC0TJtVZWy1pq"></div>
        </div>
    </div>
</form>
</div>
<?php sendEmail::send(); ?>
<?php include_once "functions/php/footer.php"; ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>