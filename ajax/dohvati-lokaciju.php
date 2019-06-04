<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';
$baza = new Baza();

$korime = $_GET["korime"];

$baza->spojiDB();

$sql = "SELECT l.id_lokacija AS id FROM lokacija l, moderator_lokacija m, korisnik k "
    . "WHERE k.korisnicko_ime = '{$korime}' AND k.id_korisnik = m.korisnik_id_korisnik "
    . "AND m.lokacija_id_lokacija = l.id_lokacija";

$rezultat = $baza->selectDB($sql);

$lokacijaBaza = array();

while ($red = mysqli_fetch_assoc($rezultat)) {
    array_push($lokacijaBaza, $red["id"]);
}

$baza->zatvoriDB();


$header = "<?xml version='1.0'?><lokacije></lokacije>";

$xml = new SimpleXMLElement($header);

foreach ($lokacijaBaza as $k => $v) {
    $xml->addChild("lokacija", $v);
}

echo $xml->asXML();
