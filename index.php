<?php
require_once 'php/sesija.class.php';
$index = true;
Sesija::kreirajSesiju();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/pocetna.css">
    <title>Početna stranica</title>
</head>

<body>
    <header>
        <h1 id="naslov">Početna stranica</h1>
        <nav>
            <ul>
                <li class="dropdown">Oprema i lokacije
                    <div class="dropdown-content">
                        <a href="">Pretraživanje opreme
                            po lokaciji</a>
                        <a href="">Informacije o opremi</a>
                        <a href="">Informacije o lokaciji</a>
                        <a href="">Kreiranje zahtjeva za najam opreme</a>
                    </div>
                </li>
                <li class="dropdown">Slike i zahtjevi za slike
                    <div class="dropdown-content">
                        <a href="">Kreiranje zahtjeva</a>
                        <a href="">Pregled mojih zahtjeva</a>
                        <a href="">Slike u kojima sam označen</a>
                        <a href="">Moje slike</a>
                        <a href="">Zahtjevi za slikanje</a>
                    </div>
                </li>
                <li class="dropdown">Administracija
                    <div class="dropdown-content">
                        <a href=""></a>
                        <a href=""></a>
                        <a href=""></a>
                    </div>
                </li>
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
            echo "<p>Za nastavak,  registrirajte se. Ako već imate račun, mo že t e  se samo prijaviti!</p>";
        }
        ?>
    </main>

    <?php
    include 'templates/footer.php';
    ?>
</body>

</html>