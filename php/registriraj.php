<?php
require_once '../php/baza.class.php';

if (ProvjeriPodatke()) {
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $korime = $_POST["korisnicko-ime"];
        $lozinka = $_POST["lozinka"];
        $email = $_POST["email"];
        $sol = "";
        for ($i = 0; $i < 10; $i++) {
                $sol .= $znakovi[rand(0, strlen($znakovi) - 1)];
        }
        $lozinkaK = md5($sol . $lozinka);
        $datum = date("Y-m-d H:i:s", strtotime('+7 hours'));

        $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, lozinka_kriptirano, email) 
                VALUES ('{$ime}', '{$prezime}', '{$korime}', '{$lozinka}', '{$lozinkaK}', '{$email}')";

        $baza = new Baza();
        $baza->spojiDB();
        $baza->updateDB($sql);
        $baza->zatvoriDB();

        PosaljiMail();

        header("Location: ../index.php");
} else {
        header("Location: ../obrasci/registracija.php");
}

function  ProvjeriPodatke()
{
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $korime = $_POST["korisnicko-ime"];
        $email = $_POST["email"];
        $lozinka = $_POST["lozinka"];
        $lozinkaP = $_POST["ponovljena-lozinka"];
        $regexEmail = "^(\w|(\w\.\w)|\w\.)+@(?=\w*\.)(\w|(\.\w\w)|(\w\.\w\w))+$";

        if (strlen($korime) < 4) {
                $_POST["korisnicko-ime"] = false;
        }

        if (strlen($lozinka) < 6) {
                $_POST["lozinka"] = false;
        }

        if (strlen($lozinkaP) < 6) {
                $_POST["ponovljena-lozinka"] = false;
        }

        if ($lozinka !== $lozinkaP) {
                $_POST["lozinka"] = false;
                $_POST["ponovljena-lozinka"] = false;
        }

        $vrati = true;
        $ispis = "<script type='text/javascript'> alert('Krivo unesena polja:\\n";
        foreach ($_POST as $k => $v) {
                if ($v === false) {
                        $ispis .= $k . "\\n";
                        $vrati = false;
                }
        }
        $ispis .= "'); </script>";
        if (!$vrati) {
                echo $ispis;
        }
        return $vrati;
}

function PosaljiMail()
{
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $korime = $_POST["korisnicko-ime"];
        $email = $_POST["email"];
        $lozinka = $_POST["lozinka"];
        $lozinkaP = $_POST["ponovljena-lozinka"];
        $regexEmail = "^(\w|(\w\.\w)|\w\.)+@(?=\w*\.)(\w|(\.\w\w)|(\w\.\w\w))+$";
        $sadrzaj = "Poštovani/a $ime, \n u ovoj poruci nalazi se poveznica na koju morate kliknuti kako bi potvrdili i koristili svoj račun za fotografske usluge." .
                "Imate 24h prije nego što poveznica postane nevažeča.";
        $sadrzaj .= "https://barka.foi.hr/WebDiP/2018_projekti/WebDiP2018x003/php/potvrda-email.php?korisnik=$korime";
        mail($email, "Potvrdite svoj račun!", $sadrzaj);
}
