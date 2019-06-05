<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();

if (!isset($_SESSION["tip"]) || $_SESSION["tip"] > 1) {
    header("Location: ../index.php");
}

$blokiranje = true;
$css = "../css/blokiranje.css";
$title = "Blokiranje korisnika";
$naslov = "Blokiranje korisnika";
require_once '../templates/header.php';
?>


<main>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Ime</td>
                <td>Prezime</td>
                <td>Korisničko ime</td>
                <td>Zaključan</td>
                <td>Akcija</td>
            </tr>
        </thead>
        <tbody id="popis-korisnika">

        </tbody>
    </table>
</main>

<?php
require_once '../templates/footer.php';
