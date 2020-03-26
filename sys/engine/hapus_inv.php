<?php 

ob_start();

	require_once(__DIR__.'/../db_con/db.php');

		//id_client
		$kode = @$_GET['kd'];
		//tgl mod
		$dt2 = @$_GET['dt'];
		//nama mod
		$pg2 = @$_GET['pg'];
		//nama client
		$clt2 = @$_GET['clt'];
		//var swcht
		$swch2 = @$_GET['swch'];
				
		$hd = 1;
		$hd2 = 0;
		
		switch ($swch2) {

		case "1":	

		$sql="UPDATE inventory SET vis='$hd', modified_user='$pg2', modified_date='$dt2' WHERE id_inv='$kode'";
		$result= mysql_query($sql) or die(mysql_error());

		header("location: ../../inventory.php?kd=$clt2&&al=$hd");
		
		break; 
		case "2":

		$sql="UPDATE inventory SET vis='$hd2' WHERE noreg_inv='$clt2'";
		$result= mysql_query($sql) or die(mysql_error());

		header("location: ../../inventory.php?kd=$clt2&&al=$hd2");
		
		break; default: 
		
		header("location: ../../inventory.php");
		
		}	

ob_end_flush();
		
?>
