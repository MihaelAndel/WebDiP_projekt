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


$naslov = "Zahtjev za najam opreme";
$title = "Zahtjev za najam opreme";
$css = "../css/zahtjev-za-najam.css";
$zahtjevNajam = true;
require_once '../templates/header.php';
require_once '../templates/tip-korisnika.php';

$baza->spojiDB();
$sqlKorisnik = "SELECT id_korisnik FROM korisnik WHERE korisnicko_ime = '{$_SESSION["korisnik"]}'";
$rezultatKorisnik = $baza->selectDB($sqlKorisnik);
$korID = mysqli_fetch_assoc($rezultatKorisnik)["id_korisnik"];
?>

<main korID="<?php echo $korID ?>">
    <h1 id="poruka"></h1>
    <form method="POST">
        <select name="popis-zahtjeva" id="popis-zahtjeva">
        </select>Od
        <input type="date" min="2019-01-01" max="2019-12-31" name="datum-pocetak" id="datum-pocetak">
        do
        <input type="date" min="2019-01-01" max="2019-12-31" name="datum-kraj" id="datum-kraj">
        <select name="popis-opreme" id="popis-opreme" multiple>
        </select>
    </form>
    <button id="posalji">Pošalji zahtjev</button>

</main>

<?php
require_once '../templates/footer.php';
