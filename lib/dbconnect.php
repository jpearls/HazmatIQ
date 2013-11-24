<?php

$db_name = 'hazmatiq';
$connection = mysql_connect('localhost', 'root', 'b9ehBENWzFqBhBUs') or die('Could not connect to the database.');
$db  = mysql_select_db($db_name, $connection) or die('Could not select the database.');

?>