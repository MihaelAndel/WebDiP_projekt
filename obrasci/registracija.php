<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/registracija.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../javascript/app.js"></script>
    <script src="../javascript/registracija.js"></script>
    <script src="../javascript/captcha.js"></script>

    <title>Registracija</title>
</head>

<body onload="createCaptcha()">
    <?php include '../templates/tip-korisnika.php'; ?>
    <?php
    $naslov = "Registracija";
    include '../templates/header.php';
    ?>

    <main>
        <div>
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
    </div>
        
    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>