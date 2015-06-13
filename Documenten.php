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
<?php include_once("./php_scripts/analyticstracking.php") ?>
<?php
include_once "./php_scripts/page_visit.php";
pageView(curPageURL());
?>
<!--header -->
<div class="lists">
    <header>
        <?php

        include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php";

        ?>
    </header>

    <section class="content">
        <div class="filemanager">

            <a class="searchexpand">
                <div class="search">
                    <input type="search" placeholder="Zoek een bestand"/>
                </div>
            </a>

            <ul class="data"></ul>

            <div class="nothingfound">
                <div class="nofiles"></div>
                <span>Geen bestanden!</span>
            </div>

        </div>


    </section>

    <script type="text/javascript"> Cufon.now(); </script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="/js/script.js"></script>
</div>
</body>
</html>