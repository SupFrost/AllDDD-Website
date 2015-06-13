<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="../js/jquery-1.6.js"></script>
    <script type="text/javascript" src="../js/tms-0.3%20-old.js"></script>
    <script type="text/javascript" src="../js/tms_presets.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../js/atooltip.jquery.js"></script>
    <script type="text/javascript" src="../js/css3-mediaqueries.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

</head>
<body id="page1" style="min-height:100%; position:relative;">
<!--header -->
<div class="lists">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php"; ?>

    <section class="content" style="max-width: 500px;">
        <h1>Paswoord vergeten?</h1>

        <p style="margin: 0 auto; text-align: center; max-width: 400px;">Geef hieronder je consulente code in, je zal
            dan een mail aankrijgen zodat je je paswoord kan veranderen!</p>


        <form style="width: 300px; margin-top: 50px;" name="search" method="post" action="../php_scripts/login.php">
            <fieldset>
                <div class="bg"><input class="input" id="username" name="username" type="text"
                                       placeholder="Vul in..."></div>
                <div class="buttons">
                    <input class="PaswoordVergeten" style="background-color: #9ea7b1" type="submit"
                           formaction="../php_scripts/password.php" value="Paswoord vergeten"/>
                </div>
            </fieldset>
        </form>


    </section>
</div>
</body>
</html>