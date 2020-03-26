<?php

$mysql_hostname = "localhost:8889";
$mysql_user = "root";
$mysql_password = "root";
$mysql_database = "abm";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 

or die("Opps some thing went wrong - cannot connect yo your database");

mysql_select_db($mysql_database, $bd) or die("DB cannot found");

?>