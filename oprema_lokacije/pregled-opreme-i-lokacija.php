<?php
require_once '../php/baza.class.php';
require_once '../php/sesija.class.php';

Sesija::kreirajSesiju();

$baza = new Baza();
$baza->spojiDB();

$sqlOprema = "SELECT oprema.id_oprema as opid, oprema.naziv as onaziv, oprema.nabavna_cijena, "
    . "oprema.najamna_cijena, lokacija.id_lokacija as lid, lokacija.naziv as lnaziv, vrsta_opreme.naziv_vrste as vnaziv "
    . "FROM oprema, lokacija, vrsta_opreme "
    . "WHERE oprema.lokacija_id = lokacija.id_lokacija AND oprema.vrsta_opreme_id = vrsta_opreme.id_vrsta_opreme";

$sqlLokacija = "SELECT naziv FROM lokacija";

$rezultatOprema = $baza->selectDB($sqlOprema);
$rezultatLokacija = $baza->selectDB($sqlLokacija);
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/oprema-lokacija.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../javascript/app.js"></script>
    <script src="../javascript/oprema-lokacija.js"></script>
    <title>Pregled opreme i lokacija</title>
</head>

<body>
    <?php
    include '../templates/tip-korisnika.php';
    $naslov = "Oprema i lokacije";
    include '../templates/header.php';
    ?>

    <main>
        <select id="lokacija-izbor">
            <option value="default" selected="selected">Sve lokacije</option>
            <?php
            while ($redLokacija = mysqli_fetch_assoc($rezultatLokacija)) {
                echo "<option value={$redLokacija['naziv']}>{$redLokacija['naziv']}</option>";
            }
            ?>
        </select>

        <div id="lista-opreme">
            <?php
            while ($redOprema = mysqli_fetch_assoc($rezultatOprema)) {
                echo "<div class='element-oprema'>"
                    . "<a href='../oprema_lokacije/oprema.php?oprema={$redOprema["opid"]}'>"
                    . "<h2>{$redOprema['onaziv']} - {$redOprema['vnaziv']}</h2>"
                    . "</a>"
                    . "<ul>"
                    . "<li>Nabavna cijena: {$redOprema['nabavna_cijena']}</li>"
                    . "<li>Najamna cijena: {$redOprema['najamna_cijena']}</li>"
                    . "<li>Lokacija: "
                    . "<a href='../oprema_lokacije/lokacija.php?lokacija={$redOprema["lid"]}'>"
                    . "<b>{$redOprema['lnaziv']}</b>"
                    . "</a>"
                    . "</li>"
                    . "</ul>"
                    . "</div>";
            }
            $baza->zatvoriDB();
            ?>
        </div>
    </main>
    <?php include '../templates/footer.php'; ?>
</body>

</html>