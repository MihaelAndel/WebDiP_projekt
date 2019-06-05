<?php
require_once '../php/baza.class.php';

$baza = new Baza();
$baza->spojiDB();

$naziv = $_POST["naziv"];
$zupanija = $_POST["zupanija"];
$regija = $_POST["regija"];

$sql = "INSERT INTO lokacija (naziv, zupanija, regija) VALUES('$naziv', '$zupanija', '$regija')";
$baza->updateDB($sql);

$baza->zatvoriDB();
