<?php
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/registracija.css">
    <title>Registracija</title>
</head>

<body>
    <header>
        <h1>Registracija</h1>
        <nav class="prijava-registracija">
            <ul>
                <li> <a href="prijava.php">Prijava</a> </li>
                <li> <a href="../index.php">Početna</a> </li>
            </ul>
        </nav>
    </header>

    <main>
        <form action="">
            <input type="text" name="ime" id="ime" placeholder="Ime">
            <input type="text" name="prezime" id="prezime" placeholder="Prezime">
            <input type="text" name="korisnicko-ime" id="korisnicko-ime" placeholder="Korisničko ime">
            <input type="email" name="lozinka" id="lozinka" placeholder="E-Mail">
            <input type="password" placeholder="Lozinka">
            <input type="password" placeholder="Ponovljena lozinka">
            <input type="submit" value="Registriraj se">
        </form>
    </main>

    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>