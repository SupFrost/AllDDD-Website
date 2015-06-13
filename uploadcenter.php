<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
</head>
<body id="page1" style="min-height:100%; position:relative;">
<!--header -->
<div class="lists">
    <header>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php";

        ?>

    </header>

    <section class="content" style="text-align: center">
        <form method="post" enctype="multipart/form-data" action="php_scripts/upload.php" style="margin: 0 auto">
            <legend>Upload Center</legend>
            <br>

            <p style="margin: 0 auto; max-width: 400px; min-width: 100px; width: auto; ">Hier kan u uw ingevulde
                documenten rechtstreeks doorsturen! <br>
                Denk eraan dat documenten die niet gedownload zijn van deze site NIET verwerkt worden door het systeem!
                Gelieve dus alleen de invulbare documenten gemaakt door Nick Jorens te gebruiken!
            </p>

            <br>
            <br>

            <div class="bg">
                <input class="input" placeholder="Consulente code" id="consulentecode" name="consulentecode"
                       value="<?php

                       $GUID = $_COOKIE['alldddlogin'];

                       $query = "SELECT consulente_code FROM users WHERE GUID = " . db_quote($GUID);

                       $result = db_select($query);

                       $consulentecode = "";
                       foreach ($result as $row)
                           $consulentecode = $row['consulente_code'];


                       echo $consulentecode;
                       ?>">
                <input class="input" placeholder="Naam" id="naam" name="naam" value="<?php

                $query = "SELECT naam, voornaam FROM users WHERE GUID = " . db_quote($GUID);
                $result = db_select($query);

                $naam = "";
                foreach ($result as $row) {
                    $naam = $row['naam'] . " " . $row['voornaam'];
                }

                echo $naam;
                ?>">
            </div>

            <ul style="list-style-type: none; margin: 2em auto; text-align: left; min-width: 150px; width: auto; max-width: 200px">
                <li>
                    <input type="radio" name="soort" value="Presse-Wit" checked/> Presse-Wit
                </li>
                <li>
                    <input type="radio" name="soort" value="Blauwe_Bon"/> Blauwe Bon
                </li>
                <li>
                    <input type="radio" name="soort" value="Wisselstukken_Bon"/> Wisselstukken Bon
                </li>
            </ul>

            <input id="fileupload" name="fileupload" type="file" accept="application/pdf" style="margin: 1em auto;"/>
            <br>

            <div class="buttons"><input type="submit" value="Insturen"/></div>
        </form>
    </section>
</div>
</body>
</html>