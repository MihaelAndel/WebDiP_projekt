<?php
require_once '../php/baza.class.php';

$korime = $_GET["korisnik"];
$kljuc = $_GET["kljuc"];
$sql = "SELECT kljuc_lozinka, datum_kljuc from korisnik WHERE korisnicko_ime = '{$korime}'";
$pronaden = false;
$dobarKljuc = false;

$baza = new Baza();
$baza->spojiDB();

$datum = date("Y-m-d H:i:s");

$rezultat = $baza->selectDB($sql);

while ($red = mysqli_fetch_assoc($rezultat)) {
    if ($red) {
        $datumBaza = strtotime($red["datum_vrijeme_uvjeta"]);
        $pronaden = true;
        if ($kljuc === $red["kljuc_lozinka"] && $datum < $datumBaza) {
            $dobarKljuc = true;
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/registracija.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../javascript/nova-lozinka.js"></script>
    <title>Nova lozinka</title>
</head>

<body>
    <header>
        <h1>Nova lozinka</h1>
    </header>
    <main>
        <?php
        if ($dobarKljuc && $pronaden) {
            echo '
            <form action="../php/azuriraj-lozinku.php" method="post">
                <label for="lozinka" id="lblLozinka"></label>
                <input type="password" id="lozinka" name="lozinka" placeholder="Nova lozinka" required="required">
                <input type="password" id="lozinkaP" name="lozinkaP" placeholder="Ponovljena lozinka" required="required">
                <input type="submit" value="Ažuriraj lozinku">
                <input style="display:none" id="korime" name="korime" type="text" value=' . "{$korime}" . '>
            </form>';
        } else {
            echo "<h1>Nepostojeći korisnik! Moguće da je isteklo vrijeme
             zahtjeva za novu lozinku, ili ga niste uopće poslali!</h1>";
        }
        ?>
    </main>

    <?php include '../templates/footer.php'; ?>
</body>

</html>