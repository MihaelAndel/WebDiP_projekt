<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();

$title = "Postavi sliku u marketinške svrhe";
$naslov = "Postavi sliku";
$css = "../css/slike-marketinske-svrhe.css";
$marketing = true;
require_once '../templates/header.php';

if ($_SESSION["tip"] > 2) {
    header("Location: ..(index.php");
}

?>

<main>

    <form id="forma" enctype="multipart/form-data">
        <select name="zahtjev" id="zahtjev"> </select>
        <input type="file" name="slika" id="slika">
        <input type="checkbox" name="oznaci" id="oznaci">
        <label for="oznaci">Označi korisnika</label>
        <select name="oprema[]" id="oprema" multiple></select>
        <input type="submit" value="Pošalji">
    </form>

</main>

<?php
require_once '../templates/footer.php';
