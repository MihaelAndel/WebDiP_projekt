<?php
require_once '../php/baza.class.php';

foreach ($_POST as $k => $v) {
    if (empty($v)) {
        echo "<script>alert('Nisu ispunjena sva polja!');</script>";
        header("Location: ../obrasci/zahtjev-za-slikanje.php");
        exit();
    }
}

$korime = $_POST["korime"];
$lokacija = $_POST["lokacija"];
$opisSlike = $_POST["opis-slike"];

$baza = new Baza();
$baza->spojiDB();

$sqlKorisnik = "SELECT id_korisnik FROM korisnik WHERE korisnicko_ime = '$korime'";
$rezulatKorisnik = $baza->selectDB($sqlKorisnik);
$red = mysqli_fetch_assoc($rezulatKorisnik);
$korisnikID = $red["id_korisnik"];

$oznaci = 0;
$marketing = 0;
if (isset($_POST["oznacavanje"])) {
    $oznaci = 1;
}

if (isset($_POST["marketing"])) {
    $marketing = 1;
}

$sql = "INSERT INTO zahtjev_za_uslugu "
    . "(korisnik_id, lokacija_id, opis_slike, odobrava_oznacavanje, odobrava_marketing) "
    . "VALUES({$korisnikID}, {$lokacija}, '{$opisSlike}', {$oznaci}, {$marketing})";
$baza->updateDB($sql);
echo $lokacija;
echo $opisSlike;
$baza->zatvoriDB();
