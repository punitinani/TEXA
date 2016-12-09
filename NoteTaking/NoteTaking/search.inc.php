<?php

if (!empty($_GET['id'])) {
    $id = trim(htmlentities(mysql_real_escape_string($_GET['id'])));
    require_once 'core.inc.php';
    $con = Database::setParameter();
    mysql_select_db('text_test');
    $sql = "SELECT id , message , title FROM `savenote`  WHERE  title LIKE '%$id%'   AND del='0'  ORDER BY '$id' DESC ";
    $result = mysql_query($sql) or die(mysql_error());
    $num = mysql_num_rows($result);
    while ($row = mysql_fetch_array($result)) {
        $id = $row ['id'];

        $title = $row['title'];
        echo "<option value=\"$title\" >  $title </option>";
        //echo " <a  href =" . "del.inc.php?id=" . $id . ">" . $title . " </a><br>";
        // echo "<br>";
    }
}
?>

