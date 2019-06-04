<?php
if (isset($_SESSION["tip"])) {
    echo '<p id="tip"> ' .
        $_SESSION['tip']
        . '</p>';

    echo '<p id="korime">' .
        $_SESSION["korisnik"] .
        '</p>';
} else {
    echo '<p id="tip">4</p><p id="korime"></p>';
}
