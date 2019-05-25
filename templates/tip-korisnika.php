<?php
if (isset($_SESSION["tip"])) {
    echo '<p id="tip"> ' .
        $_SESSION['tip']
        . '</p>';
} else {
    echo '<p id="tip">4</p>';
}
