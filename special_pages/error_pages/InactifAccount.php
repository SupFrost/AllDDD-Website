<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="../../js/jquery-1.6.js"></script>
    <script type="text/javascript" src="../../js/tms-0.3%20-old.js"></script>
    <script type="text/javascript" src="../../js/tms_presets.js"></script>
    <script type="text/javascript" src="../../js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../../js/atooltip.jquery.js"></script>
    <script type="text/javascript" src="../../js/css3-mediaqueries.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

</head>
<body id="page1" style="min-height:100%; position:relative;">
<!--header -->
<div class="lists">
    <header class="box_header">
        <div class="search">


        </div>

        <a href="/index.php"><img id="logo" src="/img/Logo.png"/></a>
        <img class="menu-icon" src="../../img/mobile_menu_button.png">
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

        <nav>
            <ul id="slide-menu" class="slide-menu">

            </ul>

            <ul id="menu">

            </ul>


        </nav>

    </header>

    <section class="content">

        <h1>U heeft geen toegang tot deze pagina!</h1>

        <h3 style="margin: 0 auto; text-align: center;">Uw account is op non-actief gezet!</h3>

        <p style="margin: 0 auto; text-align: center;">U wordt terug gestuurd binnen enkele momenten...</p>
    </section>
</div>
</body>
</html>
<?php
header("refresh:5; url=http://allddd.be");
exit();
?>