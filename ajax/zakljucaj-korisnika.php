<?php
require_once '../php/baza.class.php';

$id = (int)$_POST["id"];

$baza = new Baza();

$baza->spojiDB();

$sql = "UPDATE korisnik SET blokiran = 1 WHERE id_korisnik = $id";
$baza->updateDB($sql);


$baza->zatvoriDB();
