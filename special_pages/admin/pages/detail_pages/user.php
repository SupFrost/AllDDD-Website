<html>
<head>
    <title>All DDD - Users</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
    <link href="/special_pages/admin/css/m-styles.min.css" rel="stylesheet">
    <link href="/special_pages/admin/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
</head>
<body id="page1" style="min-height:100%; position:relative;">
<!--header -->
<div class="lists">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php";

        ?>
    </header>

    <section class="content">
        <?php
        accessGranted(2);

        if (isset($_REQUEST['GUID'])) {
            $userGUID = $_REQUEST['GUID'];
        } else {
            if (isset($_SERVER['HTTP_REFERER']))
                $ref = $_SERVER['HTTP_REFERER'];
            else
                $ref = 'http://allddd.be/';

            header("refresh:5; url=$ref");
            exit();
        }


        $query = "SELECT users.GUID 'usersGUID', users.registreerd, users.consulente_code, users.email, users.postnummer, users.geboortedatum,
  users.actief, users.naam 'usersNaam', users.voornaam 'usersVoornaam', users.lastlogin, user_function.Function,
  units.naam 'unitsNaam', gemeenten.Gemeente from users left outer join user_function
    on (users.user_function = user_function.FunctionID) LEFT OUTER JOIN units on (users.unit = units.GUID)
  LEFT OUTER JOIN gemeenten on (users.postnummer = gemeenten.Postcode) WHERE users.GUID = " . db_quote($userGUID);

        $result = db_select($query);

        foreach ($result as $row) {
            $usersRegistreerd = isset($row['registreerd']) ? $row['registreerd'] : "";
            $usersConsulenteCode = isset($row['consulente_code']) ? $row['consulente_code'] : "";
            $usersEmail = isset($row['email']) ? $row['email'] : "";
            $usersPostnummer = isset($row['postnummer']) ? $row['postnummer'] : "";
            $usersGemeente = isset($row['Gemeente']) ? $row['Gemeente'] : "";
            $usersGeboortedatum = isset($row['geboortedatum']) ? $row['geboortedatum'] : "";
            $usersActief = isset($row['actief']) ? $row['actief'] : "";
            $usersNaam = isset($row['usersNaam']) ? $row['usersNaam'] : "";
            $usersVoornaam = isset($row['usersVoornaam']) ? $row['usersVoornaam'] : "";
            $usersLastlogin = isset($row['lastlogin']) ? $row['lastlogin'] : "";
            $usersFunction = isset($row['Function']) ? $row['Function'] : "";
            $unitsNaam = isset($row['unitsNaam']) ? $row['unitsNaam'] : "";
        }





        ?>

        <h3 style="text-align: center">Gebruiker -  <?php echo "$usersVoornaam $usersNaam"; ?></h3>


        <br>


        <div id="twothirdcolumn">
            <table class="tftable">
                <tr>
                    <td>Consulente Code</td>
                    <td><?php echo $usersConsulenteCode ?></td>
                </tr>
                <tr>
                    <td>Unit</td>
                    <td><?php echo $unitsNaam ?></td>
                </tr>
                <tr>
                    <td>Naam</td>
                    <td><?php echo $usersVoornaam . " " . $usersNaam ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $usersEmail ?></td>
                </tr>
                <tr>
                    <td>Gemeente</td>
                    <td><?php echo $usersGemeente . " ($usersPostnummer)" ?></td>
                </tr>
                <tr>
                    <td>Geboortedatum</td>
                    <td><?php echo $usersGeboortedatum ?></td>
                </tr>
                <tr>
                    <td>Functie</td>
                    <td><?php echo $usersFunction ?></td>
                </tr>
                <tr>
                    <td>Actief</td>
                    <td><?php echo $usersActief ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo "<div class='admin-settings' style='margin-left: 0;margin-right: 0;'>
                        <a href='/special_pages/admin/php_scripts/changeUser.php?code=$usersConsulenteCode&action=change' class='m-btn purple'>Pas aan!</a></div>"; ?></td>
                </tr>


            </table>


        </div>


    </section>
</div>

</body>
</html>