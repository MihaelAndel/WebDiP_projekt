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
        <nav>
            <ul>
                <li> <a href="registracija.php">Registracija</a> </li>
                <li> <a href="../index.php">Početna</a> </li>
            </ul>
        </nav>
    </header>

    <main>
        <form action="">
            <input type="text" name="korisnicko-ime" id="korisnicko-ime" placeholder="Korisničko ime">
            <input type="text" name="lozinka" id="lozinka" placeholder="Lozinka">
            <input type="checkbox" name="upamti-me" id="upamti-me">
            <label for="upamti-me">Upamti me</label>
            <input type="submit" value="Prijavi se">
        </form>
    </main>

    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>