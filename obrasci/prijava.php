<?php
if ($_SERVER["HTTPS"] != "on") {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
require_once '../php/prijava.class.php';
require_once '../php/sesija.class.php';
Sesija::kreirajSesiju();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prijava = new Prijava;
    $prijava->PrijaviSe();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/prijava.css">
    <title>Prijava</title>
</head>

<body>
    <header>
        <h1>Prijava</h1>
        <nav class="prijava-registracija">
            <ul>
                <li> <a href="registracija.php">Registracija</a> </li>
                <li> <a href="../index.php">Početna</a> </li>
            </ul>
        </nav>
    </header>

    <main>
        <form action="" method="POST">
            <input type="text" name="korisnicko-ime" id="korisnicko-ime" placeholder="Korisničko ime" value="<?php
                                                                                                                if (isset($_COOKIE["webdip-korisnik"])) {
                                                                                                                    $tekst = trim($_COOKIE["webdip-korisnik"]);
                                                                                                                    echo $tekst;
                                                                                                                }
                                                                                                                ?>">
            <input type="password" name="lozinka" id="lozinka" placeholder="Lozinka">
            <input type="checkbox" name="upamti-me" id="upamti-me">
            <label class="prikazi" for="upamti-me">Upamti me</label>
            <input type="submit" value="Prijavi se">
        </form>
    </main>

    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>