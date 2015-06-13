<!DOCTYPE html>
<html lang="en">
<head>
    <title>All DDD - Upload</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
</head>
<body id="page1" style="min-height:100%; position:relative;">
<!--header -->
<div class="lists">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php"; ?>
    </header>

    <section class="content">

        <?php

        $target_dir = "fileuploads/" . $_REQUEST["soort"] . "/";
        $target_file = $target_dir . date("ymd-His") . "-" . $_REQUEST["consulentecode"] . ".pdf";
        $uploadOk = 1;

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<h1>Sorry, your file was not uploaded.</h1>";

        } else {
            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {


                $filebasename = basename($_FILES["fileupload"]["name"]);
                $opmerking = $_REQUEST['comment'];


                $query = "INSERT INTO documenten(path,original_document_title,opmerking,user) VALUES('$target_file','$filebasename','$opmerking','$GUID')";
                $result = db_query($query);

                if ($result !== false) {
                    echo "<h1>IUw bestand met de naam: " . basename($_FILES["fileupload"]["name"]) . " is met succes ingestuurd!</h1>";
                } else {
                    echo db_error($query);
                }

            } else {
                echo "Error 1: Error moving files!";
            }
        }
        ?>


    </section>
</div>
</body>
</html>