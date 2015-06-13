<!DOCTYPE html>
<html lang="en">
<head>
    <title>All D.D.D. Tupperware</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/js/tms-0.3.js"></script>
    <script type="text/javascript" src="/js/tms_presets.js"></script>
    <script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes"/>

</head>
<body id="page1" style="min-height:100%; position:relative;">


<!--header -->
<div class="lists">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php"; ?>
    </header>

    <section class="content">

        <aside id="sidebar">
            <?php

            $query = "SELECT id, headline, DATE_FORMAT(timestamp, '%d/%m/%Y') AS formattedDate, story  FROM news  ORDER BY timestamp DESC LIMIT 4";
            $result = db_select($query);

            foreach ($result as $row) {
                ?>
                <b><?php echo $row['headline']; ?></b> <br>   <?php echo $row['story']; ?> <br>
                <i><?php echo $row['formattedDate']; ?></i> <br><br><?php
            }
            ?>
        </aside>

        <aside id="sidebar-right">
            <a href="/Bestanden/Recepten/Dranken/Sun%20Lady.docx">

                <h3>Recept van de week!</h3>
                <h4>Cocktail: Sun Lady</h4>
                <img style="max-width: 75%; margin: 10px 12%;" src="/img/recept_van_de_week/cocktail.png"
                     alt="Cocktail"/>

                <p>Probeer nu ook eens zelf het lekkere recept van Steve en Sandra uit!</p>

                <p>Klik op ergens in dit vak!</p>
            </a>
        </aside>


        <div id="slider">
            <ul class="items">
                <?php
                $files = scandir('img/homepage_slider/');
                foreach ($files as $file) {
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    if ($ext == 'jpg' || $ext == 'png') {
                        echo '<li>';
//                    if(basename($file) == 'SMS-Actie-Mei-2015') {
//                       // echo 'href="./Bestanden/Folders/Acties/SMS-bijboekactie-mei-2015.pdf"';
//                    }
                        echo '<img src="./img/homepage_slider/' . basename($file) . '" alt=""><div class="banner"></div></li>';
                    }

                }
                ?>
            </ul>
        </div>
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

    </section>

</div>

</body>
</html>