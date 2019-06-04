<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';


$baza = new Baza();
$baza->spojiDB();

$sql = "SELECT naziv, id_oprema FROM oprema";

$rezultat = $baza->selectDB($sql);

$header = "<?xml version='1.0'?><popis-opreme></popis-opreme>";

$xml = new SimpleXMLElement($header);

while ($red = mysqli_fetch_assoc($rezultat)) {
    $oprema = $xml->addChild("oprema");
    $oprema->addChild("naziv", $red["naziv"]);
    $oprema->addChild("id", $red["id_oprema"]);
}

echo $xml->asXML();

$baza->zatvoriDB();
