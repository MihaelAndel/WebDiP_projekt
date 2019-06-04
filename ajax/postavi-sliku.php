<?php
require_once '../php/baza.class.php';

$baza = new Baza();

$baza->spojiDB();

$zahtjevID = $_POST["zahtjev"];
$putanja = "/var/www/webdip.barka.foi.hr/2018_projekti/WebDiP2018x003/fotografije/";
$oznacen = 0;
if (isset($_POST["oznaci"])) {
    $oznacen = 1;
}
$oprema = $_POST["oprema"];

$slika = $_FILES["slika"]["name"];
$tmp = $_FILES["slika"]["tmp_name"];

$slikaUpload = rand(1, 100) . $slika;
$slikaUpload = strtolower($slikaUpload);

$putanja = $putanja . $slikaUpload;

move_uploaded_file($tmp, $putanja);

$sql = "INSERT INTO slika (zahtjev_za_uslugu_id, putanja, korisnik_oznacen) "
    . "VALUES($zahtjevID, '{$slikaUpload}', $oznacen)";
$baza->updateDB($sql);

$slikaID = (int)$baza->posljednjiID();


foreach ($oprema as $k => $v) {
    $sqlOprema = "INSERT INTO koristena_u_slikanju VALUES($v, $slikaID)";
    $baza->updateDB($sqlOprema);
}

$sqlUpdate = "UPDATE zahtjev_za_uslugu SET postavljena_slika = 1 WHERE id_zahtjev_za_uslugu = $zahtjevID";
$baza->updateDB($sqlUpdate);


$baza->zatvoriDB();
