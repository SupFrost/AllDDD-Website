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
        <div id="registreer">

            <?php
            if (!isset($_REQUEST['consulentecode']) || $_REQUEST['consulentecode'] == "Consulente code bv: 74001" || $_REQUEST['consulentecode'] == "") {

                ?>
                <form method="post" action="">
                    <fieldset style="text-align: center;">
                        <legend>Geef uw consulentecode! 5 cijfers!</legend>
                        <div class="bg"><input class="input" id="consulentecode" name="consulentecode"
                                               placeholder="Consulente code bv: 74001" type="text"/></div>
                        <div class="buttons">
                            <input class="loginbutton" style="background-color: #9ea7b1" id="submit" value="Volgende >>"
                                   type="submit"/>
                        </div>
                    </fieldset>


                </form>
            <?php

            } else {

                $CODE = $_REQUEST['consulentecode'];

                if (!preg_match("/[0-9]{5}/", $CODE)) {
                    echo "<h2 style='text-align: center; '>Dit is geen geldige consulente code!</h2>";
                    header("refresh:3;url=http://allddd.be/registreer.php");
                    exit();
                }


                $query = "SELECT GUID FROM users WHERE consulente_code = '$CODE'";
                $result = db_select($query);

                foreach ($result as $row)
                    $GUID = $row['GUID'];


                if ($CODE != "" and $CODE != "Consulente Code") {
                    $query = "SELECT GUID FROM users WHERE consulente_code = '$CODE'";
                    $result = db_select($query);

                    foreach ($result as $row)
                        $GUID = $row['GUID'];

                    $query = "SELECT * FROM users WHERE GUID = '$GUID'";
                    $result = db_query($query);


                    foreach ($result as $row) {

                        $GUID = $row['GUID'];
                        if ($row['registreerd'] != true) {
                            $Name = $row['naam'] . " " . $row['voornaam'];
                            $Birth = $row['geboortedatum'];
                            $Email = $row['email'];
                        } else {
                            echo "<h2 style='text-align: center; '>U bent al geregistreerd!</h2>";
                            header("refresh:3;url=http://allddd.be/registreer.php");
                            exit();
                        }

                        ?>

                        <form id="registreer2" method="post" action="">
                            <fieldset>
                                <legend>Bent u:</legend>
                                <div style="min-width:250px; width: 50%; margin: 0 auto;">
                                    <label style="float: left">Uw consulente code: </label>
                                    <label style="float: right;"><?php echo $CODE; ?></label>
                                    <input type="hidden" name="guid" value="<?php echo $GUID; ?>">
                                    </br>
                                    <label style="float: left">Uw naam:</label>
                                    <label style="float: right;"> <?php echo $Name; ?></label>
                                    </br>
                                    <label style="float: left">Geboren op: </label>
                                    <label style="float: right;"><?php echo $Birth; ?></label>
                                    </br>
                                    <label style="float: left">Uw Email: </label>
                                    <label style="float: right;"><?php echo $Email; ?></label>
                                    </br>
                                    <input type='hidden' name='Admin' value='0'>
                                </div>
                                <div class="buttons">
                                    <input class="loginbutton" style="background-color: #9ea7b1" style="float:left;"
                                           formaction="registreer.php" value="<< Terug" type="submit"/>
                                    <input class="loginbutton" style="background-color: #9ea7b1"
                                           formaction="updateaccountinfo.php?pas=1"
                                           style="float: right; background-color: #9ea7b1"
                                           value="Volgende >>"
                                           type="submit"/
                                </div>
                            </fieldset>
                        </form>


                    <?php
                    }
                }
            }
            ?>


        </div>
    </section>
    <!--footer -->

</div>
</body>
</html>