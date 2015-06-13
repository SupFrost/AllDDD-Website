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


        $query = "SELECT"


        ?>

        <h3 style="text-align: center">Gebruiker -  </h3>


        <br>


    </section>
</div>

</body>
</html>