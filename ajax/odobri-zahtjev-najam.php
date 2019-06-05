<?php
require_once '../php/baza.class.php';

$baza = new Baza();

$baza->spojiDB();

$sql = "UPDATE zahtjev_za_najam SET odobren = 1 WHERE id_zahtjev_za_najam = {$_POST["zahtjev"]}";
$baza->updateDB($sql);

$baza->zatvoriDB();
