<?php
require_once '../php/baza.class.php';

$lokacija = $_POST["lokacija"];
$moderator = $_POST["moderator"];

$baza = new Baza();

$baza->spojiDB();

$sqlProvjera = "SELECT * FROM moderator_lokacija m WHERE m.korisnik_id_korisnik = $moderator "
    . "AND m.lokacija_id_lokacija = $lokacija";

$rezultatProvjera = $baza->selectDB($sqlProvjera);
while ($red = mysqli_fetch_assoc($rezultatProvjera)) {
    if ($red) {
        echo "Ovaj moderator već moderira lokaciju!";
        exit;
    }
}

$sqlInsert = "INSERT INTO moderator_lokacija (korisnik_id_korisnik, lokacija_id_lokacija) VALUES($moderator, $lokacija)";
$baza->updateDB($sqlInsert);
echo "Uspjeh!";

$baza->zatvoriDB();
