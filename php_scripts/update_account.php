<?php

session_start();

/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 29/11/2014
 * Time: 13:22
 */

include $_SERVER['DOCUMENT_ROOT'] . "/premade/dbconnect.php";
$CODE = $_POST["consulentecode"];

$email = $_REQUEST['email'];
$geboortedatum = $_REQUEST['geboortedatum'];
$postcode = $_REQUEST['postcode'];


if ($_REQUEST['pas'] == 1) {

    $pass = $_POST['paswoord'];
    $pass2 = $_POST['paswoord2'];

    if ($pass != $pass2) {
        echo "<h2>De paswoorden kwamen niet overeen!</h2>";
        echo "<p>U wordt teruggestuurd over ongeveer 3 seconden...</p>";

        header("refresh:3;url=http://allddd.be/updateaccountinfo.php?consulentecode=$CODE");
        exit();
    }

    $passhash = md5($pass);

    $query = "UPDATE users SET password = '$passhash', registreerd = 1, email = " . db_quote($email) . ", postnummer = " . db_quote($postcode) . ", geboortedatum = " . db_quote($geboortedatum) . ", passreset = '' WHERE consulente_code = '$CODE'";
   echo $query;
    $result = db_query($query);

} else {

    $query = "UPDATE users SET registreerd = 1, email =" . db_quote($email) . ", postnummer = " . db_quote($postcode) . ", geboortedatum = " . db_quote($geboortedatum) . ", passreset = '' WHERE consulente_code = '$CODE'";
    $result = db_query($query);
}

if ($result == 1) {
    header("refresh:5;url=http://allddd.be/updateaccountinfo.php?success=true");
    exit();
} else {
    header("refresh:5;url=http://allddd.be/special_pages/error_pages/DatabaseError.php");
    exit();
}




