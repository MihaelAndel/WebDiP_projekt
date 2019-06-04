<?php
require_once '../php/baza.class.php';
header("Content-type: application/xml");
$korID = (int)$_REQUEST["korid"];

$baza = new Baza();
$baza->spojiDB();
$sqlZahtjevi = "SELECT z.id_zahtjev_za_uslugu AS zID, z.opis_slike AS opis, k.korisnicko_ime AS korime "
    . "FROM korisnik k, zahtjev_za_uslugu z, lokacija l, moderator_lokacija m "
    . "WHERE k.id_korisnik = z.korisnik_id "
    . "AND l.id_lokacija = z.lokacija_id "
    . "AND m.lokacija_id_lokacija = l.id_lokacija "
    . "AND m.korisnik_id_korisnik = $korID "
    . "AND z.odobren = 1 AND z.odraden IS NULL";

$rezultatZahtjevi = $baza->selectDB($sqlZahtjevi);

$xmlHeader = "<?xml version='1.0'?><popis-zahtjeva></popis-zahtjeva>";
$xml = new SimpleXMLElement($xmlHeader);

while ($red = mysqli_fetch_assoc($rezultatZahtjevi)) {
    $zahtjev = $xml->addChild("zahtjev");
    $zahtjev->addChild("korime", $red["korime"]);
    $zahtjev->addChild("id", $red["zID"]);
    $zahtjev->addChild("opis", $red["opis"]);
}

echo $xml->asXML();

$baza->zatvoriDB();
