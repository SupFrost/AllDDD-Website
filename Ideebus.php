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
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php"; ?>
    </header>

    <section class="content">

        <?php
        if (isset($_REQUEST['succes'])) {
            if ($_REQUEST['succes']) {
                echo "<h2 style='text-align: center;'>Uw idee is met succes ingediend!</h2>";
            }
        } else {
            ?>
            <div style="text-align: center">
                <form method="POST" id="IdeeForm" name="IdeeForm" style="margin: 0 auto;"
                      action="/php_scripts/process_idea.php">
                    <legend>Idee?</legend>
                    <br>

                    <div class="bg">
                        <input class="input" placeholder="Consulente code" id="consulentecode" name="consulentecode"
                               value="<?php


                               $GUID = $_COOKIE["alldddlogin"];
                               $consulentecode = '';

                               $query = "SELECT consulente_code FROM users WHERE GUID = '$GUID'";
                               $result = db_select($query);

                               foreach ($result as $row) {
                                   $consulentecode = $row['consulente_code'];
                               }

                               echo $consulentecode;
                               ?>">
                        <input class="input" placeholder="Naam" id="naam" name="naam" value="<?php


                        $query = "SELECT naam, voornaam FROM users WHERE GUID = '$GUID'";
                        $result = db_select($query);

                        foreach ($result as $row) {
                            $naam = $row['naam'] . " " . $row['voornaam'];
                        }

                        echo $naam;
                        ?>">
                    </div>
                    <label for="TypeIdee">Soort: </label>
                    <select id="TypeIdee" name="TypeIdee"
                            style="margin: 2em auto; text-align: left; min-width: 50px; width: auto; ">
                        <option value="" disabled selected>Kies een optie!</option>
                        <option>Tafel/Recept</option>
                        <option>Licht</option>
                        <option>Muziek</option>
                        <option>Personen</option>
                        <option>Balie</option>
                        <option>Gebouw</option>
                        <option>Andere..</option>
                    </select>

                    <div class="bg">
                        <textarea placeholder="Beschrijf uw idee hier!" class="input"
                                  style="min-width: 200px; width: auto; max-width: 400px;  height: 120px;" id="IdeeText"
                                  name="IdeeText"></textarea>
                    </div>

                    <div class="buttons"><input type="submit" id="Submit" name="Submit" value="Eureka!"></div>

                </form>
            </div>

        <?php
        }

        ?>

    </section>
</div>
</body>
</html>