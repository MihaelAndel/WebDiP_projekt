<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';
$korime = $_GET["korime"];
$baza = new Baza();

$baza->spojiDB();

$sqlKor = "SELECT id_korisnik FROM korisnik WHERE korisnicko_ime = '$korime'";
$korID = mysqli_fetch_assoc($baza->selectDB($sqlKor))["id_korisnik"];
$sql = "SELECT s.putanja AS putanja, z.opis_slike AS opis "
    . "FROM slika s, zahtjev_za_uslugu z "
    . "WHERE s.zahtjev_za_uslugu_id = z.id_zahtjev_za_uslugu "
    . "AND z.korisnik_id = '{$korID}'"
    . "AND s.korisnik_oznacen = 1 "
    . "AND z.postavljena_slika IS NOT NULL";

$rezultat = $baza->selectDB($sql);

$header = "<?xml version='1.0'?><popis-slika></popis-slika>";

$xml = new SimpleXMLElement($header);

while ($red = mysqli_fetch_assoc($rezultat)) {
    $slika = $xml->addChild("slika");
    $slika->addChild("putanja", $red["putanja"]);
    $slika->addChild("opis", $red["opis"]);
}

echo $xml->asXML();

$baza->zatvoriDB();
