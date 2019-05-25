<?php
require_once 'php/sesija.class.php';
$index = true;
Sesija::kreirajSesiju();
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/pocetna.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./javascript/app.js"></script>
    <title>Početna stranica</title>
</head>

<body id="index">
    <?php include 'templates/tip-korisnika.php'; ?>
    <header>
        <a href="">
            <h1 id="naslov">Početna stranica</h1>
        </a>
        <nav>
            <ul id="navigacija">
            </ul>
        </nav>
        <nav class="prijava-registracija">
            <ul>
                <li> <a href="./obrasci/prijava.php">Prijava</a> </li>
                <li> <a href="./obrasci/registracija.php">Registracija</a> </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Dobrodošli na početnu stranicu mojeg projekta za kolegij Web dizajn i programiranje!</h1>
        <?php
        if (!isset($_SESSION["korisnik"])) {
            echo "<p>Za nastavak, registrirajte se. Ako već imate račun, možete se samo prijaviti!</p>";
        }
        ?>
    </main>

    <?php
    include 'templates/footer.php';
    ?>

</body>

</html>