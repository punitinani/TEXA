<?php

require_once 'core.inc.php';

if (isset($_GET['id'])) {
    $id = htmlentities(mysql_real_escape_string($_GET['id']));
    del($id);
}
?>