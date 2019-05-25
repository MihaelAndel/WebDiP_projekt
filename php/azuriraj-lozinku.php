<?php
require_once '../php/baza.class.php';

$korime = $_POST["korime"];
$lozinka = $_POST["lozinka"];
$lozinkaP = $_POST["lozinkaP"];

$znakovi = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$sol = "";
for ($i = 0; $i < 10; $i++) {
    $sol .= $znakovi[rand(0, strlen($znakovi) - 1)];
}
$lozinkaK = md5($lozinka . $sol);

if ($lozinka === $lozinkaP) {
    $sql = "UPDATE korisnik set lozinka = '{$lozinka}'," .
        "lozinka_kriptirano = '{$lozinkaK}', kljuc_lozinka = null, datum_kljuc = null WHERE korisnicko_ime = '{$korime}'";
    $baza = new Baza();
    $baza->spojiDB();
    $baza->updateDB($sql);
    $baza->zatvoriDB();
    echo 'Uspješno ste ažurirali svoju lozinku!';
} else {
    echo "<script> alert('Lozinke nisu jednake!') <script/>";
    header("Location: ../index.php");
}
