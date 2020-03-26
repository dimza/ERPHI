<?php

	$q = intval($_GET['q']);

	require_once(__DIR__.'/../db_con/db.php');	

	if ($q == "1") {

		echo "<button type=button class='btn btn-link disabled'><b>@sindhutama.co.id</b></button>";

	} else if ($q == "2") {

		echo "<button type=button class='btn btn-link disabled'><b>@athaya-bpp.com</b></button>";

	} else if ($q == "3") {

		echo "<button type=button class='btn btn-link disabled'><b>@dwiarthakencana.com</b></button>";

	} else if ($q == "4") {

		echo "<button type=button class='btn btn-link disabled'><b>@pegasuspratama.com</b></button>";

	}	

mysql_close();
?> 