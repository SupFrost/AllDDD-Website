<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="../../js/jquery-1.6.js"></script>
    <script type="text/javascript" src="../../js/css3-mediaqueries.js"></script>
    <link rel="stylesheet" type="text/css" href="style/fireworks.css" media="screen"/>
    <script type="text/javascript" src="script/soundmanager2-nodebug-jsmin.js"></script>
    <script type="text/javascript" src="script/fireworks.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

</head>
<body id="page1" style="min-height:100%; position:relative;">
<!--header -->
<div class="lists">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php"; ?>

    <div id="fireworks-template">
        <div id="fw" class="firework"></div>
        <div id="fp" class="fireworkParticle"><img src="image/particles.gif" alt=""/></div>
    </div>

    <div id="fireContainer"></div>

    <section class="content">

        <div style="margin: auto auto; text-align: center;">
            <font style="font-size:60px" color=ff00ff>G</font><font style="font-size:60px" color=ff00cc>e</font><font
                style="font-size:60px" color=ff0099>l</font><font style="font-size:60px" color=ff0066>u</font><font
                style="font-size:60px" color=ff0033>k</font><font style="font-size:60px" color=ff0000>k</font><font
                style="font-size:60px" color=ff3300>i</font><font style="font-size:60px" color=ff6600>g</font><font
                style="font-size:60px" color=ff9900>e</font> <font style="font-size:60px" color=ffcc00>v</font><font
                style="font-size:60px" color=ffff00>e</font><font style="font-size:60px" color=ccff00>r</font><font
                style="font-size:60px" color=99ff00>j</font><font style="font-size:60px" color=66ff00>a</font><font
                style="font-size:60px" color=33ff00>a</font><font style="font-size:60px" color=00ff00>r</font><font
                style="font-size:60px" color=00ff33>d</font><font style="font-size:60px" color=00ff66>a</font><font
                style="font-size:60px" color=00ff99>g</font><font style="font-size:60px" color=00ffcc>:</font>

            <font style="font-size:60px">
                <?php

                $DB_HOST = "localhost";
                $DB_NAME = "allddd";
                $DB_USER = "websiteuser";
                $DB_PASS = "Tupperware5722";
                $GUID = $_COOKIE["alldddlogin"];

                $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)
                or die('Error connecting to MySQL server 5000');

                $query = "SELECT voornaam FROM users WHERE GUID = '$GUID'";
                $result = mysqli_query($dbc, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $name = $row['voornaam'];
                }

                echo $name;

                ?></font><font style="font-size:60px" color=ff00ff>!</font><font style="font-size:60px"
                                                                                 color=ff00cc>!</font>
        </div>
    </section>
    <script lang="javascript">
        setInterval(myMethod, 1000);

        function myMethod() {
            createFirework(73, 121, 7, 4, null, null, null, null, true, true);
        }
    </script>
</div>
</body>
</html>