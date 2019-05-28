<?php
if ($_SERVER["HTTPS"] != "on") {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
require_once '../php/prijava.class.php';
require_once "../php/sesija.class.php";
Sesija::kreirajSesiju();


if (!isset($_COOKIE["krive-prijave"])) {
    setcookie("krive-prijave", 0);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prijava = new Prijava;
    $prijava->PrijaviSe();
}

$naslov = "Prijava";
$css = "../css/prijava.css";
$prijav = true;
$title = "Prijava";
include '../templates/header.php';
?>

<main>
    <form action="" method="POST">
        <input type="text" name="korisnicko-ime" id="korisnicko-ime" placeholder="Korisničko ime" value="<?php
                                                                                                            if (isset($_COOKIE["webdip-korisnik"])) {
                                                                                                                $tekst = trim($_COOKIE["webdip-korisnik"]);
                                                                                                                echo $tekst;
                                                                                                            }
                                                                                                            ?>">
        <input type="password" name="lozinka" id="lozinka" placeholder="Lozinka">
        <input type="checkbox" name="zapamti-me" id="zapamti-me">
        <label class="prikazi" for="zapamti-me">Zapamti me</label>
        <input type="submit" value="Prijavi se">
        <a id="zaboravljena-lozinka" href="../obrasci/zaboravljena-lozinka.php">Zaboravljena lozinka?</a>
    </form>
</main>

<?php
include '../templates/footer.php';
?>