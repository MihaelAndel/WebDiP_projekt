<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();

$naslov = "Dokumentacija";
$title = "Dokumentacija";
$css = "../css/style.css";
require_once '../templates/header.php';
?>

<main>
    <h2>Opis projektnog zadatka i rješenja</h2>
    <p>
        Bilo je potrebno izraditi web aplikaciju za sustav uslugu slikanja s nekoliko uloga.
        Sustav se sastoji od tri, odnosno četiri uloge: neregistrirani korisnik, registrirani korisnik,
        moderator i administrator. Jača uloga ima sva prava kao i sve njezine slabije uloge. Neregistrirani korisnik
        može pristupiti stranici s pregledom dostupne opreme, stranici za pojedinu opremu i pojedinu lokaciju.
        Osim toga, može vidjeti stranicu o autoru i ovu stranicu. Također se može prijaviti i registrirati ukoliko
        nema račun. Registrirani korisnik može napraviti zahtjev za uslugom slikanja i vidjeti sve svoje
        zahtjeve gdje također piše i trenutni status zahtjeva. Osim toga, može vidjeti slike u kojima je označen.
        Moderator može pregledati sve zahtjeve za slikanjem za sve lokacije koje on moderira i ujedno ih odobriti ili
        odbiti. Osim toga, može napraviti zahtjev za najam opreme i postaviti sliku u marketinške svrhe, ukoliko
        ima dopuštenje od korisnika. Administrator zaključava ili otključava korisničke račune, dodjeljuje moderatore
        lokacijama, kreira lokacije i opremu. Osim toga, vidi sve zahtjeve za najam opreme te ih ujedno može
        odobriti ili odbiti.
    </p>

    <h2>ERA model</h2>
    <img src="./era-model.png" alt="">

    <h2>Navigacijski dijagram</h2>
    <img src="./navigacijski.png" alt="">

    <h2>Mapa mjesta</h2>
    <img src="./mapa-mjesta.png" alt="">

    <h2>Korištene tehnologije</h2>
    <p>
        Korištene su osnovne web tehnologije, poput HTML, CSS, JavaScript i PHP. Osim toga, korištena je i JQuery
        JavaScript biblioteka.
    </p>

    <h2>Korištene (tuđe) skripte</h2>
    <p>
        Korištene su skripte baza.class.php i sesija.class.php koju smo dobili od nastavnika kako bi si olakšali
        rad s bazom podatak i sesijom. Osim toga, s interneta sam preuzeo JavaScript skriptu koja se nalazi u datoteci
        captcha.js, a koristi se samo kod registracije za generaciju captcha-e.
    </p>

</main>



<?php
require_once '../templates/footer.php';
