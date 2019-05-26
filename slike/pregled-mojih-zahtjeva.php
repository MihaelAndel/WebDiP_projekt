<?php
require_once '../php/sesija.class.php';
require_once '../php/baza.class.php';
Sesija::kreirajSesiju();

$baza = new Baza();
$baza->spojiDB();

$sqlKorID = "SELECT id_korisnik FROM korisnik WHERE korisnicko_ime = '{$_SESSION["korisnik"]}'";
$rezultatKorisnik = $baza->selectDB($sqlKorID);

while ($red = mysqli_fetch_assoc($rezultatKorisnik)) {
    $korID = $red["id_korisnik"];
}


$sql = "SELECT z.id_zahtjev_za_uslugu as id, l.naziv as lokacija, z.opis_slike as opis, z.odobrava_oznacavanje as oz, "
    . "z.odobrava_marketing as mar, z.odobren as status, z.datum_odobrenja_odbijanja as datum "
    . "FROM zahtjev_za_uslugu z, lokacija l "
    . "WHERE z.korisnik_id = {$korID} AND z.lokacija_id = l.id_lokacija";


$rezultat = $baza->selectDB($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/moji-zahtjevi.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../javascript/app.js"></script>
    <title>Pregled mojih zahtjeva</title>
</head>

<body>
    <?php
    $naslov = "Moji zahtjevi";
    include '../templates/tip-korisnika.php';
    include '../templates/header.php';
    ?>

    <main>
        <div id="popis-zahtjeva">
            <?php
            while ($red = mysqli_fetch_assoc($rezultat)) {
                $oznacavanje = "ne";
                $marketing = "ne";
                $status = "u toku";
                $klasa = "u-toku";
                if ($red["oz"] === "1") {
                    $oznacavanje = "da";
                }
                if ($red["mar"] === "1") {
                    $marketing = "da";
                }
                if ($red["status"] === "1") {
                    $status = "odobren";
                    $klasa = "odobren";
                }
                if ($red["status"] === "0") {
                    $status = "odbijen";
                    $klasa = "odbijen";
                }
                echo "<div class='element $klasa'>"
                    . "<h2>Zahtjev #{$red['id']}</h2>"
                    . "<ul>"
                    . "<li>Lokacija: {$red['lokacija']}</li>"
                    . "<li>Opis zahtjeva: {$red['opis']}</li>"
                    . "<li>Dozvola označavanja: $oznacavanje</li>"
                    . "<li>Dozvola marketinga: $marketing</li>"
                    . "<li>Status: <span class=$klasa>$status</span></li>"
                    . "</ul>"
                    . "</div>";
            }
            $baza->zatvoriDB();
            ?>
        </div>
    </main>

    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>