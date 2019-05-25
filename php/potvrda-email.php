<?php
require_once '../php/baza.class.php';
if (isset($_GET["korisnik"])) {
    $korime = $_GET["korisnik"];
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$korime}'";
    $rezultat =  $baza->selectDB($sql);

    if ($red = mysqli_fetch_assoc($rezultat)) {
        $datum = date("Y-m-d H:i:s");
        $datumBaza = strtotime($red["datum_vrijeme_uvjeta"]);
        if ($datumBaza !== null) {
            if ($datum < $datumBaza) {
                echo "<p>Nažalost, vrijeme za aktivaciju Vašeg računa je isteklo!</p>";
            } else {
                $sqlUpdate = "UPDATE korisnik SET datum_vrijeme_uvjeta = NULL WHERE korisnicko_ime = '{$korime}'";
                $baza->updateDB($sqlUpdate);
                echo "<p>Vaš račun je uspješno aktiviran!</p><br><a href='../index.php'>Povratak na početnu stranicu</a>";
            }
        } else {
            echo "<p>Vaš račun je već aktiviran!</p>";
        }
    }
    $baza->zatvoriDB();
} else {
    header("Location: ../index.php");
}
