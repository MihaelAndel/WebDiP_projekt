<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';

$baza = new Baza();
$baza->spojiDB();

$sql = "SELECT id_korisnik, ime, prezime, korisnicko_ime, blokiran FROM korisnik";

$rezultat = $baza->selectDB($sql);

$header = "<?xml version='1.0'?><popis-korisnika></popis-korisnika>";

$xml = new SimpleXMLElement($header);

while ($red = mysqli_fetch_assoc($rezultat)) {
    $korisnik = $xml->addChild("korisnik");
    $blokiran = "ne";
    if ((int)$red["blokiran"] === 1) {
        $blokiran = "da";
    }

    $korisnik->addChild("id", $red["id_korisnik"]);
    $korisnik->addChild("ime", $red["ime"]);
    $korisnik->addChild("prezime", $red["prezime"]);
    $korisnik->addChild("korime", $red["korisnicko_ime"]);
    $korisnik->addChild("blokiran", $blokiran);
}


echo $xml->asXML();
$baza->zatvoriDB();
