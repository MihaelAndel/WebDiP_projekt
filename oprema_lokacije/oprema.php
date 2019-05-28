<?php
require '../php/baza.class.php';
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();

$opremaID = $_GET["oprema"];

$sql = "SELECT * FROM oprema WHERE id_oprema = '{$opremaID}'";

$baza = new Baza();
$baza->spojiDB();

$rezultat = $baza->selectDB($sql);
$naslov = "Oprema";
$css = "../css/oprema.css";
$title = "Oprema";
include '../templates/header.php';
?>
<main>
    <?php
    while ($red = mysqli_fetch_assoc($rezultat)) {
        echo "<img src='{$red['naziv']}'</img>"
            . "<h2>{$red['naziv']}</h2>"
            . "<ul>"
            . "<li>Nabavna cijena: {$red['nabavna_cijena']}</li>"
            . "<li>Najamna cijena: {$red['najamna_cijena']}</li>";
    }
    ?>
</main>
<?php
include '../templates/footer.php';
?>