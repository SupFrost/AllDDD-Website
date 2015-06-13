<?
if (isset($add_n)) {
    $link = @mysql_connect("allddd.be", 'websiteuser', 'Tupperware5722');
    if (!$link) {
        echo('Error connecting to the database: ' . $mysql_error());
        exit();
    }
    $db = @mysql_selectdb('allddd');
    if (!$db) {
        echo('Error selecting database: ' . $mysql_error());
        exit();
    }
} else {
    //Load the form
}
?>






<form name="form1" method="post" action="<?php echo $PHP_SELF; ?>">
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
                    <input name="add" type="submit" id="add" value="Submit">
                </div>
            </td>
        </tr>
    </table>
</form>

