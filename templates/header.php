<?php
$putanja = "..";
$id = "";
$captcha = "";
if (isset($index)) {
    $putanja = ".";
    $id = "index";
}
$skripte = '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>'
    . '<script src="' . $putanja . '/javascript/app.js"></script>';
if (isset($registracija)) {
    $captcha = "onload=createCaptcha()";
    $skripte .= " <script src='../javascript/registracija.js'></script>";
    $skripte .= " <script src='../javascript/captcha.js'></script>";
}
if (isset($prijava)) {
    $skripte .= " <script src='../javascript/prijava.js'></script>";
}
if (isset($novaLozinka)) {
    $skripte .= " <script src='../javascript/nova-lozinka.js'></script>";
}
if (isset($opremaLokacija)) {
    $skripte .= " <script src='../javascript/oprema-lokacija.js'></script>";
}
if (isset($zahtjevi)) {
    $skripte .= " <script src='../javascript/zahtjevi-lokacija.js'></script>";
}

?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $css ?>">
    <?php echo $skripte; ?>
    <title><?php echo $title ?></title>
</head>

<body <?php if ($id === "index") echo "id='index' $captcha" ?>>
    <?php include "$putanja/templates/tip-korisnika.php"; ?>
    <header>
        <a href='<?php echo $putanja ?>/index.php'>
            <h1 id='naslov'><?php echo $naslov; ?></h1>
        </a>
        <nav>
            <ul id='navigacija'>
            </ul>
        </nav>

        <?php

        if (!isset($_SESSION["korisnik"])) {
            echo "<nav class='prijava-registracija'>"
                . "<ul>"
                . "<li> <a href='{$putanja}/obrasci/prijava.php'>Prijava</a> </li>"
                . "<li> <a href='{$putanja}/obrasci/registracija.php'>Registracija</a> </li>"
                . "</ul>"
                . "</nav>";
        } else {

            echo "<p id='odjava'>Dobrodošli, " . $_SESSION["korisnik"] .
                "<br><a href='{$putanja}/php/odjava.php'>Odjava</a></p>";
        }
        ?>
    </header>