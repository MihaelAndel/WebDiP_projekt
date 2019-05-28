<?php
require_once "./php/sesija.class.php";
Sesija::kreirajSesiju();
$index = true;
$naslov = "Početna stranica";
$css = "./css/pocetna.css";
$title = "Početna stranica";
include './templates/header.php';
?>
<main>
    <h1>Dobrodošli na početnu stranicu mojeg projekta za kolegij Web dizajn i programiranje!</h1>
    <?php
    if (!isset($_SESSION["korisnik"])) {
        echo "<p>Za nastavak, registrirajte se. Ako već imate račun, možete se samo prijaviti!</p>";
    }
    ?>
</main>
<?php
include './templates/footer.php';
?>