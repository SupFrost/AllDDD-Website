<html>
<head>
    <title>All DDD - Logins</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

</head>
<body id="page1" style="min-height:100%; position:relative;">
<script src="/special_pages/admin/js/m-dropdown.min.js"></script>
<script src="/special_pages/admin/js/m-radio.min.js"></script>
<!--header -->
<div class="lists">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php";

        ?>
    </header>

    <section class="content">

        <?php


        include $_SERVER['DOCUMENT_ROOT'] . "/premade/restrictedPage.php";

        accessGranted(2)
        ?>

        <h3 style="text-align: center">De 10 meest recente logins!</h3>

        <table class="tftable" border="1">
            <tr>
                <th>Consulente Code</th>
                <th>Naam</th>
                <th>Laatste Login</th>
            </tr>

            <?php

            $query = "SELECT consulente_code,voornaam,naam,lastlogin FROM users ORDER BY lastlogin DESC LIMIT 0,10";

            $result = db_select($query);

            foreach ($result as $row) {
                $consulentecode = $row['consulente_code'];
                $naam = $row['voornaam'] . " " . $row['naam'];
                $lastlogin = $row['lastlogin'];

                echo "<tr><td>$consulentecode</td><td>$naam</td><td>$lastlogin</td></tr>";
            }

            ?>


        </table>

    </section>
</div>

</body>
</html>