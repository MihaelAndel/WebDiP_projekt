<?php
require_once '../php/baza.class.php';

$baza = new Baza();
$baza->spojiDB();

$naziv = $_POST["naziv"];
$nabava = $_POST["nabava"];
$najam = $_POST["najam"];
$tip = $_POST["tip"];
$lokacija = $_POST["lokacija"];
$nabava = $nabava . "kn";
$najam = $najam . "kn";


$sql = "INSERT INTO oprema (vrsta_opreme_id, lokacija_id, naziv, najamna_cijena, nabavna_cijena) "
    . "VALUES($tip, $lokacija, '$naziv', '$najam', '$nabava')";
$baza->updateDB($sql);

$baza->zatvoriDB();
