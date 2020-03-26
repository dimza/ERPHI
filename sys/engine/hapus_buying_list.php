<?php 

ob_start();

	require_once(__DIR__.'/../db_con/db.php');

		$id = @$_GET['kd'];
		$kode = @$_GET['qs'];		

	mysql_query("DELETE from buying_list where id_buying_list='$id'");

		header("location: ../../input_item_pembelian.php?po=$kode");

ob_end_flush();
		
?>