<?php 

ob_start();

	require_once(__DIR__.'/../db_con/db.php');

		$id = @$_GET['kd'];
		$no = @$_GET['no'];		

		mysql_query("DELETE from tenderItems where tenderItemsId='$id'");

		header("location: ../../tenderView.php?kd=$no");

ob_end_flush();
		
?>