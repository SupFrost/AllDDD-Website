<?php
/**
 * Created by PhpStorm.
 * User: Nick Jorens
 * Date: 4/12/14
 * Time: 22:48
 */


// CONNECT TO THE DATABASE
$DB_HOST = "localhost";
$DB_NAME = "allddd";
$DB_USER = "websiteuser";
$DB_PASS = "Tupperware5722";

$consulent = $_POST['consulentecode'];
$soort = $_POST['TypeIdee'];
$omschrijving = $_POST['IdeeText'];

$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)
or die('Error connecting to MySQL server 5000');

$query = "SELECT GUID FROM users WHERE consulente_code = '$consulent'";
$result = mysqli_query($dbc, $query);

if ($result === FALSE) {
    echo "<h2>Er is iets fout gelopen 1!</h2>";
    echo '<p>U wordt teruggestuurd over ongeveer 5 seconden...</p>';
    header("refresh:5;url=http://allddd.be/Ideebus.php");
    exit();
}

while ($row = mysqli_fetch_array($result))
    $guid = $row['GUID'];


$query = "INSERT INTO ideebus(user,soort,omschrijving) VALUES('$guid','$soort','$omschrijving')";
$result = mysqli_query($dbc, $query);


if ($result === FALSE) {

    echo "<h2>Er is iets fout gelopen 2!</h2>";
    echo $guid;
    echo $consulent;
    echo $soort;
    echo $omschrijving;


    echo '<p>U wordt teruggestuurd over ongeveer 5 seconden...</p>';
    header("refresh:5;url=http://allddd.be/Ideebus.php");
    exit();
} else {
    header("Location:http://allddd.be/Ideebus.php?succes=true");
    exit();
}