<?php 

ob_start();

	require_once(__DIR__.'/../db_con/db.php');

		$id = @$_GET['kd'];
		$kode = @$_GET['qs'];		

	mysql_query("DELETE from quote_list where id_quote_list='$id'");

		header("location: ../../viewQuote.php?qo=$kode");

ob_end_flush();
		
?>