<html>
<head>
    <title>All DDD - Units</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
    <link href="/special_pages/admin/css/m-styles.min.css" rel="stylesheet">
    <link href="/special_pages/admin/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
</head>
<body id="page1" style="min-height:100%; position:relative;">
<?php
session_start();
?>


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
        accessGranted(2)
        ?>

        <h3 style="text-align: center">Units</h3>
        <table class="tftable">
            <tr>
                <th>Unit Code</th>
                <th>Naam</th>
                <th>Manager/Consulent Leader</th>

            </tr>

            <?php
            $query = "SELECT units.code, units.naam 'unitsNaam', CONCAT(users.voornaam, ' ', users.naam) 'usersNaam', users.GUID 'usersGUID', units.GUID 'unitsGUID' FROM units left OUTER JOIN users on (units.GUID = users.unit) where users.consulente_code LIKE '%001' ORDER BY units.code ASC ";
            $result = db_select($query);

            foreach ($result as $row) {
                $unitCode = $row['code'];
                $unitsNaam = $row['unitsNaam'];
                $usersNaam = $row['usersNaam'];
                $usersGUID = $row['usersGUID'];
                $unitsGUID = $row['unitsGUID'];

                echo "<tr><td><a href='#'>$unitCode</a></td><td>$unitsNaam</td><td><a href='/special_pages/admin/pages/detail_pages/user.php?GUID=$usersGUID'>$usersNaam</a></td></tr>";
            }
            ?>


        </table>


    </section>
</div>

</body>
</html>