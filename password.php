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


        <div id="inputconsulentecode" style="margin: 50px 50px;">

            <form>
                <label>Consulente code:</label> <br>

                <div class="bg"><input class="input" type="text" placeholder="consulente code" id="code" name="code">
                </div>
                <br>

                <div class="buttons"><input type="submit" formaction="./php_scripts/password.php"
                                            value="Passwoord vergeten!"></div>
            </form>
        </div>
    </section>
</div>
</body>
</html>











