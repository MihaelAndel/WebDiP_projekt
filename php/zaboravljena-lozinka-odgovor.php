<?php
require_once '../php/baza.class.php';
$pronaden = false;
$emailOdgovara = false;

$korime = $_GET["korisnicko-ime"];
$email = $_GET["email"];

$sql = "SELECT email from korisnik where korisnicko_ime = '{$korime}'";
$baza = new Baza();
$baza->spojiDB();
$rezultat = $baza->selectDB($sql);

$sadrzajEmail = "Poštovani/a {$korime},\nispod se nalazi poveznica koja će vas voditi do obrasca za promjenu izgubljene lozinke.\n";

$datum = date("Y-m-d H:i:s", strtotime('+7 hours'));

if ($red = mysqli_fetch_assoc($rezultat)) {
    $pronaden = true;
    if ($red["email"] === $email) {
        $emailOdgovara = true;
        $znakovi = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kljuc = "";
        for ($i = 0; $i < 10; $i++) {
            $kljuc .= $znakovi[rand(0, strlen($znakovi) - 1)];
        }
        $sql = "UPDATE korisnik SET kljuc_lozinka = '{$kljuc}', datum_kljuc = '{$datum}' WHERE korisnicko_ime = '{$korime}'";
        $poveznica = "barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x003/obrasci/nova-lozinka.php?korisnik={$korime}&kljuc={$kljuc}";
        $baza->updateDB($sql);
        mail($email, "Nova lozinka za račun", $sadrzajEmail . $poveznica);
    }
}
$baza->zatvoriDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/prijava.css">

    <title>Zaboravljena lozinka</title>
</head>

<body>
    <header>
        <h1>Zaboravljena lozinka</h1>
    </header>

    <main>
        <?php
        if ($pronaden && $emailOdgovara) {
            echo "<h1>Poslana je e-mail poruka na Vašu adresu, molimo Vas da provjerite Vaš sandučić.</h1>";
        } else {
            if (!$pronaden) {
                echo "<h1>Korisničko ime koje ste unijeli nije u našem sustavu. Molimo Vas da pokušate ponovo s drugim korisničkim imenom.</h1>";
            }
            if ($pronaden && !$emailOdgovara) {
                echo "<h1>Unešena e-mail adresa ne odgovara unešenom korisničkom imenu!</h1>";
            }
        }
        ?>
    </main>

    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>