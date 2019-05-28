<?php
require_once "../php/sesija.class.php";
Sesija::kreirajSesiju();

$naslov = "Registracija";
$css = "../css/registracija.css";
$registracija = true;
$title = "Registracija";
include '../templates/header.php';
?>

<body onload="createCaptcha()">

    <main>
        <form action="../php/registriraj.php" onsubmit="validateCaptcha()" method="post" autocomplete="off">
            <input autocomplete="false" style="display:none" name="hidden">
            <label for="ime" id="lblIme"></label>
            <input type="text" name="ime" id="ime" placeholder="Ime" required="required">
            <input type="text" name="prezime" id="prezime" placeholder="Prezime" required="required">
            <label for="korisnicko-ime" id="lblKorime"></label>
            <input type="text" name="korisnicko-ime" id="korisnicko-ime" placeholder="Korisničko ime" required="required">
            <label for="email" id="lblEmail"></label>
            <input type="email" name="email" id="email" placeholder="E-Mail" required="required">
            <label for="lozinka" id="lblLozinka"></label>
            <input type="password" name="lozinka" id="lozinka" placeholder="Lozinka" required="required">
            <input type="password" name="ponovljena-lozinka" id="ponovljena-lozinka" placeholder="Ponovljena lozinka" required="required">
            <div id="captcha">
            </div>
            <input type="text" placeholder="Captcha" id="cpatchaTextBox" required="required">
            <input type="submit" id="submit" value="Registriraj se">
        </form>
    </main>

    <?php
    include '../templates/footer.php';
    ?>