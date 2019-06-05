<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';

$baza = new Baza();

$baza->spojiDB();

$sql = "SELECT id_vrsta_opreme, naziv_vrste FROM vrsta_opreme";

$rezultat = $baza->selectDB($sql);

$header = "<?xml version='1.0'?><popis-tipova></popis-tipova>";
$xml = new SimpleXMLElement($header);

while ($red = mysqli_fetch_assoc($rezultat)) {
    $tip = $xml->addChild("tip");
    $tip->addChild("id", $red["id_vrsta_opreme"]);
    $tip->addChild("naziv", $red["naziv_vrste"]);
}

echo $xml->asXML();
$baza->zatvoriDB();
