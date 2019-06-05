<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();

$zahtjevNajamAdmin = true;
$css = "../css/zahtjevi-najam.css";
$title = "Pregled zahtjeva za najam";
$naslov = "Zahtjevi za najam";
require_once '../templates/header.php';

?>


<main>
    <div id="popis-zahtjeva"></div>
</main>


<?php

require_once '../templates/footer.php';
