<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';

$baza = new Baza();

$baza->spojiDB();

$sql = "SELECT id_korisnik, korisnicko_ime FROM korisnik WHERE uloga_id = 2";
$rezultat = $baza->selectDB($sql);

$header = "<?xml version='1.0'?><moderatori></moderatori>";
$xml = new SimpleXMLElement($header);

while ($red = mysqli_fetch_assoc($rezultat)) {
    $moderator = $xml->addChild("moderator");
    $moderator->addChild("id", $red["id_korisnik"]);
    $moderator->addChild("korime", $red["korisnicko_ime"]);
}


echo $xml->asXML();
$baza->zatvoriDB();
