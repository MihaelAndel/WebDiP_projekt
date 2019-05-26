<?php
require_once '../php/baza.class.php';
require_once '../php/sesija.class.php';

Sesija::kreirajSesiju();

$lokacija = $_GET["lokacija"];
$baza = new Baza();
$baza->spojiDB();

$sql = "SELECT naziv, zupanija, regija "
    . "FROM lokacija "
    . "WHERE id_lokacija = '{$lokacija}'";
$rezultatLokacija = $baza->selectDB($sql);

$sql = "SELECT ime, prezime "
    . "FROM korisnik, moderator_lokacija "
    . "WHERE korisnik.id_korisnik = moderator_lokacija.korisnik_id_korisnik "
    . "AND moderator_lokacija.lokacija_id_lokacija = '{$lokacija}'";
$rezultatModeratori = $baza->selectDB($sql);

?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../javascript/app.js"></script>
    <link rel="stylesheet" href="../css/lokacija.css">
    <title>Oprema</title>
</head>

<body>
    <?php
    $naslov = "Lokacija";
    include '../templates/tip-korisnika.php';
    include '../templates/header.php';
    ?>
    <main>
        <?php
        while ($redLokacija = mysqli_fetch_assoc($rezultatLokacija)) {
            echo "<div id='lokacija'><h2>{$redLokacija['naziv']}</h2>"
                . "<ul>"
                . "<li>Županija: {$redLokacija['zupanija']}</li>"
                . "<li>Regija: {$redLokacija['regija']}</li>"
                . "</ul></div>";
        }

        echo "<div id='moderatori'><h2>Moderatori lokacije</h2>";
        while ($redModeratori = mysqli_fetch_assoc($rezultatModeratori)) {
            echo "<ul>"
                . "<li>Ime: {$redModeratori['ime']}</li>"
                . "<li>Prezime: {$redModeratori['prezime']}</li>"
                . "<hr>";
        }
        echo "</ul></div>";
        ?>
    </main>
    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>