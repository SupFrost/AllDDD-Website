<html>
<head>
    <title>All DDD - Dashboard</title>
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
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php"; ?>

    </header>

    <section class="content">
        <?php
        if (accessGranted(2) === false) {
            header("Location: htpp://allddd.be/special_pages/error_pages/AccessRestricted.php");
            exit();
        }
        ?>

        <h3 style="text-align: center;">Dashboard</h3>

        <div class="admin-settings">
            <a href="pages/users_overview.php" class="m-btn red">Gebruikers</a>
            <a href="pages/logins.php" class="m-btn green">Logins</a>
            <a href="pages/units_overview.php" class="m-btn purple">Units</a>
            <a href="pages/addNews.php" class="m-btn blue">Nieuws Toevoegen</a>
        </div>


    </section>
</div>
</body>
</html>