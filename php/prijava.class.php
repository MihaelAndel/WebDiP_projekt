<?php
require '../php/baza.class.php';
require '../php/sesija.class.php';
class Prijava
{
    function PrijaviSe()
    {
        if ($_COOKIE["krive-prijave"] < 3) {
            $baza = new Baza;
            if (!$this->EvaluirajPostParametre()) {
                $korime = $_POST["korisnicko-ime"];
                $lozinka = $_POST["lozinka"];
                $tip = "";

                $baza->spojiDB();

                $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$korime}'";
                $rezultat = $baza->selectDB($sql);

                $autenticiran = false;
                $blokiran = false;

                while ($red = mysqli_fetch_assoc($rezultat)) {
                    if ($red["blokiran"] == 1) {
                        $blokiran = true;
                    }
                    if ($red) {
                        if ($red["datum_vrijeme_uvjeta"] === null && $lozinka == $red["lozinka"] && $red["blokiran"] == 0) {
                            $autenticiran = true;
                            $tip = $red["uloga_id"];
                            break;
                        }
                    } else {

                        break;
                    }
                }

                if ($autenticiran) {
                    if ($_POST["zapamti-me"]) {
                        setcookie("webdip-korisnik", $korime);
                    }
                    setcookie("krive-prijave", 0);
                    Sesija::kreirajKorisnika($korime, $tip);
                    header("Location: ../index.php");
                } else if (!$blokiran) {
                    switch ($_COOKIE["krive-prijave"]) {
                        case 0: {
                                setcookie("krive-prijave", 1);
                                break;
                            }
                        case 1: {
                                setcookie("krive-prijave", 2);
                                break;
                            }
                        case 2: {
                                $this->BlokirajRacun($korime);
                                setcookie("krive-prijave", 0);
                                break;
                            }
                    }
                    echo "<script>alert('Nepostojeći korisnik ili kriva lozinka! Možda niste aktivirali svoj račun, a možda ste i blokirani!');</script>";
                } else {
                    setcookie("krive-prijave", 0);
                    echo "<script> alert('Vaš račun je blokiran! Javite se administratoru kako bi otljučali račun!'); </script>";
                }
            } else {
                $this->BaciPorukuNeispunjenaPolja();
            }
            $baza->zatvoriDB();
        }
    }

    function BlokirajRacun($korime)
    {
        $baza = new Baza();
        $baza->spojiDB();
        $sql = "UPDATE korisnik SET blokiran = 1 WHERE korisnicko_ime = '{$korime}'";
        $baza->updateDB($sql);
        $baza->zatvoriDB();
        echo "<script> alert('Vaš račun je blokiran! Javite se administratoru kako bi otljučali račun!'); </script>";
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
