<header>
    <a href='../index.php'>
        <h1 id='naslov'><?php echo $naslov;?></h1>
    </a>
    <nav>
        <ul id='navigacija'>
        </ul>
    </nav>

    <?php
    $putanja = "..";
    if (isset($index)) {
        $putanja = ".";  
    } 
    if(!isset($_SESSION["korisnik"])){
        echo "<nav class='prijava-registracija'>"
            . "<ul>"
            . "<li> <a href='{$putanja}/obrasci/prijava.php'>Prijava</a> </li>"
            . "<li> <a href='{$putanja}/obrasci/registracija.php'>Registracija</a> </li>"
            . "</ul>"
            . "</nav>";
    }
    else {
        
        echo "<p id='odjava'>Dobrodošli, " . $_SESSION["korisnik"] .
                "<br><a href='{$putanja}/php/odjava.php'>Odjava</a></p>";
    }
    ?>
</header>