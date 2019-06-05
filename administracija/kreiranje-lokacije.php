<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();

if (!isset($_SESSION["tip"]) || $_SESSION["tip"] > 1) {
    header("Location: ../index.php");
}

$kreiranjeLokacije = true;
$css = "../css/kreiranje-lokacije.css";
$naslov = "Kreiranje lokacije";
$title = "Kreiranje lokacije";
require_once '../templates/header.php';

?>

<main>
    <form action="" id="forma">
        <input type="text" name="naziv" id="naziv" placeholder="Naziv">
        <input type="text" name="regija" id="regija" placeholder="Regija">
        <input type="text" name="zupanija" id="zupanija" placeholder="Županija">
        <input type="submit" value="Kreiraj" id="kreiraj">
    </form>
</main>


<?php
require_once '../templates/footer.php';
