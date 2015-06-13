<?php
/**
 * Created by PhpStorm.
 * User: Nick Jorens
 * Date: 6/06/2015
 * Time: 20:46
 */

function db_connect()
{

    $DB_HOST = "localhost";
    $DB_NAME = "allddd";
    $DB_USER = "websiteuser";
    $DB_PASS = "Tupperware5722";


    static $dbc;

    if (!isset($dbc)) {
        $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        if ($dbc === false) {
            return mysqli_connect_error();
        }
    }

    return $dbc;
}

function db_query($query)
{
    $dbc = db_connect();

    $result = mysqli_query($dbc, $query);

    if ($result === false) {
        return db_error($query);
    } else {
        return $result;
    }
}

function db_error($query)
{
    $dbc = db_connect();

    require $_SERVER['DOCUMENT_ROOT'] . '/php_scripts/PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->Host = "smtp.outlook.office365.com";
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Password = "Tupperware5722";
    $mail->Username = "ALLDDD@allddd.be";
    $mail->setFrom("AllDDD@allddd.be");
    $mail->FromName = 'All DDD Tupperware';
    $mail->addAddress("nickjorens@gmail.com");
    $mail->Body = $query and mysqli_error($dbc);
    $mail->Subject = 'ALL D.D.D. - Error Occured';
    $mail->send();
    return false;
}

function db_select($query)
{
    $rows = array();
    $result = db_query($query);

    // If query failed, return `false`
    if ($result === false) {
        return false;
    }

    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function db_quote($value)
{
    $dbc = db_connect();
    return "'" . mysqli_real_escape_string($dbc, $value) . "'";
}