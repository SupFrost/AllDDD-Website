<?php
/**
 * Created by PhpStorm.
 * User: Nick Jorens
 * Date: 2/06/2015
 * Time: 16:31
 */

include $_SERVER['DOCUMENT_ROOT'] . "/premade/dbconnect.php";

$code = $_REQUEST['code'];
$action = $_REQUEST['action'];


$query = "";
$userGUID = "";


$result = db_select("SELECT GUID FROM users WHERE consulente_code = " . db_quote($code));
foreach ($result as $row) {
    $userGUID = $row['GUID'];
}

switch ($action) {

    case "change":

        header("Location: http://allddd.be/updateaccountinfo.php?guid=$userGUID&admin=1");
        break;

    case "inactief":
        $query = "UPDATE users SET actief = 0 WHERE GUID = " . db_quote($userGUID);
        $result = db_query($query);
        if ($result !== false) {
            echo 'SUCCESS!';
            header("Location: http://allddd.be/special_pages/admin/pages/users_overview.php");
            exit();
        } else {
            header("Location: http://allddd.be/special_pages/error_pages/DatabaseError.php");
            exit();
        }


        break;

    case "actief":
        $query = "UPDATE users SET actief = 1 WHERE GUID = " . db_quote($userGUID);
        $result = db_query($query);
        if ($result !== false) {
            echo 'SUCCESS!';
            header("Location: http://allddd.be/special_pages/admin/pages/users_overview.php");
            exit();
        } else {
            header("Location: http://allddd.be/special_pages/error_pages/DatabaseError.php");
            exit();
        }


        break;
}
