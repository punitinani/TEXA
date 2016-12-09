<?php

$file = str_replace(".php", "", basename($_SERVER["PHP_SELF"]));
echo ucfirst($file);
?>