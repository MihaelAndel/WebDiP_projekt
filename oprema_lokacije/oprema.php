<?php
require '../php/baza.class.php';
require '../php/sesija.class.php';

Sesija::kreirajSesiju();

$opremaID = $_GET["oprema"];

$sql = "SELECT * FROM oprema WHERE id_oprema = '{$opremaID}'";

$baza = new Baza();
$baza->spojiDB();

$rezultat = $baza->selectDB($sql);
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../javascript/app.js"></script>
    <link rel="stylesheet" href="../css/oprema.css">
    <title>Oprema</title>
</head>

<body>
    <?php
    $naslov = "Oprema";
    include '../templates/tip-korisnika.php';
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
</body>

</html>