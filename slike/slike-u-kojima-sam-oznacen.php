<?php
require_once '../php/sesija.class.php';
require_once '../php/baza.class.php';
Sesija::kreirajSesiju();

if (!isset($_SESSION["tip"])) {
    header("Location: ../index.php");
}

$baza = new Baza();
$baza->spojiDB();

$sqlKor = "SELECT id_korisnik FROM korisnik WHERE korisnicko_ime = '{$_SESSION["korisnik"]}'";
$korID = mysqli_fetch_assoc($baza->selectDB($sqlKor))["id_korisnik"];
$sql = "SELECT *"
    . "FROM slika s, zahtjev_za_uslugu z "
    . "WHERE s.zahtjev_za_uslugu_id = z.id_zahtjev_za_uslugu "
    . "AND z.korisnik_id = '{$korID}'"
    . "AND s.korisnik_oznacen = 1";

$rezultat = $baza->selectDB($sql);
$css = "../css/oznacen.css";
$naslov = "Označen u slikama";
$title = "Slike u kojima sam označen";
include '../templates/header.php';

?>
<main>
    <?php
    while ($red = mysqli_fetch_assoc($rezultat)) {
        echo "<div class='element'>";
        echo "<h2>Zahtjev #" . $red["zahtjev_za_uslugu_id"] . ", Slika #" . $red["id_slika"] . "</h2>";
        echo "<ul>";
        echo "<li>" . $red["opis_slike"] . "</li>";
        echo "<li>" . $red["datum_slikanja"] . "</li>";
        echo "</ul>";
        echo "</div>";
    }
    ?>
</main>
<?php
include '../templates/footer.php';
?>