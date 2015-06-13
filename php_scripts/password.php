<?php


function getGUID()
{
    if (function_exists('com_create_guid')) {
        return com_create_guid();
    } else {
        mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        return $uuid;
    }
}

// CONNECT TO THE DATABASE

$DB_HOST = "localhost";
$DB_NAME = "allddd";
$DB_USER = "websiteuser";
$DB_PASS = "Tupperware5722";
$Consulente = $_POST['username'];

$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);


if (preg_match("/[0-9]{4}/", $Consulente) != 1) {
    header("refresh:.1;url=http://allddd.be/special_pages/error_pages/NoConsultenCodeFilledIn.php");
    exit();
}

$query = "SELECT * FROM users WHERE consulente_code = '$Consulente'";
$result = mysqli_query($dbc, $query);

while ($row = mysqli_fetch_array($result)) {
    $GUID = $row['GUID'];
    $passreset = $row['passreset'];
}

if ($passreset != '') {
    header("refresh:.1; url=http://allddd.be/special_pages/error_pages/PassReset.php");
    exit();
}
$passreset = strtolower(substr(getGUID(), 1, -1));


$query = "UPDATE users SET passreset = '$passreset' WHERE GUID = '$GUID'";
$result = mysqli_query($dbc, $query);


if ($result === FALSE) {
    header("refresh:.1;url=http://allddd.be/special_pages/error_pages/NoConsultenCodeFilledIn.php");
    exit();
} else {
    $query = "SELECT email FROM users WHERE GUID = '$GUID'";
    $result = mysqli_query($dbc, $query);

    $email = "";
    while ($row = mysqli_fetch_array($result))
        $email = $row['email'];

    require './PHPMailer/PHPMailerAutoload.php';

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
    $mail->addAddress($email);
    $mail->Body = "Beste, \n \nUw paswoord is gerest op onze website!\nIndien u dit niet zelf heeft gedaan, gelieve Nick Jorens te contacteren!\nAnders kan u volgende URL volgen om uw nieuw paswoord in te stellen!\n\nhttp://allddd.be/updateaccountinfo.php?passreset=" . $passreset;
    $mail->Subject = 'ALL D.D.D. - Paswoord reset!';

    $mail->send();


    header("refresh:.1;url=http://allddd.be/special_pages/error_pages/PassReset.php");
    exit();
}
