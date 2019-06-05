<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();

if (!isset($_SESSION["tip"]) || $_SESSION["tip"] > 1) {
    header("Location: ../index.php");
}

$kreiranjeOpreme = true;
$css = "../css/kreiranje-opreme.css";
$naslov = "Kreiranje opreme";
$title = "Kreiranje opreme";
require_once '../templates/header.php';

?>

<main>
    <form action="" id="forma">
        <input type="text" name="naziv" id="naziv" placeholder="Naziv">
        <select name="tip" id="popis-tipova">

        </select>
        <select name="lokacija" id="popis-lokacija">

        </select>
        <input type="text" name="nabavna-cijena" id="nabavna-cijena" placeholder="Nabavna cijena">
        <input type="text" name="najamna-cijena" id="najamna-cijena" placeholder="Najamna cijena">
        <input type="submit" value="Kreiraj" id="kreiraj">
    </form>
</main>


<?php
require_once '../templates/footer.php';
