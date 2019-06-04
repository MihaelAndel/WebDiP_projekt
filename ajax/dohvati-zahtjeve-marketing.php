<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';

$lokacije = $_GET["popisLokacija"];
$lokacije = explode(',', $lokacije);

$baza = new Baza();
$baza->spojiDB();

$header = "<?xml version='1.0'?><popis-zahtjeva></popis-zahtjeva>";

$xml = new SimpleXMLElement($header);

foreach ($lokacije as $k => $v) {
    $lokacija = (int)$v;
    $sql = "SELECT z.id_zahtjev_za_uslugu AS id, "
        . "k.korisnicko_ime AS korime, z.opis_slike AS opis, "
        . "z.odobrava_oznacavanje AS oznacavanje "
        . "FROM zahtjev_za_uslugu z, korisnik k "
        . "WHERE z.lokacija_id = $lokacija "
        . "AND k.id_korisnik = z.korisnik_id "
        . "AND z.odobren = 1 AND z.odraden IS NOT NULL "
        . "AND z.odobrava_marketing = 1 "
        . "AND z.postavljena_slika IS NULL";

    $rezultat = $baza->selectDB($sql);

    while ($red = mysqli_fetch_assoc($rezultat)) {
        $zahtjev = $xml->addChild("zahtjev");
        $zahtjev->addChild("id", $red["id"]);
        $zahtjev->addChild("korime", $red["korime"]);
        $zahtjev->addChild("opis", $red["opis"]);
        $zahtjev->addChild("oznacavanje", $red["oznacavanje"]);
    }
}

echo $xml->asXML();
$baza->zatvoriDB();
