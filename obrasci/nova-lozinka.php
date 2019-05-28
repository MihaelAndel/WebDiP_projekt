<?php
require_once '../php/baza.class.php';
require_once "../php/sesija.class.php";
Sesija::kreirajSesiju();

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
        $datumBaza = strtotime($red["datum_kljuc"]);
        $pronaden = true;
        if ($kljuc === $red["kljuc_lozinka"] && $datum < $datumBaza) {
            $dobarKljuc = true;
        }
    }
}
$naslov = "Nova lozinka";
$novaLozinka = true;
$css = "../css/zaboravljena-lozinka.css";
$title = "Nova lozinka";
include '../templates/header.php';
?>
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