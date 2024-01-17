<?php


/** @var mysqli $db */
require_once "includes/database.php";

$user = [];
$voornaam = "";
$achternaam = "";
$email = "";
$telefoonummer = "";


$errors = [];

if (isset($_POST['submit'])) {

    $voornaam = htmlentities($_POST['voornaam']);
    $achternaam = htmlentities($_POST['achternaam']);
    $email = htmlentities($_POST['email']);
    $telefoonummer = htmlentities($_POST['telefoonummer']);
    $reserveringsdetails = htmlentities($_POST['reserveringsdetails']);

    // Validation
    if ($voornaam == "") {
        $errors['voornaam'] = "vul aub je voornaam in";
    }
    if ($achternaam == "") {
        $errors['achternaam'] = "vul alsjeblieft je achternaam in";
    }
    if ($email == "") {
        $errors['e-mail'] = "Vul aub je email in";
    }
    if ($telefoonummer == "") {
        $errors['telefoonummer'] = "Vul aub je telefoonummer in";
    }
    if ($reserveringsdetails == "") {
        $errors['reserveringsdetails'] = "Vul aub je reserveringsdetails in";
    }

    if (empty($errors)) {
        $voornaam = mysqli_real_escape_string($db, $voornaam);
        $achternaam = mysqli_real_escape_string($db, $achternaam);
        $email = mysqli_real_escape_string($db, $email);
        $telefoonummer = mysqli_real_escape_string($db, $telefoonummer);
        $reserveringsdetails = mysqli_real_escape_string($db, $reserveringsdetails);

        $query = "INSERT INTO reservations (voornaam, achternaam, email, telefoonummer, reserveringsdetails)
                    VALUES('$voornaam', '$achternaam', '$email', '$telefoonummer', '$reserveringsdetails')";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: homepage.php');
        } else {
            $errors['db'] = mysqli_error($db);
        }
    }
}



?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="stylereserveringspagina.css">
</head>

<body>
<nav>
    <div class="imgnav">
        <img src="images/adatextiel-logo.png" alt="">
    </div>
    <div class="navigatie">
        <a href="homepage.php">HOME</a>
        <a href="overonspage.php">OVER ONS</a>
        <a href="producten.php">PRODUCTEN</a>
        <a href="duurzaamheid.php">DUURZAAMHEID</a>
        <a href="reserveringspagina.php">RESERVERING</a>
        <div class="search-container">
            <input type="search" name="" id="search" placeholder="search"">
            <span class=" icon is-small is-left"><i "></i></span>
        </div>
    </div>
</nav>

<div class=" white-background">
</div>
<div class="gray-background"></div>

<section>
    <p class="zin">
        Vul aub ons contactformulier hieronder in als u geintresseerd bent in onze producten en meer
        informatie wilt
    </p>
</section>

<form action="" method="post">
    <div class="geheel">
        <div class="linkerkant">
            <div class="onderelkaar1">
                <label for="voornaam"><strong>Voornaam*</strong></label>
                <input type="text" name="voornaam" required id="voornaam" placeholder="Voornaam">
            </div>
            <div class="onderelkaar2">
                <label for="last-name"><strong>Achternaam*</strong></label>
                <input type="text" name="achternaam" id="last-name" placeholder="Achternaam">
            </div>

            <div class="onderelkaar3">
                <label for="email"><strong>Email*</strong></label>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>

            <div class="onderelkaar4">
                <label for="telefoonummer"><strong>Telefoonummer*</strong></label>
                <input type="text" name="telefoonummer" id="telefoonummer" placeholder="Telefoonummer">
            </div>
        </div>
        <div class="rechterkant">
            <div class="onderelkaar5">
                <label for="bericht"><strong>Bericht*</strong></label>
                <textarea name="reserveringsdetails" id="reserveringsdetails" placeholder="vul een datum en tijd in dan zullen wij zo snel mogelijk terug reageren."required cols="30" rows="10"
                          style="width: 395px; height: 417px;"></textarea>
            </div>
        </div>
    </div>
    <div class="button1">
        <button class="button is-link is-fullwidth" type="submit" name="submit">vraag om een
            reservatie</button>
    </div>
</form>
<footer>
    <div class="footstuk">
        <div class="bottom">
            <div class="photo">
                <img class="footerimg" src="images/adalogotr.png" alt="logo">
            </div>
            <img src="images/niwologo.png" width="120px" height="100px">
            <img src="images/kiwalogo.png" width="110px" height="100px">

        </div>



        <div class="footerinfo">
            <p>+31 10 226 85 47</p>
            <p>info@adatex.nl</p>
            <p>Heldringstraat 39</p>
            <p>3144 CE – Maassluis</p>
            <p>The Netherlands</p>
        </div>
    </div>
</footer>



</body>

</html>
