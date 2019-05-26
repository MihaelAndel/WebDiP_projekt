<?php
require_once '../php/baza.class.php';
header("Content-Type:text/xml");

$lokacija = $_GET["lokacija"];
$sql = "";
if ($lokacija === "default") {
    $sql = "SELECT oprema.id_oprema as opid, oprema.naziv as onaziv, oprema.nabavna_cijena, "
        . "oprema.najamna_cijena, lokacija.id_lokacija as lid, lokacija.naziv as lnaziv, vrsta_opreme.naziv_vrste as vnaziv "
        . "FROM oprema, lokacija, vrsta_opreme "
        . "WHERE oprema.lokacija_id = lokacija.id_lokacija AND oprema.vrsta_opreme_id = vrsta_opreme.id_vrsta_opreme";
} else {
    $sql = "SELECT oprema.id_oprema as opid, oprema.naziv as onaziv, oprema.nabavna_cijena, "
        . "oprema.najamna_cijena, lokacija.id_lokacija as lid, lokacija.naziv as lnaziv, vrsta_opreme.naziv_vrste as vnaziv "
        . "FROM oprema, lokacija, vrsta_opreme "
        . "WHERE oprema.lokacija_id = lokacija.id_lokacija "
        . "AND oprema.vrsta_opreme_id = vrsta_opreme.id_vrsta_opreme "
        . "AND lokacija.naziv = '{$lokacija}'";
}

$baza = new Baza();
$baza->spojiDB();
$rezultat = $baza->selectDB($sql);
echo "<popis-opreme>";
while ($red = mysqli_fetch_assoc($rezultat)) {
    echo "<oprema>"
        . "<naziv poveznica='../oprema_lokacije/oprema.php?oprema={$red["opid"]}'>{$red['onaziv']}</naziv>"
        . "<tip>{$red['vnaziv']}</tip>"
        . "<nabava>{$red['nabavna_cijena']}</nabava>"
        . "<najam>{$red['najamna_cijena']}</najam>"
        . "<lokacija poveznica='../oprema_lokacije/lokacija.php?lokacija={$red["lid"]}'>{$red['lnaziv']}</lokacija>"
        . "</oprema>";
}
echo "</popis-opreme>";
$baza->zatvoriDB();
