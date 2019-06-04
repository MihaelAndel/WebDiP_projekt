<?php
require_once '../php/baza.class.php';

$pocetak = $_POST["pocetak"];
$kraj = $_POST["kraj"];
$korid = (int)$_POST["korid"];
$oprema = $_POST["oprema"];
$zahtjev = (int)$_POST["zid"];

$baza = new Baza();
$baza->spojiDB();

$sql = "INSERT INTO zahtjev_za_najam (korisnik_id, pocetak_najma, kraj_najma) "
    . "VALUES($korid, '{$pocetak}', '{$kraj}')";
$baza->updateDB($sql);

$zahtjevID = (int)$baza->posljednjiID();

for ($i = 0; $i < sizeof($oprema); $i++) {
    $id = (int)$oprema[$i];
    $sqlOprema = "INSERT INTO iznajmljena_oprema (oprema_id, zahtjev_za_najam_id) "
        . "VALUES($id, $zahtjevID)";
    $baza->updateDB($sqlOprema);
}

$sqlZahtjev = "UPDATE zahtjev_za_uslugu SET odraden = 1 WHERE id_zahtjev_za_uslugu = $zahtjev";
$baza->updateDB($sqlZahtjev);

$baza->zatvoriDB();
