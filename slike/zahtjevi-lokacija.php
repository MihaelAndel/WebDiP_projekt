<?php
require_once '../php/sesija.class.php';
require_once '../php/baza.class.php';
Sesija::kreirajSesiju();

if (!isset($_SESSION["tip"])) {
    header("Location: ../index.php");
} else if ($_SESSION["tip"] > 2) {
    header("Location: ../index.php");
}

$baza = new Baza();
$baza->spojiDB();

$sqlKorisnik = "SELECT id_korisnik FROM korisnik WHERE korisnicko_ime = '{$_SESSION["korisnik"]}'";
$rezultatKorisnik = $baza->selectDB($sqlKorisnik);
$korID = mysqli_fetch_assoc($rezultatKorisnik)["id_korisnik"];

$css = "../css/zahtjevi-lokacija.css";
$title = "Zahtjevi za moje lokacije";
$naslov = "Zahtjevi za moje lokacije";
$zahtjevi = true;
include '../templates/header.php';
?>

<main id="popis-zahtjeva" class="<?php echo $korID; ?>">
</main>

<?php
include '../templates/footer.php';
