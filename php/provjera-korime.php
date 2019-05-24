<?php
require '../php/baza.class.php';

$korime = $_GET["korime"];
$sql = "SELECT * FROM korisnik WHERE korisnicko_ime = " . "'" . $korime . "'";
$baza = new Baza();

$baza->spojiDB();
$rezultat = $baza->selectDB($sql);

$pronaden = false;
while ($red = mysqli_fetch_assoc($rezultat)) {
    $pronaden = true;
}

if ($pronaden) echo "1";
else echo "0";
