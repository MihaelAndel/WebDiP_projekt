<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';

$baza = new Baza();
$baza->spojiDB();

$korime = $_GET["korime"];

$sqlKorID = "SELECT id_korisnik FROM korisnik WHERE korisnicko_ime = '$korime'";
$rezultatKorisnik = $baza->selectDB($sqlKorID);
$korID = "";
while ($red = mysqli_fetch_assoc($rezultatKorisnik)) {
    $korID = $red["id_korisnik"];
}

$sql = "SELECT z.id_zahtjev_za_uslugu as id, l.naziv as lokacija, z.opis_slike as opis, z.odobrava_oznacavanje as oz, "
    . "z.odobrava_marketing as mar, z.odobren as status, z.datum_odobrenja_odbijanja as datum "
    . "FROM zahtjev_za_uslugu z, lokacija l "
    . "WHERE z.korisnik_id = {$korID} AND z.lokacija_id = l.id_lokacija";
$rezultat = $baza->selectDB($sql);

$header = "<?xml version='1.0'?><popis-zahtjeva></popis-zahtjeva>";
$xml = new SimpleXMLElement($header);

while ($red = mysqli_fetch_assoc($rezultat)) {
    $oznacavanje = "ne";
    $marketing = "ne";
    $status = "u toku";
    $klasa = "u-toku";
    if ($red["oz"] === "1") {
        $oznacavanje = "da";
    }
    if ($red["mar"] === "1") {
        $marketing = "da";
    }
    if ($red["status"] === "1") {
        $status = "odobren";
        $klasa = "odobren";
    }
    if ($red["status"] === "0") {
        $status = "odbijen";
        $klasa = "odbijen";
    }

    $zahtjev = $xml->addChild("zahtjev");
    $zahtjev->addChild("id", $red["id"]);
    $zahtjev->addChild("lokacija", $red["lokacija"]);
    $zahtjev->addChild("opis", $red["opis"]);
    $zahtjev->addChild("oznacavanje", $oznacavanje);
    $zahtjev->addChild("marketing", $marketing);
    $zahtjev->addChild("klasa", $klasa);
    $zahtjev->addChild("status", $status);
}

echo $xml->asXML();
$baza->zatvoriDB();
