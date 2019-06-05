<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();
$naslov = "O autoru";
$title = "O autoru";
$css = "../css/style.css";
require_once '../templates/header.php';
?>

<main>
    <ul id="osobni-podaci">
        <li>Mihael Anđel</li>
        <li>mandel@foi.hr</li>
        <li>Broj indeksa: 44864</li>
    </ul>

    <img id="osobna-slika" src="../osobna_fotografija.jpg" alt="Fotografija autora" width="100" />

    <div id="o-meni">
        S programiranjem sam se prvo upoznao još u osnovnoj školi, ali samo na
        elementarnoj razini. U srednjoj školi učili smo malo teorije o
        programiranju i nešto malo smo programirali u programskom jeziku C. Što
        se tiče fakulteta, puno sam naučio programirati u programskom jeziku
        C++. Osim toga, u zadnje vrijeme učim razne tehnologije vezane uz web
        razvoj. Od predmeta očekujem da me upozna s nepoznatim tehnologijama,
        ali i da nadogradi već postojeće znanje.
    </div>
</main>


<?php
require_once '../templates/footer.php';
