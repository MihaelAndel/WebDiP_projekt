<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();

if (!isset($_SESSION["tip"]) || $_SESSION["tip"] > 1) {
    header("Location: ../index.php");
}

$dodjela = true;
$css = "../css/kreiranje-moderatora.css";
$naslov = "Dodjela moderatora";
$title = "Dodjela moderatora";
require_once '../templates/header.php';
?>


<main>
    <form action="" id="frm-dodjela">
        <label for="lokacija">Odaberite lokaciju:</label>
        <select name="lokacija" id="popis-lokacija"></select>
        <label for="korisnik">Odaberite moderatora:</label>
        <select name="korisnik" id="popis-moderatora"></select>
        <input type="submit" id="gumb" value="Dodijeli">
    </form>

</main>


<?php
require_once '../templates/footer.php';
