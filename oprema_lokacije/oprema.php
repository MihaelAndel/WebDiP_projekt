<?php
require '../php/baza.class.php';
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();

$opremaID = $_GET["oprema"];

$baza = new Baza();
$baza->spojiDB();

$sql = "SELECT * FROM oprema WHERE id_oprema = '{$opremaID}'";

$sqlSlika = "SELECT rand(), s.putanja AS putanja FROM slika s, koristena_u_slikanju k "
    . "WHERE k.oprema_id_oprema = $opremaID AND s.id_slika = k.slika_id_slika ORDER BY 1 LIMIT 1";

$rezultat = $baza->selectDB($sql);
$rezultatSlika = $baza->selectDB($sqlSlika);

$naslov = "Oprema";
$css = "../css/oprema.css";
$title = "Oprema";
include '../templates/header.php';
?>
<main>
    <?php
    $putanja = mysqli_fetch_assoc($rezultatSlika)["putanja"];
    while ($red = mysqli_fetch_assoc($rezultat)) {
        echo "<img src='../fotografije/$putanja'</img>"
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