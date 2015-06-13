<?php

include "page_visit.php";
include $_SERVER['DOCUMENT_ROOT'] . "/premade/dbconnect.php";

$USERNAME = $_POST['username'];
$PASSWORD = $_POST['password'];


if (preg_match("/[0-9]{5}/", $USERNAME) == 1) {


    $query = "SELECT password,GUID, actief FROM users WHERE consulente_code = " . db_quote($USERNAME);
    $result = db_select($query);

    if ($result === FALSE) {
        echo "<h2>Paswoord was niet correct of gebruiker bestaat niet</h2>";
        echo '<p>U wordt teruggestuurd over ongeveer 5 seconden...</p>';
        header("refresh:.1;url=http://allddd.be/special_pages/error_pages/NoConsultenCodeFilledIn.php");
        exit();
    }

    $pass = "";
    $GUID = "";
    foreach ($result as $row) {
        if ($row['actief'] == 0) {
            header("refresh:.1;url=http://allddd.be/special_pages/error_pages/InactifAccount.php");
            exit();
        }

        $pass = $row['password'];
        $GUID = $row['GUID'];
    }
    if (md5($PASSWORD) == $pass) {
        //set cookie
        setcookie("alldddlogin", htmlspecialchars($GUID), time() + 3600, "/");

        $query = "SELECT geboortedatum, passreset FROM users WHERE GUID = " . db_quote($GUID);
        $result = db_select($query);

        if ($result === FALSE) {
            echo "<h2>Er ging iets mis</h2>";
            echo '<p>U wordt teruggestuurd over ongeveer 5 seconden...</p>';
            header("refresh:5;url=http://allddd.be/");
            exit();
        }

        $birthday = "";

        foreach ($result as $row) {
            $birthday = $row['geboortedatum'];
            $passreset = $row['passreset'];
        }

        if ($passreset == 1) {
            header("refresh:.1; url=http://allddd.be/special_pages/error_pages/PassReset.php");
            exit;
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        $query = "INSERT INTO logins (user,ip,user_agent) VALUES(" . db_quote($GUID) . "," . db_quote($ip) . ",'" . $useragent . "')";

        $result = db_query($query);

        $time = date("Y-m-d H:i:s");
        $query = "UPDATE users SET lastlogin = '$time' WHERE GUID = " . db_quote($GUID);

        $result = db_query($query);


        if (date('m-d') == substr($birthday, 5, 5)) {
            header("refresh:.1;url=http://allddd.be/special_pages/birthday/birthday.php");
        } else {
            if (date('z') === '0') {
                //TODO: Create New Year page!
                header("refresh:.1;url=http://allddd.be/special_pages/birthday/birthday.php");
            } else {
                header("refresh:.1;url=http://allddd.be");
            }
        }
        exit();

    } else {
        header("refresh:.1;url=http://allddd.be/special_pages/error_pages/NoConsultenCodeFilledIn.php");
        exit();
    }
} else {
    header("refresh:.1;url=http://allddd.be/special_pages/error_pages/NoConsultenCodeFilledIn.php");
    exit();
}