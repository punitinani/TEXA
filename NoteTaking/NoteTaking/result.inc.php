<?php

$id = trim(htmlentities(mysql_real_escape_string($_GET['id'])));

if (!empty($id)) {
    require_once 'core.inc.php';
    $con = Database::setParameter();
    mysql_select_db('text_test');
    $sql = "SELECT id , message , title FROM `savenote`  WHERE  title LIKE '%$id%'  AND del='0'  ORDER BY id DESC ";
    $result = mysql_query($sql) or die(mysql_error());
    $num = mysql_num_rows($result);
    echo "<center>";
    while ($row = mysql_fetch_array($result)) {
        $id = $row ['id'];

        $title = $row['title'];

        $message = $row['message'];

        echo "<div style=\" background:#f5f5f5; \" > ";
        echo "<br>Title :- " . $title . "<br> ";
        echo "Message :- " . $message . "<br><hr>";
        echo "</div>";
    }

    echo "</center>";   
}
?>
