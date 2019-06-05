<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';

$sqlLokacija = "SELECT naziv, id_lokacija FROM lokacija ORDER BY 1";
$baza = new Baza();
$baza->spojiDB();
$rezultatLokacija = $baza->selectDB($sqlLokacija);

$header = "<?xml version='1.0'?><lokacije></lokacije>";
$xml = new SimpleXMLElement($header);

while ($red = mysqli_fetch_assoc($rezultatLokacija)) {
    $lokacija = $xml->addChild("lokacija");
    $lokacija->addChild("naziv", $red["naziv"]);
    $lokacija->addChild("id", $red["id_lokacija"]);
}

echo $xml->asXML();
$baza->zatvoriDB();
