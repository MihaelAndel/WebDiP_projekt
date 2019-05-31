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

$sqlZahtjevi = "SELECT z.id_zahtjev_za_uslugu AS zID, z.opis_slike AS opis, k.korisnicko_ime AS korime "
    . "FROM korisnik k, zahtjev_za_uslugu z, lokacija l, moderator_lokacija m "
    . "WHERE k.id_korisnik = z.korisnik_id "
    . "AND l.id_lokacija = z.lokacija_id "
    . "AND m.lokacija_id_lokacija = l.id_lokacija "
    . "AND m.korisnik_id_korisnik = $korID "
    . "AND z.odobren = 1 AND z.odraden IS NULL";

$rezultatZahtjevi = $baza->selectDB($sqlZahtjevi);

$sqlOprema = "SELECT o.id_oprema as ID, o.naziv as naziv, v.naziv_vrste AS vrsta, o.najamna_cijena AS najam "
    . "FROM oprema o, vrsta_opreme v, lokacija l, moderator_lokacija m "
    . "WHERE o.lokacija_id = l.id_lokacija "
    . "AND l.id_lokacija = m.lokacija_id_lokacija "
    . "AND $korID = m.korisnik_id_korisnik "
    . "AND o.u_najmu IS NULL "
    . "AND o.vrsta_opreme_id = v.id_vrsta_opreme";

$rezultatOprema = $baza->selectDB($sqlOprema);
?>

<main korID="<?php echo $korID ?>">

    <form action="../php/posalji-zahtjev-za-najam.php" method="POST">
        <select name="popis-zahtjeva" id="popis-zahtjeva">
            <?php
            while ($red = mysqli_fetch_assoc($rezultatZahtjevi)) {
                echo "<option value={$red["zID"]}>{$red["korime"]} - {$red["opis"]}</option>";
            }
            ?>
        </select>
        <select name="popis-opreme" id="popis-opreme" multiple>
            <?php
            while ($red = mysqli_fetch_assoc($rezultatOprema)) {
                echo "<option value={$red["ID"]}>{$red["naziv"]}-{$red["vrsta"]} ({$red["najam"]})</option>";
            }
            ?>
        </select>
        <input type="date" min="2019-01-01" max="2019-12-31" name="datum-pocetak" id="datum-pocetak">
        <input type="date" min="2019-01-01" max="2019-12-31" name="datum-kraj" id="datum-kraj">
    </form>

</main>

<?php
require_once '../templates/footer.php';
