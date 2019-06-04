<?php
require_once "../php/sesija.class.php";
Sesija::kreirajSesiju();

if (!isset($_SESSION["tip"])) {
    header("Location: ../index.php");
}

$mojiZahtjevi = true;
$naslov = "Moji zahtjevi";
$title = "Moji zahtjevi";
$css = "../css/moji-zahtjevi.css";
include '../templates/header.php';

?>

<main>
    <div id="popis-zahtjeva">

    </div>
</main>

<?php
include '../templates/footer.php';
?>