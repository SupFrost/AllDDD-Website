<?php
session_start();
$searchString = $_REQUEST['search'];
$DB_HOST = "localhost";
$DB_NAME = "allddd";
$DB_USER = "websiteuser";
$DB_PASS = "Tupperware5722";
$DB_NAME = "allddd";
$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$query = "SELECT consulente_code FROM users WHERE consulente_code LIKE '%$searchString%' OR naam LIKE '%$searchString%' OR voornaam LIKE '%$searchString%' or email LIKE '%$searchString%'";
$result = mysqli_query($dbc, $query);

$codes = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($codes, $row['consulente_code']);
}

$_SESSION['codes'] = $codes;

header("Location: http://allddd.be/special_pages/admin/pages/users_overview.php");

