<?php
require_once '../php/baza.class.php';
$pronaden = false;
$emailOdgovara = false;

$korime = $_GET["korisnicko-ime"];
$email = "";

$sql = "SELECT email from korisnik where korisnicko_ime = '{$korime}'";
$baza = new Baza();
$baza->spojiDB();
$rezultat = $baza->selectDB($sql);



if ($red = mysqli_fetch_assoc($rezultat)) {
    $pronaden = true;
    $znakovi = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $kljuc = "";
    for ($i = 0; $i < 10; $i++) {
        $kljuc .= $znakovi[rand(0, strlen($znakovi) - 1)];
    }

    $datum = date("Y-m-d H:i:s", strtotime('+7 hours'));
    $sql = "UPDATE korisnik SET kljuc_lozinka = '{$kljuc}', datum_kljuc = '{$datum}' WHERE korisnicko_ime = '{$korime}'";
    $baza->updateDB($sql);

    $email = $red["email"];
    $sadrzajEmail = "Poštovani/a {$korime},\nispod se nalazi poveznica koja će vas voditi do obrasca za promjenu izgubljene lozinke.\n";
    $poveznica = "barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x003/obrasci/nova-lozinka.php?korisnik={$korime}&kljuc={$kljuc}";
    mail($email, "Nova lozinka za račun", $sadrzajEmail . $poveznica);
}
$baza->zatvoriDB();

$naslov = "Zaboravljena lozinka";
$css = "../css/zaboravljena-lozinka";
include '../templates/header.php';
?>
<main>
    <?php

    if (!$pronaden) {
        echo "<h1>Korisničko ime koje ste unijeli nije u našem sustavu. Molimo Vas da pokušate ponovo s drugim korisničkim imenom.</h1>";
    } else {
        echo "<h1>Poslana je poruka u Vaš e-mail sandučić s uputama za obnovu izgubljene lozinke!</h1>";
    }

    ?>
</main>

<?php
include '../templates/footer.php';
?>