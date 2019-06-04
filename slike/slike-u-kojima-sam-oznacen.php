<?php
require_once '../php/sesija.class.php';
require_once '../php/baza.class.php';
Sesija::kreirajSesiju();

if (!isset($_SESSION["tip"])) {
    header("Location: ../index.php");
}

$css = "../css/oznacen.css";
$naslov = "Označen u slikama";
$title = "Slike u kojima sam označen";
$oznacen = true;
include '../templates/header.php';

?>
<main>
    <div id="popis-slika"></div>
</main>
<?php
include '../templates/footer.php';
?>