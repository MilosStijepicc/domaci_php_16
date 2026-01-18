<?php

    require_once "Modeli/baza.php";

    $rezultat = $baza->query("SELECT * FROM proizvodi");

    $proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);

    //*array(5) { [0]=> array(6) { 
    //    [O]=> array(6) { ["id"]=> string(1) "1" ["ime"]=> string(9) "iPhone 13" ["opis"]=> string(12) "Dobar iphone" ["cijena"]=> string(7) "1199.99" ["slika"]=> string(12) "iPhone13.jpg" ["kolicina"]=> string(2) "55" } 
    //    [1]=> array(6) { ["id"]=> string(1) "2" ["ime"]=> string(9) "iPhone 11" ["opis"]=> string(39) "iPhone 11 kao nov, baba koristila za FB" ["cijena"]=> string(6) "989.99" ["slika"]=> string(12) "iPhone11.jpg" ["kolicina"]=> string(2) "22" } 
    //    [2]=> array(6) { ["id"]=> string(1) "3" ["ime"]=> string(9) "iPhone 15" ["opis"]=> string(46) "100% pravi iPhone, samo niko ne zna da postoji" ["cijena"]=> string(7) "2499.99" ["slika"]=> string(15) "nepostojeci.jpg" ["kolicina"]=> string(1) "1" } 
    //    [3]=> array(6) { ["id"]=> string(1) "4" ["ime"]=> string(16) "iPhone 14 ProMax" ["opis"]=> string(23) "Ukraden nov iz Austrije" ["cijena"]=> string(7) "1999.99" ["slika"]=> string(12) "iPhone13.jpg" ["kolicina"]=> string(2) "66" } 
    //    [4]=> array(6) { ["id"]=> string(1) "5" ["ime"]=> string(13) "iPhone 16 Pro" ["opis"]=> string(33) "Dobar telefon nema sta nema packe" ["cijena"]=> string(7) "2350.00" ["slika"]=> string(15) "iPhone16Pro.jpg" ["kolicina"]=> string(1) "2" } 



?>


<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WebShop</title>
    </head>

    <body>
        
        <?php foreach($proizvodi as $proizvod): ?>
            <div>
                <h1> <?= $proizvod['ime'] ?> </h1>
                <p> <?= $proizvod['opis'] ?> </p>
                <p>Cijena proizvoda: <?= $proizvod['cijena'] ?> </p> 
                <p>Na stanju: <?= $proizvod['kolicina'] ?> </p> 

                <?php if($proizvod['kolicina'] == 0): ?>

                    <p>Nema na stanju</p>

                <?php else: ?>

                    <p>Ima na stanju</p>

                <?php endif; ?>

                <a href="proizvod.php?id=<?php echo $proizvod['id'] ?>"> Pogledaj proizvod </a>

            </div>
        <?php endforeach; ?>

    </body>

</html>