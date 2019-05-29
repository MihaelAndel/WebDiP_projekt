<?php
require_once 'sesija.class.php';
Sesija::kreirajSesiju();
if (!isset($_SESSION["tip"])) {
    header("Location: ../index.php");
}
Sesija::obrisiSesiju();
header("Location: ../index.php");
