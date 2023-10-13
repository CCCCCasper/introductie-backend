<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="POST">

        <label for='naam'>Naam: </label>
        <input type='text' name='naam' required><br>
        <label for='achternaam'>Achternaam: </label>
        <input type='text' name='achternaam' required><br>
        <label for='adres'>Adres: </label>
        <input type='text' name='adres' required><br>
        <label for='postcode'>Postcode: </label>
        <input type='text' name='postcode' required><br>
        <label for='land'>Land: </label>
        <input type='text' name='land' required><br>
        <label for='email'>Email: </label>
        <input type='text' name='email' required><br>

        <input type='submit' name='submit' value='submit'>
    </form>

    <?php

        if(isset($_POST['submit'])) {
            $naam = htmlspecialchars($_POST['naam']);
            $achternaam = htmlspecialchars($_POST['achternaam']);
            $adres = htmlspecialchars($_POST['adres']);
            $postcode = htmlspecialchars($_POST['postcode']);
            $land = htmlspecialchars($_POST['land']);
            $email = htmlspecialchars($_POST['email']);

            $naampattern = "/[A-Z][a-z]{1,25}/";
                if(!preg_match($naampattern, $naam)) {
                    echo "fout";
                    }
                    
            $achternaampattern = "/[A-Z][a-z]{1,30}/";
                if(!preg_match($achternaampattern, $achternaam)) {
                    echo "fout";
                    }

            $adrespattern = "/[A-Z][a-z]{1,30}\s[A-z]{0,2}[1,9][0,9]{1,2}/";
                if(!preg_match($adrespattern, $adres)) {
                    echo "fout";
                    }

            $postcodepattern = "/[1-9][0-9]{3}\s?(?!SS|ss|SA|sa|SD|sa)[A-z]{2}/";
                if(!preg_match($postcodepattern, $postcode)) {
                    echo "fout";
                    }

             $landpattern = "/[A-Z][a-z]{1,56}/";
                if(!preg_match($landpattern, $land)) {
                    echo "fout";
                    }

            $emailpattern = "/[a-z0-9]{1,64}@[a-z0-9]*.[a-z]{1,3}/";
                if(!preg_match($emailpattern, $email)) {
                    echo "fout";
                    }
        }

            // regex /[1-9][0-9]{3}\s?(?!SS|ss|SA|sa|SD|sa)[A-z]{2}/g
            // regex /[a-z0-9]{1,64}@[a-z0-9]*.[a-z]{1,3}/g

                

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            foreach ($_POST as $key => $value) {
                $$key = $value;
            }


            if (isset($naam) && isset($achternaam) && isset($adres) && isset($postcode) && isset($land) && isset($email)) {
                echo "Naam: " . $naam . "<br>";
                echo "Achternaam: " . $achternaam . "<br>";
                echo "Adres: " . $adres . "<br>";
                echo "Postcode: " . $postcode . "<br>";
                echo "Land: " . $land . "<br>";
                echo "E-mailadres: " . $email;
            } else {
                echo "Niet alle benodigde velden zijn ingevuld.";
            }
        }
            

    ?>
</body>
</html>