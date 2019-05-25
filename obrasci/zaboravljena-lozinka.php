<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zaboravljena lozinka</title>
    <link rel="stylesheet" href="../css/prijava.css">
</head>

<body>
    <header>
        <h1>Zaboravljena lozinka</h1>
        <nav class="prijava-registracija">
            <ul>
                <li> <a href="../index.php">Početna</a> </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Upišite svoje podatke. Pripazite da korisničko ime i e-mail adresa budu usklađeni.</h1>
        <form action="../php/zaboravljena-lozinka-odgovor.php">
            <input type="text" id="korisnicko-ime" name="korisnicko-ime" placeholder="Korisničko ime">
            <input type="email" id="email" name="email" placeholder="Email adresa">
            <input type="submit" value="Pošalji">
        </form>
    </main>

    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>