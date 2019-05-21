<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/pocetna.css">
    <title>Početna stranica</title>
</head>

<body>
    <header>
        <h1 id="naslov">Početna stranica</h1>
        <nav>
            <ul>
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
            </ul>
        </nav>
        <nav class="prijava-registracija">
            <ul>
                <li> <a href="./obrasci/prijava.php">Prijava</a> </li>
                <li> <a href="./obrasci/registracija.php">Registracija</a> </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Dobrodošli na početnu stranicu mojeg projekta za kolegij Web dizajn i programiranje!</h1>
        <p>Za nastavak, registrirajte se. Ako već imate račun, možete se samo prijaviti!</p>
    </main>

    <?php
    include 'templates/footer.php';
    ?>
</body>

</html>