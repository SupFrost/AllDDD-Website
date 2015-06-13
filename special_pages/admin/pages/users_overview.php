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

        <h3 style="text-align: center">Gebruikers</h3>


        <form class="usersearch" id="usersearch" name="search" method="get">
            <fieldset>
                <div class="bg">
                    <input class="input" id="search" name="search" type="text" value="code/naam/email"
                           onblur="if (this.value == '') this.value = 'code/naam/email'"
                           onFocus="if (this.value == 'code/naam/email') this.value = ''">
                </div>
                <div class="buttons">
                    <input class="LoginButton" style="background-color: #9ea7b1" type="submit"
                           formaction="../php_scripts/searchUser.php" value="Zoek"/>
                </div>
            </fieldset>

        </form>

        <br>

        <table class="tftable">
            <tr>
                <th>Consulente Code</th>
                <th>Naam</th>
                <th>Email</th>

            </tr>

            <?php
            $query = "SELECT GUID, consulente_code,voornaam,naam,email,actief FROM users ORDER BY naam ASC";

            if (isset($_SESSION['codes'])) {

                $codes = $_SESSION['codes'];
                $where = "";

                foreach ($codes as $code) {
                    $where .= "'$code',";
                }

                $where = substr($where, 0, strlen($where) - 1);
                $query = "SELECT GUID, consulente_code,voornaam,naam,email,actief FROM users WHERE consulente_code IN ($where) ORDER BY naam ASC";
            }


            $result = db_select($query);

            foreach ($result as $row) {
                $consulentecode = $row['consulente_code'];
                $naam = $row['voornaam'] . " " . $row['naam'];
                $email = $row['email'];
                $actief = $row['actief'];
                $GUID = $row['GUID'];

                echo "<tr><td>$consulentecode</td><td>$naam</td><td>";

                if ($email != null) {
                    echo " <a href='mailto:$email?body=Hey%20$naam,'>$email</a></td>";
                } else {
                    echo "</td>";
                }
                echo "<td><div class='admin-settings' style='margin-left: 0;margin-right: 0;'>";

                if ($actief == '0') {
                    echo "<a href='../php_scripts/changeUser.php?code=$consulentecode&action=actief' class='m-btn green'>Zet Actief!</a></div></td>";
                } else {
                    echo "<a href='../php_scripts/changeUser.php?code=$consulentecode&action=inactief' class='m-btn red'>Zet Inactief!</a></div></td>";
                }

                echo "<td><div class='admin-settings' style='margin-left: 0;margin-right: 0;'>
                        <a href='/special_pages/admin/pages/detail_pages/user.php?GUID=$GUID'' class='m-btn green'>Profiel</a></div></td>";

                if ($email != null) {
                    echo "<td><div class='admin-settings' style='margin-left: 0;margin-right: 0;'>
                        <a href='mailto:$email?body=Hey%20$naam,' class='m-btn blue'>Email</a></div></td>";
                }


                echo "</tr>";
            }


            $_SESSION['codes'] = null;
            ?>


        </table>


    </section>
</div>

</body>
</html>