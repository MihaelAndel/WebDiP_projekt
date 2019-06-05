<?php
header("Content-type: application/xml");
require_once '../php/baza.class.php';

$baza = new Baza();
$baza->spojiDB();

$header = "<?xml version='1.0'?><popis-zahtjeva></popis-zahtjeva>";
$xml = new SimpleXMLElement($header);

$sql = "SELECT z.id_zahtjev_za_najam AS id, k.korisnicko_ime AS korime, z.pocetak_najma AS pocetak, z.kraj_najma AS kraj "
    . "FROM zahtjev_za_najam z, korisnik k "
    . "WHERE k.id_korisnik = z.korisnik_id "
    . "AND z.odobren IS NULL";

$rezultat = $baza->selectDB($sql);

while ($red = mysqli_fetch_assoc($rezultat)) {
    $zahtjev = $xml->addChild("zahtjev");
    $zahtjev->addChild("id", $red["id"]);
    $zahtjev->addChild("korime", $red["korime"]);
    $zahtjev->addChild("pocetak", $red["pocetak"]);
    $zahtjev->addChild("kraj", $red["kraj"]);

    $id = (int)$red["id"];
    $sqlOprema = "SELECT o.naziv AS naziv FROM iznajmljena_oprema i, oprema o "
        . "WHERE i.oprema_id = o.id_oprema AND i.zahtjev_za_najam_id = $id";
    $rezultatOprema = $baza->selectDB($sqlOprema);
    $oprema = $zahtjev->addChild("popis-opreme");
    while ($redOprema = mysqli_fetch_assoc($rezultatOprema)) {
        $oprema->addChild("naziv", $redOprema["naziv"]);
    }
}

echo $xml->asXML();

$baza->zatvoriDB();
