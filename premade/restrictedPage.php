<?php
/**
 * Created by PhpStorm.
 * User: Nick Jorens
 * Date: 6/06/2015
 * Time: 22:38
 */
/**
 * Different types of levels
 * In ascending order
 *
 * 7 = everyone
 * 6 = Consulente
 * 5 = Managers - consulent-leaders - Elite managers
 * 2 = concessiehouders
 * 1 = Admin
 *
 */


function accessGranted($levelRequired)
{
    if (isset($_COOKIE['alldddlogin'])) {

        $GUID = $_COOKIE['alldddlogin'];

        if (preg_match('/^(\{)?[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}(?(1)\})$/i', $GUID)) {

            $query = "SELECT user_function FROM users WHERE GUID = " . db_quote($GUID);
            $result = db_select($query);


            if ($result === false) {
                return false;

            } else {
                $levelUser = "";
                foreach ($result as $row)
                    $levelUser = $row['user_function'];


                if ($levelUser <= $levelRequired) {
                    return true;
                } else {
                    header("Location: http://allddd.be/special_pages/error_pages/AccessRestricted.php");
                    exit();
                }
            }
        } else {
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
            $mail->Body = $GUID;
            $mail->Subject = 'ALL D.D.D. - Error Occured';
            $mail->send();
            return false;
        }

    } else {
        return false;
    }
    return false;
}

