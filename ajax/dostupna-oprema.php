<?php
require_once '../php/baza.class.php';

header("Content-type: application/xml");

$korid = (int)$_REQUEST["korid"];
$pocetak = $_REQUEST["pocetak"];
$kraj = $_REQUEST["kraj"];
$datum = date("Y-m-d");

$sqlNeiznajmljeni = "SELECT DISTINCT o.naziv AS naziv, o.id_oprema AS id FROM oprema o LEFT JOIN iznajmljena_oprema i ON o.id_oprema = i.oprema_id "
    . "JOIN lokacija l ON o.lokacija_id = l.id_lokacija "
    . "JOIN moderator_lokacija m ON l.id_lokacija = m.lokacija_id_lokacija "
    . "WHERE i.oprema_id IS NULL AND $korid = m.korisnik_id_korisnik";

$sqlDrugi = "";

if ($pocetak == "" || $kraj == "") {

    $sqlDrugi = "SELECT DISTINCT o.naziv AS naziv, o.id_oprema AS id "
        . "FROM korisnik k, oprema o, lokacija l, moderator_lokacija m, zahtjev_za_najam z, iznajmljena_oprema i "
        . "WHERE "
        . "k.id_korisnik = $korid "
        . "AND m.korisnik_id_korisnik = k.id_korisnik "
        . "AND m.lokacija_id_lokacija = l.id_lokacija "
        . "AND o.lokacija_id = l.id_lokacija "
        . "AND o.id_oprema = i.oprema_id "
        . "AND z.id_zahtjev_za_najam = i.zahtjev_za_najam_id "
        . "AND '$datum' NOT BETWEEN z.pocetak_najma AND z.kraj_najma";
} else {
    $sqlDrugi = "SELECT DISTINCT o.naziv AS naziv, o.id_oprema AS id "
        . "FROM korisnik k, oprema o, lokacija l, moderator_lokacija m, zahtjev_za_najam z, iznajmljena_oprema i "
        . "WHERE "
        . "k.id_korisnik = $korid "
        . "AND m.korisnik_id_korisnik = k.id_korisnik "
        . "AND m.lokacija_id_lokacija = l.id_lokacija "
        . "AND o.lokacija_id = l.id_lokacija "
        . "AND o.id_oprema = i.oprema_id "
        . "AND z.id_zahtjev_za_najam = i.zahtjev_za_najam_id "
        . "AND '$kraj' NOT BETWEEN z.pocetak_najma AND z.kraj_najma "
        . "AND '$pocetak' NOT BETWEEN z.pocetak_najma AND z.kraj_najma "
        . "AND ('$pocetak' > z.kraj_najma OR '$kraj' < z.pocetak_najma)";
}

$baza = new Baza();
$baza->spojiDB();
$rezultatNeiznajmljeni = $baza->selectDB($sqlNeiznajmljeni);
$rezultatDrugi = $baza->selectDB($sqlDrugi);

$xmlHeader = "<?xml version='1.0'?><popis-opreme></popis-opreme>";
$xml = new SimpleXMLElement($xmlHeader);

while ($red = mysqli_fetch_assoc($rezultatNeiznajmljeni)) {
    $oprema = $xml->addChild("Oprema");
    $oprema->addChild("naziv", $red["naziv"]);
    $oprema->addChild("id", $red["id"]);
}
while ($red = mysqli_fetch_assoc($rezultatDrugi)) {
    $oprema = $xml->addChild("Oprema");
    $oprema->addChild("naziv", $red["naziv"]);
    $oprema->addChild("id", $red["id"]);
}

echo $xml->asXML();


$baza->zatvoriDB();
