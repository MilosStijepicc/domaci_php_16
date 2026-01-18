<?php

    require_once "baza.php";

    if (empty($_POST['email'])) {
        die("Niste unijeli email.");
    }

    if (empty($_POST['sifra'])) {
        die("Niste unijeli sifru.");
    }

    $email = $_POST['email'];
    $sifra = password_hash($_POST['sifra'], PASSWORD_BCRYPT);

    $provjera = $baza->query("SELECT id FROM korisnici WHERE email = '$email'");

    if ($provjera->num_rows > 0) {
        die("Taj email se vec koristi!");
    }

    $rezultat = $baza->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$sifra')");

    if ($rezultat) {
        echo "Uspješno ste se registrovali!";
    } else {
        echo "Greška pri registraciji.";
    }
?>


<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        
        <a href="../dodajProizvod.php"> Dodajte vas proizvod </a>
        <a href="../sviProizvodi.php"> Pogledajte ostale proizvode </a>

    </body>

</html>