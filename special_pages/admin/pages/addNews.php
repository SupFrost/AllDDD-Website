<html>
<head>
    <title>Add News</title>
</head>
<body>
<?php

$add = $_REQUEST["hiddenField"];
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$headline = $_REQUEST["headline"];
$story = $_REQUEST["story"];

if (isset($add)) {
    $link = mysql_connect('localhost', 'websiteuser', 'Tupperware5722');
    if (!$link) {
        echo('Error connecting to the database: ' . $mysql_error());
        exit();
    }
    $db = mysql_selectdb('allddd');
    if (!$db) {
        echo('Error selecting database: ' . $mysql_error());
        exit();
    }
    $query = "INSERT INTO news(name, email, headline, story, timestamp)VALUES('$name', '$email', '$headline', '$story', NOW())";
    $result = mysql_query($query);
    if (!$result) {
        echo('Error adding news: ' . $mysql_error());
        exit();
    } else {
        mysql_close($link);
        echo('Success!<br><a href="/special_pages/admin/pages/addNews.php">Click here</a> to add more news.');
    }
} else {
    ?>
    <form name="form1" method="POST" action="">
        <table width="50%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="50%">Name</td>
                <td><input name="name" type="text" id="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input name="email" type="text" id="email"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Headline</td>
                <td><input name="headline" type="text" id="headline"></td>
            </tr>
            <tr>
                <td>News Story</td>
                <td><textarea name="story" id="story"></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="center">
                        <input name="hiddenField" type="hidden" value="add_n">
                        <input name="add" type="submit" id="add" value="Submit" formaction="Addnews.php">
                    </div>
                </td>
            </tr>
        </table>
    </form>
<?php } ?>
</body>
</html>