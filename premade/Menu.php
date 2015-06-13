<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_scripts/analyticstracking.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php_scripts/page_visit.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/premade/restrictedPage.php";
pageView(curPageURL());
include $_SERVER['DOCUMENT_ROOT'] . "/premade/dbconnect.php";
?>

<a href="/index.php"><img id="logo" src="/img/Logo.png"/></a>

<div class="search">
    <?php
    if (isset($_COOKIE["alldddlogin"])) {
        ?>
        <form id="LoggedIn" method="post" action="/php_scripts/logout.php">
            <fieldset>
                <div class="bgLoggedIn">Welkom, <?php
                    $GUID = $_COOKIE["alldddlogin"];

                    $query = "SELECT voornaam FROM users WHERE GUID = " . db_quote($GUID);

                    $result = db_select($query);

                    foreach ($result as $row) {
                        echo $row['voornaam'];
                    }

                    ?> !<br/></div>
                <div class="buttons"><input class="LoginButton" type="submit" value="Log uit"/></div>
                <div class="buttons"><input class="LoginButton" type="submit" value="Profiel"
                                            formaction="/updateaccountinfo.php?guid=<?php echo $GUID; ?>"/></div>
            </fieldset>
        </form>
    <?php
    } else {
        ?>

        <form id="search" name="search" method="post" action="/php_scripts/login.php">
            <fieldset>
                <div class="bg"><input class="input" id="username" name="username" type="text"
                                       placeholder="Consulente Code"
                        ></div>
                <div class="bg"><input class="input" name="password" type="password" placeholder="Wachtwoord">
                </div>
                <div class="buttons">
                    <input class="LoginButton" type="submit" value="Log In" formaction="/php_scripts/login.php"/>
                    <input class="PaswoordVergeten" type="submit"
                           formaction="/special_pages/paswoordvergeten.php5"
                           value="?"/>
                    <input class="RegistreerButton" type="submit" formaction="/registreer.php"
                           value="Registreer"/>
                </div>
            </fieldset>
        </form>
    <?php
    }
    ?>
</div>
<nav>
    <ul id="slide-menu" class="slide-menu">

        <?php
        if (isset($_COOKIE["alldddlogin"])) {

            $GUID = $_COOKIE["alldddlogin"];


            $query = "SELECT voornaam FROM users WHERE GUID =" . db_quote($GUID);

            $result = db_select($query);
            foreach ($result as $row) {
                $endresult = "Profiel: " . $row['voornaam'] . "!";
            }

            echo "<li class='last'><a href='/updateaccountinfo.php?guid=$GUID'><span>$endresult</span></a></li>";
        } else {
            echo '<li class="active"><a href="/login.php"><span>Login</span></a></li>';
        }
        ?>
        <li><a href="/index.php"><span>Homepage</span></a></li>
        <?php


        if (accessGranted(6)) {
            echo "<li><a href='/Documenten.php?folder=Documenten'><span>Documenten</span></a></li>
                <li><a href='/Documenten.php?folder=Recepten'><span>Recepten</span></a></li>
                <li><a href='/Documenten.php?folder=Folders'><span>Folders</span></a></li>
                <li><a href='/uploadcenter.php'><span>Upload-center</span></a></li>
                <li><a href='/Ideebus.php'><span>Ideënbus</span></a></li>";
        } else {
            echo "<li><a href='/special_pages/error_pages/AccessRestricted.php'><span>Documenten</span></a></li>
                <li><a href='/special_pages/error_pages/AccessRestricted.php'><span>Recepten</span></a></li>
                <li><a href='/special_pages/error_pages/AccessRestricted.php'><span>Folders</span></a></li>";
        }
        ?>
        <li><a href="/Kalender.php"><span>Kalender</span></a></li>
        <li><a href="/cursusdata.php"><span>Cursusdata</span></a></li>
        <li class="last"><a href="http://order.tupperware.be/"><span>iTup</span></a></li>
    </ul>

    <ul id="menu">
        <li><a href="/index.php"><span>Homepage</span></a></li>
        <?php
        if (accessGranted(6)) {
            echo "<li><a href='/Documenten.php?folder=Documenten'><span>Documenten</span></a></li>
                <li><a href='/Documenten.php?folder=Recepten'><span>Recepten</span></a></li>
                <li><a href='/Documenten.php?folder=Folders'><span>Folders</span></a></li>
                <li><a href='/uploadcenter.php'><span>Upload-center</span></a></li>
                <li><a href='/Ideebus.php'><span>Ideënbus</span></a></li>";
        } else {
            echo "<li><a href='/special_pages/error_pages/AccessRestricted.php'><span>Documenten</span></a></li>
                <li><a href='/special_pages/error_pages/AccessRestricted.php'><span>Recepten</span></a></li>
                <li><a href='/special_pages/error_pages/AccessRestricted.php'><span>Folders</span></a></li>";
        }
        ?>
        <li><a href="/Kalender.php"><span>Kalender</span></a></li>
        <li><a href="/cursusdata.php"><span>Cursusdata</span></a></li>
        <li class="last"><a href="http://order.tupperware.be/"><span>iTup</span></a></li>
        <?php
        if (accessGranted(2)) {
            echo "<li><a href='/special_pages/admin/dashboard.php'><span>Admin Dashboard</span></a></li>";
        } ?>
        <li style="float:right;"><a href="/special_pages/error_pages/filebugreport.php"><span>Rapporteer Fout</span></a>
        </li>
    </ul>
</nav>


<img class="menu-icon" src="/img/mobile_menu_button.png">
<script>
    (function () {
        var $body = document.body, $menu_trigger = $body.getElementsByClassName('menu-icon')[0];
        if (typeof $menu_trigger !== 'undefined') {
            $menu_trigger.addEventListener('click', function () {
                $body.className = $body.className == 'menu-active' ? '' : 'menu-active';
            });
        }
    }.call(this));
</script>
<script type="text/javascript">
    $(function () {
        // this will get the full URL at the address bar
        var url = window.location.href;
        // passes on every "a" tag
        $("#menu a").each(function () {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
            }
        });
    });
</script>

