<?php

class Database {

    private $host;
    private $user;
    private $password;
    private $_instance;

    public static function setParameter() {

        $host = '127.0.0.1';
        $user = 'root';
        $password = '';
        $con = mysql_connect($host, $user, $password) or die("ERROR:-1");

        return $con;
    }

}

function edit($id, $title, $fav, $pin, $message) {
    $message = htmlentities(mysql_real_escape_string($message));
    $title = htmlentities(mysql_real_escape_string($title));
    mysql_select_db('text_test');
    $sql = "UPDATE  savenote SET title='$title' , date =sysdate() , fav ='$fav' , pin = '$pin' , message ='$message'  WHERE id ='$id'";
    $result = mysql_query($sql) or die(mysql_error());
    if ($result) {
        echo "<script>  alert (\"Save successfully...\") ; window.close(); " . "" . "</script>";
    }
}

function saveNote($title, $fav, $pin, $message) {
    $message = htmlentities(mysql_real_escape_string($message));
    $title = htmlentities(mysql_real_escape_string($title));
    mysql_select_db('text_test');
    $sql = "INSERT INTO savenote VALUES ('' , '$title' ,sysdate() ,'$fav' ,  '$pin ' ,'$message' ,'0' )  ";
    $result = mysql_query($sql) or die(mysql_error());
    if ($result) {
        echo "<script>  alert (\"Save successfully...\") ; window.close(); " . "" . "</script>";
    }
}

function lastIndex() {

    $con = Database::setParameter();
    mysql_select_db('text_test');
    $sql = "SELECT id FROM `savenote` ORDER BY id DESC LIMIT 1";
    $result = mysql_query($sql);
    $retval = mysql_fetch_array($result) or die(mysql_error());
    $num = mysql_num_rows($result);
    if ($num > 0) {
        $index = $retval['id'];
    }

    return $index;
}

function showLimitTen() {

    $con = Database::setParameter();
    mysql_select_db('text_test');
    $sql = "SELECT id  , title  , date FROM `savenote` WHERE del='0' ORDER BY id  DESC LIMIT 10";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);
    if ($num > 0) {
        $i = 1101;
        while ($row = mysql_fetch_array($result)) {
            $title = base64_encode($row['title']);
            $date = $row['date'];
            echo html_entity_decode(" <li> <p><a href=\"http://127.0.0.1/NoteTaking/show/" . base64_encode($row['id']) . "/$i/$title\" class=\"list-group-item id=\"$i\" title=\" Created @ /*$date\" >" . $row['title'] . "     </a> </p></li>");
            $i++;
        }
    }
}

function showAll() {

    $con = Database::setParameter();
    mysql_select_db('text_test');
    $sql = "SELECT id  , title FROM `savenote` WHERE del='0' ORDER BY id DESC ";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);
    if ($num > 0) {
        $i = 1101;
        while ($row = mysql_fetch_array($result)) {
            $title = base64_encode($row['title']);
//            echo html_entity_decode(" <li> <p id =\"link\"><a  href=\"show.inc.php?id=" . base64_encode($row['id']) . "&link=$i&title=$title\"     class=\"list-group-item\" id=\"$i\">" . $row['title'] . "   </a>  </p></li> ");
            echo html_entity_decode(" <li> <p><a href=\"http://127.0.0.1/NoteTaking/show/" . base64_encode($row['id']) . "/$i/$title\" class=\"list-group-item id=\"$i\">" . $row['title'] . "     </a> </p></li>");
            $i++;
        }
    }
}

function getMessage($id, $default = 1) {

    $con = Database::setParameter();
    mysql_select_db('text_test');
    $id = htmlentities(mysql_real_escape_string($id));



    if ($default == 1) {
        $sql = "SELECT  message  , title FROM `savenote` ORDER BY id  DESC LIMIT 10";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
        if ($num > 0) {

            while ($row = mysql_fetch_array($result)) {

                $message = $row['message'];
            }
            return $message;
        }
    } else {


        $sql = "SELECT message , title FROM `savenote` WHERE id='$id' ORDER BY id DESC ";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
        if ($num > 0) {
            $i = 1101;
            while ($row = mysql_fetch_array($result)) {
                $message = $row['message'];
            }
            return $message;
        }
    }
}

function showParticular($id) {

    $con = Database::setParameter();
    mysql_select_db('text_test');
    $sql = "SELECT * FROM `savenote` WHERE id='$id' ";
    $result = mysql_query($sql);
    $num = mysql_num_rows($result);

    $detail = array();
    if ($num > 0) {
        $i = 1101;
        while ($row = mysql_fetch_array($result)) {

            $detail['id'] = $row['id'];
            $detail['title'] = $row['title'];
            $detail['date'] = $row['date'];
            $detail['fav'] = $row['fav'];
            $detail['pin'] = $row['pin'];
            $detail['message'] = $row['message'];
        }
    }

    return $detail;
}

function del($id) {
    $con = Database::setParameter();
    mysql_select_db('text_test');
    $sql = "UPDATE  savenote SET del='1' WHERE id ='$id'";
    $result = mysql_query($sql) or die(mysql_error());
    if ($result) {
        header('Location:delete.php');
    }
}
