<?php
require_once '../php/sesija.class.php';
require_once '../php/baza.class.php';
Sesija::kreirajSesiju();

if (!isset($_SESSION["tip"])) {
    header("Location: ../index.php");
}

$sqlLokacija = "SELECT naziv, id_lokacija FROM lokacija ORDER BY 1";
$baza = new Baza();
$baza->spojiDB();
$rezultatLokacija = $baza->selectDB($sqlLokacija);
$css = "../css/zahtjev-za-slikanje.css";
$naslov = "Zahtjev za slikanje";
$title = "Zahtjev za slikanje";
include '../templates/header.php';
?>

<main>
    <form action="../php/posalji-zahtjev-za-slikanje.php" method="post">
        <label for="lokacija">Odaberite lokaciju:</label>
        <select name="lokacija" id="lokacija" require="required">
            <?php
            while ($redLokacija = mysqli_fetch_assoc($rezultatLokacija)) {
                echo "<option value={$redLokacija['id_lokacija']}>{$redLokacija['naziv']}</option>";
            }
            ?>
        </select>
        <textarea name="opis-slike" id="opis-slike" cols="25" rows="7" placeholder="Kratak opis slike..." require="required"></textarea>
        <input name="oznacavanje" id="oznacavanje" type="checkbox">
        <label for="oznacavanje">Odobravam označavanje</label><br>
        <input name="marketing" id="marketing" type="checkbox">
        <label for="marketing">Odobravam marketing</label><br>
        <input type="submit" value="Pošalji zahtjev">
    </form>
</main>

<?php
include '../templates/footer.php';
?>