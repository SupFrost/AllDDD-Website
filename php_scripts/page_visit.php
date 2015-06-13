<?php

function pageView($PAGE = "")
{
// CONNECT TO THE DATABASE
    $DB_HOST = "localhost";
    $DB_NAME = "allddd";
    $DB_USER = "websiteuser";
    $DB_PASS = "Tupperware5722";
    $return = "start - ";
    $ip = $_SERVER['REMOTE_ADDR'];
    $pag = $PAGE;

    if ($ip == '208.122.236.139' || $ip == '208.122.231.3') {
        exit();
    }


    $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ($dbc->connect_errno) {
        printf("Connect failed: %s\n", $dbc->connect_error);
        exit();
    }


    if (isset($_COOKIE["alldddlogin"])) {
        $return .= "Cookie is set - ";
        $COOKIE = $_COOKIE["alldddlogin"];
        if (preg_match("/^(\{)?[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}(?(1)\})$/i", $COOKIE)) {
            $GUID = $COOKIE;
            $query = "INSERT INTO page_views(user,page, ip) VALUES('$GUID','$pag', '$ip')";
        } else {
            $query = "INSERT INTO page_views(page, ip) VALUES('$pag', '$ip')";
        }
    } else {
        $query = "INSERT INTO page_views(page, ip) VALUES('$pag', '$ip')";
    }
    $return .= mysqli_query($dbc, $query);


    return $return;
}

function curPageURL()
{
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}