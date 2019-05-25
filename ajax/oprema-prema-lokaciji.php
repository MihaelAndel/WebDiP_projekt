<?php
require_once '../php/baza.class.php';

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

while ($red = mysqli_fetch_assoc($rezultat)) {
    echo "<div class='element-oprema'>"
        . "<a href='../oprema_lokacije/oprema.php?oprema={$red["opid"]}'>"
        . "<h2>{$red['onaziv']} - {$red['vnaziv']}</h2>"
        . "</a>"
        . "<ul>"
        . "<li>Nabavna cijena: {$red['nabavna_cijena']}</li>"
        . "<li>Najamna cijena: {$red['najamna_cijena']}</li>"
        . "<li>Lokacija: "
        . "<a href='../oprema_lokacije/lokacija.php?lokacija={$red["lid"]}'>"
        . "<b>{$red['lnaziv']}</b>"
        . "</a>"
        . "</li>"
        . "</ul>"
        . "</div>";
}
$baza->zatvoriDB();
