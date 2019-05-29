<?php
require_once '../php/baza.class.php';
header("Content-type:application/xml");

$korID = $_REQUEST["korid"];
$baza = new Baza();
$baza->spojiDB();

$sql = "SELECT z.id_zahtjev_za_uslugu as id, k.ime AS ime, k.prezime AS prezime, k.korisnicko_ime AS korime, l.naziv AS lnaziv, z.opis_slike AS opis, "
    . "z.odobrava_oznacavanje AS oznacavanje, z.odobrava_marketing AS marketing "
    . "FROM zahtjev_za_uslugu z, moderator_lokacija m, korisnik k, lokacija l "
    . "WHERE z.lokacija_id = m.lokacija_id_lokacija "
    . "AND m.korisnik_id_korisnik = $korID "
    . "AND k.id_korisnik = z.korisnik_id "
    . "AND l.id_lokacija = z.lokacija_id "
    . "AND z.odobren IS NULL";

$rezultat = $baza->selectDB($sql);

$header = "<?xml version='1.0'?><popis-zahtjeva></popis-zahtjeva>";

$xml = new SimpleXMLElement($header);

while ($red = mysqli_fetch_assoc($rezultat)) {
    $oznacavanje = "ne";
    $marketing = "ne";
    if ($red["oznacavanje"] === "1") $oznacavanje = "da";
    if ($red["marketing"] === "1") $marketing = "da";
    $zahtjev = $xml->addChild("zahtjev");
    $zahtjev->addChild("id", $red["id"]);
    $zahtjev->addChild("ime", $red["ime"]);
    $zahtjev->addChild("prezime", $red["prezime"]);
    $zahtjev->addChild("korime", $red["korime"]);
    $zahtjev->addChild("opis", $red["opis"]);
    $zahtjev->addChild("lokacija", $red["lnaziv"]);
    $zahtjev->addChild("oznacavanje", $oznacavanje);
    $zahtjev->addChild("marketing", $marketing);
}
$baza->zatvoriDB();

echo $xml->asXML();
