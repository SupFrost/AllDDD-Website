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
        function getIfSet($value, $default = false)
        {
            return isset($value) ? $value : $default;
        }


        $CODE = "";
        if (!empty($_REQUEST["guid"])) {
            $GUID = getIfSet($_REQUEST["guid"]);
        }

        $SUCCESS = FALSE;
        if (!empty($_REQUEST["success"])) {
            $SUCCESS = getIfSet($_REQUEST["success"]);
        }

        if ($SUCCESS) {
            echo "<h1>Uw profiel is met success aan gepast!</h1>";
            exit();
        } else {


            ?>

            <div id="updateinfo">
                <?php

                $GUID = $_REQUEST['guid'];
                $PASSRESET = isset($_REQUEST["passreset"]) ? $_REQUEST["passreset"] : FALSE;
                $Admin = $_REQUEST['admin'];


                if ($PASSRESET != FALSE && $PASSRESET != "") {
                    $query = "SELECT * FROM users WHERE passreset = '$PASSRESET'";
                } else {
                    $query = "SELECT * FROM users WHERE GUID = '$GUID'";
                }

                $result = db_select($query);

                foreach ($result as $row) {
                    $Name = $row['naam'] . " " . $row['voornaam'];
                    $Birth = $row['geboortedatum'];
                    $Email = $row['email'];
                    $Postalcode = $row['postnummer'];
                    $consulentecode = $row['consulente_code'];
                    ?>
                    <form id="updateinfo2" method="post">
                        <fieldset>
                            <legend>Pas de nodige gevens aan:</legend>
                            <div style="width:250px; margin: 0 auto; height: 100%;">
                                <label style="float:left;">Uw consulente code: </label>
                                <input name="consulentecode" readonly style="float: right;" class="input"
                                       value="<?php echo $consulentecode; ?>"/>
                                <br/>
                                <label style="float:left;">Uw naam:</label>
                                <input name="naam" readonly class="input" style="float: right;"
                                       value="<?php echo $Name; ?>"/>
                                <br/>
                                <label style="float:left;">Geboren op: </label>
                                <input name="geboortedatum" type="date" style="float: right;" class="input"
                                       value="<?php echo $Birth; ?>"/>
                                <br/>
                                <label style="float:left;">Uw Emailadres: </label>
                                <input name="email" type="email" style="float: right;" class="input"
                                       value="<?php echo $Email; ?>"/>
                                <br/>
                                <label style="float:left;">Postcode: </label>
                                <input name="postcode" type="number" style="float: right;" class="input"
                                       value="<?php echo $Postalcode; ?>"/>
                                <?php if ($Admin != "1") {
                                    echo "<br/>
                                    <br/>
                                    <br/>
                                    <label style='float:left;'>Paswoord: </label>
                                    <input  name='paswoord' type='password' style='float: right;' class='input'
                                           placeholder='Paswoord'/>
                                    <br/>
                                    <label style='float:left;'>Herhaal Paswoord: </label>
                                    <input name='paswoord2' type='password'  style='float: right;' class='input'
                                           placeholder='Herhaal uw paswoord!'/>";
                                    echo "<input type='hidden' name='pass' value='1'>";
                                }
                                ?>

                                <br/>

                                <div class="buttons">
                                    <input id="submit" class='loginbutton'
                                           style="float:left; background-color: #9ea7b1;" formaction="registreer.php"
                                           value="<< Terug" type="submit"/>
                                    <input id="submit" class='loginbutton'
                                           style="float: right; background-color: #9ea7b1;" value="Volgende >>"
                                           type="submit"

                                        <?php

                                        if ($Admin != "1") {
                                            echo "formaction='/php_scripts/update_account.php?pas=1'";
                                        } else {
                                            echo "formaction='/php_scripts/update_account.php?pas=0'";
                                        }

                                        ?>
                                        />
                                </div>
                            </div>

                        </fieldset>
                    </form>
                    <?php
                    exit();
                }
                ?>
            </div>
        <?php
        }


        if (isset($_COOKIE['alldddlogin'])) {
            $GUID = $_COOKIE['alldddlogin'];

            /*check if GUID is from consulentecode */
            $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)
            or die('Error connecting to MySQL server');

            $query = "SELECT GUID FROM users WHERE consulente_code ='$CODE'";
            $result = mysqli_query($dbc, $query);

            if ($result != FALSE || $numrows != 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $check = $row['GUID'];
                }

                if ($check != $GUID) {
                    header("Location: http://allddd.be");
                    exit();
                }
            }

        }
        ?>


    </section>

</div>
<script type="text/javascript"> Cufon.now(); </script>
<script>
    $(window).load(function () {
        $('#slider')._TMS({
            banners: true,
            waitBannerAnimation: false,
            preset: 'diagonalFade',
            easing: 'easeOutQuad',
            pagination: true,
            duration: 400,
            slideshow: 8000,
            bannerShow: function (banner) {
                banner.css({marginRight: -500}).stop().animate({marginRight: 0}, 600)
            },
            bannerHide: function (banner) {
                banner.stop().animate({marginRight: -500}, 600)
            }
        })
    })
</script>
</body>
</html>