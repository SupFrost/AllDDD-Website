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

        <form style="width:90%; margin: 0 auto;" method="post" action="php_scripts/login.php">
            <fieldset>
                <div class="bg"><input class="input" name="username" type="text" value="Consulente Code"
                                       onblur="if (this.value == '') this.value = 'Consulente Code'"
                                       onFocus="if (this.value == 'Consulente Code') this.value = ''"></div>
                <div class="bg"><input class="input" name="password" type="password" value="Wachtwoord"
                                       onblur="if (this.value == '') this.value = 'Wachtwoord'"
                                       onfocus="if (this.value == 'Wachtwoord') this.value = ''"></div>
                <div class="buttons">
                    <input type="submit" formaction="php_scripts/login.php" value="Log In"/>
                    <input type="submit" formaction="registreer.php"
                           value="Registreer"/>
                </div>
            </fieldset>
        </form>


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
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>