<?php


/** @var mysqli $db */
require_once "includes/database.php";

$user = [];
$voornaam = "";
$achternaam = "";
$email = "";
$telefoonummer = "";
$bericht1 = "";
$bericht2 = "";
$bericht3 = "";
$bericht4 = "";
$bericht5 = "";


$errors = [];

if (isset($_POST['submit'])) {

    $voornaam = htmlentities($_POST['voornaam']);
    $achternaam = htmlentities($_POST['achternaam']);
    $email = htmlentities($_POST['email']);
    $telefoonummer = htmlentities($_POST['telefoonummer']);
    $bericht1 = htmlentities($_POST['bericht1']);
    $bericht2 = htmlentities($_POST['bericht2']);
    $bericht3 = htmlentities($_POST['bericht3']);
    $bericht4 = htmlentities($_POST['bericht4']);
    $bericht5 = htmlentities($_POST['bericht5']);


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
    if ($bericht1 == "") {
        $errors['bericht1'] = "Vul aub je reserveringsdetails in";
    }
    if ($bericht2 == "") {
        $errors['bericht2'] = "Vul aub je reserveringsdetails in";
    }
    if ($bericht3 == "") {
        $errors['bericht3'] = "Vul aub je reserveringsdetails in";
    }
    if ($bericht4 == "") {
        $errors['bericht4'] = "Vul aub je reserveringsdetails in";
    }
    if ($bericht5 == "") {
        $errors['bericht5'] = "Vul aub je reserveringsdetails in";
    }

    if (empty($errors)) {
        $voornaam = mysqli_real_escape_string($db, $voornaam);
        $achternaam = mysqli_real_escape_string($db, $achternaam);
        $email = mysqli_real_escape_string($db, $email);
        $telefoonummer = mysqli_real_escape_string($db, $telefoonummer);
        $bericht1 = mysqli_real_escape_string($db, $bericht1);
        $bericht2 = mysqli_real_escape_string($db, $bericht2);
        $bericht3 = mysqli_real_escape_string($db, $bericht3);
        $bericht4 = mysqli_real_escape_string($db, $bericht4);
        $bericht5 = mysqli_real_escape_string($db, $bericht5);

        $query = "INSERT INTO reservations (voornaam, achternaam, email, telefoonummer, bericht1, bericht2, bericht3, bericht4, bericht5)
    VALUES ('$voornaam', '$achternaam', '$email', '$telefoonummer', '$bericht1', '$bericht2', '$bericht3', '$bericht4', '$bericht5')";
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
                <label for="bericht1"><strong>kies je producten</strong></label>
                <select name="bericht1" id="bericht1">
                    <option value="">-- Selecteer een product --</option>
                    <option value="spijkerbroeken 1kg">spijkerbroeken 1kg</option>
                    <option value="spijkerbroeken 10kg">spijkerbroeken 10kg</option>
                    <option value="spijkerbroeken 50kg">spijkerbroeken 50kg</option>
                </select>

                <label for="bericht2"><strong>kies je producten</strong></label>
                <select name="bericht2" id="bericht2">
                    <option value="">-- Selecteer een product --</option>
                    <option value="niveau a en b kleren 1kg">niveau a & b kleren 1kg</option>
                    <option value="niveau a en b kleren 10kg">niveau a & b kleren 10kg</option>
                    <option value="niveau a en b kleren 50kg">niveau a & b kleren 50kg</option>
                </select>
                <label for="bericht3"><strong>kies je producten</strong></label>
                <select name="bericht3" id="bericht3">
                    <option value="">-- Selecteer een product --</option>
                    <option value="schoenen 1kg">schoenen 1kg</option>
                    <option value="schoenen 10kg">schoenen 10kg</option>
                    <option value="schoenen 50kg">schoenen 50kg</option>
                </select>
                <label for="bericht4"><strong>kies je producten</strong></label>
                <select name="bericht4" id="bericht4">
                    <option value="">-- Selecteer een product --</option>
                    <option value=" vintage kleren 1kg">vintage kleren 1kg</option>
                    <option value="vintage kleren 10kg">vintage kleren 10kg</option>
                    <option value="vintage kleren 50kg">vintage   kleren 50kg</option>
                </select>
                <label for="bericht5"><strong>kies je producten</strong></label>
                <select name="bericht5" id="bericht5">
                    <option value="">-- Selecteer een product --</option>
                    <option value=" vintage kleren 1kg" >recycled kleren 1kg</option>
                    <option value="vintage kleren 10kg">recycled kleren 10kg</option>
                    <option value="vintage kleren 50kg">recycled kleren 50kg</option>
                </select>

            </div>
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
