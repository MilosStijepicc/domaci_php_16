<?php

    require_once "Logika/baza.php";

    $rezultat = $baza->query("SELECT * FROM proizvodi");

    $proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proizvodi</title>
    </head>

    <body>

        <h1> Pretrazite proizvode </h1>

        <form action="Logika/pretraga.php">
            <input type="text" name="trazilica" placeholder="Pretraga" method="GET">
            <button> Pretrazi </button> 
        </form>
        
        
        <?php foreach($proizvodi as $proizvod): ?>

        <div>

            <h1> <?= $proizvod['ime'] ?> </h1>
            <p> <?= $proizvod['opis'] ?> </p>
            <p> Cijena proizvoda: <?= $proizvod['cijena'] ?> </p>
            
            <?php if($proizvod['kolicina']  < 1): ?>

                <p> Nema na stanju. </p>
                
                <?php else: ?>

                <p> Na stanju: <?= $proizvod['kolicina'] ?> </p>

            <?php endif; ?>

            <a href="jedanProizvod.php?id=<?= $proizvod['id'] ?>"> Pogledaj proizvod </a>

        </div>
       
        <?php endforeach; ?>


    </body>

</html>