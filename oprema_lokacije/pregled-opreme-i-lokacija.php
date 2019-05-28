<?php
require_once '../php/baza.class.php';
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();
$baza = new Baza();
$baza->spojiDB();

$sqlLokacija = "SELECT naziv, id_lokacija FROM lokacija ORDER BY 1";

$rezultatLokacija = $baza->selectDB($sqlLokacija);
$opremaLokacija = true;
$title = "Oprema i lokacije";
$css = "../css/oprema-lokacija.css";
$naslov = "Oprema i lokacije";
include '../templates/header.php';
?>

<main>
    <select id="lokacija-izbor">
        <option value="default" selected="selected">Sve lokacije</option>
        <?php
        while ($redLokacija = mysqli_fetch_assoc($rezultatLokacija)) {
            echo "<option value={$redLokacija['id_lokacija']}>{$redLokacija['naziv']}</option>";
        }
        ?>
    </select>

    <div id="lista-opreme">

    </div>
</main>
<?php include '../templates/footer.php'; ?>