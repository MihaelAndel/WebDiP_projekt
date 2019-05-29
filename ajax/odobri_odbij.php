<?php
require_once '../php/baza.class.php';
$odgovor = $_GET["odgovor"];
$id = $_GET["id"];
$datum = date("Y-m-d");

$id = (int)$id;
$sql = "";
if ($odgovor === "odobri") {
    $sql = "UPDATE zahtjev_za_uslugu SET odobren = 1, datum_odobrenja_odbijanja = '$datum' WHERE id_zahtjev_za_uslugu = $id";
} else if ($odgovor === "odbij") {
    $sql = "UPDATE zahtjev_za_uslugu SET odobren = 0, datum_odobrenja_odbijanja = '$datum' WHERE id_zahtjev_za_uslugu = $id";
}

$baza = new Baza();
$baza->spojiDB();

$baza->updateDB($sql);
$baza->zatvoriDB();
