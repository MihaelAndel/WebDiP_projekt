<?php
require '../php/baza.class.php';
require '../php/sesija.class.php';
class Prijava
{
    function PrijaviSe()
    {
        if (!$this->EvaluirajPostParametre()) {
            $korime = $_POST["korisnicko-ime"];
            $lozinka = $_POST["lozinka"];
            $tip = "";

            $baza = new Baza;
            $baza->spojiDB();

            $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$korime}' AND lozinka = '{$lozinka}'";
            $rezultat = $baza->selectDB($sql);

            $autenticiran = false;

            while ($red = mysqli_fetch_assoc($rezultat)) {
                if ($red) {
                    $autenticiran = true;
                    $tip = $red["uloga_id"];
                    break;
                } else {
                    $autenticiran = false;
                    break;
                }
            }

            if ($autenticiran) {
                setcookie("webdip-korime", $korime);
                Sesija::kreirajKorisnika($korime, $tip);
                header("Location: ../index.php");
            } else {
                echo "<script> alert('Nepostojeći korisnik!'); </script>";
            }
        } else {
            $this->BaciPorukuNeispunjenaPolja();
        }
        $baza->zatvoriDB();
    }

    function BaciPorukuNeispunjenaPolja()
    {
        echo "<script> alert('Nisu ispunjena sva polja!'); </script>";
    }

    function EvaluirajPostParametre()
    {
        return empty($_POST["korisnicko-ime"]) || empty($_POST["lozinka"]);
    }
}
