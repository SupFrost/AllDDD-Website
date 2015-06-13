<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <link href="/special_pages/admin/css/m-styles.min.css" rel="stylesheet">
    <link href="/special_pages/admin/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
</head>
<body id="page1" style="min-height:100%; position:relative;">
<!--header -->
<div class="lists">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php"; ?>
    </header>
    <section class="content">

        <h2 style="text-align: center">Zet de data in uw agenda!</h2>

        <p style="text-align: center">Download het bestand hierond en zet het rechtstreeks in Outlook en Thunderbird!
            <br> Maar natuurlijk ook in je iPhone, iPad of Android apparaat! <br> Als er nieuwe cursussen worden
            aangekondigd worden deze AUTOMATISCH in uw agenda geplaatst! </p>

        <div class="admin-settings" style="margin: 0 auto;     width: 100px;"><a class="m-btn green"
                                                                                 style="text-align: center;"
                                                                                 href="https://www.google.com/calendar/ical/tvccbtpovpid8tuq314s4pur64%40group.calendar.google.com/public/basic.ics">Download</a>
        </div>

        <table class="tftable" border="1">
            <tr>
                <th>Cursus</th>
                <th>Datum</th>
            </tr>
            <tr>
                <td>Cursus 1</td>
                <td>09/06/2015 - 19:30</td>
            </tr>
            <tr>
                <td>Cursus 2 & 3</td>
                <td>16/06/2015 - 19:30</td>
            </tr>
            <tr>
                <td>Groeicursus</td>
                <td>20/06/2015 - 10:00</td>
            </tr>
        </table>


    </section>
    <!--footer -->

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
                banner.css({marginRight: -500}).stop().animate({marginRight: 0}, 600);
            },
            bannerHide: function (banner) {
                banner.stop().animate({marginRight: -500}, 600);
            }
        });
    })
</script>
</body>
</html>
