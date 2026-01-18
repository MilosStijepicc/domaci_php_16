<?php

    if(!isset($_POST['email']) or empty($_POST['email'])){
        die ("Niste unijeli email!");
    }
    if(!isset($_POST['sifra']) or empty($_POST['sifra'])){
        die ("Niste unijeli sifru!");
    }

    require_once "baza.php";

    $email = $_POST['email'];
    $sifra = $_POST['sifra'];

    $rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email' ");

    if($rezultat->num_rows == 1){
        $korisnik = $rezultat->fetch_assoc();
        $verifikacija = password_verify($sifra, $korisnik['sifra']);
        if($verifikacija){
            echo "Uspjesno ste se ulogovali!";
        }
        else{
            die ("Unijeli ste pogresnu lozinku");
        }
    }
    else{
        die ("Taj korisnik ne postoji!");
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