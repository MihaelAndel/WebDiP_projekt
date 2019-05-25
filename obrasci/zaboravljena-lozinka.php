<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zaboravljena lozinka</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../javascript/app.js"></script>
    <link rel="stylesheet" href="../css/zaboravljena-lozinka.css">
</head>

<body>
    <?php include '../templates/tip-korisnika.php'; ?>
    <?php
    $naslov = "Zaboravljena lozinka";
    include '../templates/header.php';
    ?>

    <main>
        <h1>Upišite svoje korisničko ime</h1>
        <form action="../php/zaboravljena-lozinka-odgovor.php">
            <input type="text" id="korisnicko-ime" name="korisnicko-ime" placeholder="Korisničko ime">
            <input type="submit" value="Pošalji">
        </form>
    </main>

    <?php
    include '../templates/footer.php';
    ?>
</body>

</html>