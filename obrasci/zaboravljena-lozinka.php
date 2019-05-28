<?php
require_once "../php/sesija.class.php";
Sesija::kreirajSesiju();

$naslov = "Zaboravljena lozinka";
$css = "../css/zaboravljena-lozinka.css";
$title = "Zaboravljena lozinka";
include '../templates/header.php';
?>

<main>
    <h1>Upišite svoje korisničko ime</h1>
    <form action="../php/zaboravljena-lozinka-odgovor.php">
        <input type="text" id="korisnicko-ime" name="korisnicko-ime" placeholder="Korisničko ime">
        <input type="submit" value="Pošalji">
    </form>
</main>

<?php
include '../templates/footer.php';
?>
</body>

</html>