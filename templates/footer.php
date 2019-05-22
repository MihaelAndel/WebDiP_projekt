<footer>
    <address>Autor: <a href="mailto:mandel@foi.hr">Mihael Anđel</a> </address>
    <p id="izmjena">TODO</p>
    <?php
    set_include_path("../");
    require_once 'php/sesija.class.php';
    if (isset($_SESSION["korisnik"])) {
        if (isset($index)) {
            echo "<p id='odjava'>Dobrodošli, " . $_SESSION["korisnik"] .
                "<br><a href='php/odjava.php'>Odjava</a></p>";
        } else {
            echo "<p id='odjava'>Dobrodošli, " . $_SESSION["korisnik"] .
                "<br><a href='../php/odjava.php'>Odjava</a></p>";
        }
    }
    ?>
</footer>