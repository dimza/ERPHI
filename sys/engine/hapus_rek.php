<?php 

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

		$sql="UPDATE client SET vis='$hd', modified_user='$pg2', modified_date='$dt2' WHERE id_client='$kode'";
		$result= mysql_query($sql) or die(mysql_error());

		header("location: ../../daftar_rekanan.php?kd=$clt2&&al=$hd");
		
		break; 
		case "2":

		$sql="UPDATE client SET vis='$hd2' WHERE nama_client='$clt2'";
		$result= mysql_query($sql) or die(mysql_error());

		header("location: ../../daftar_rekanan.php?kd=$clt2&&al=$hd2");
		
		break; default: 
		
		header("location: ../../daftar_rekanan.php");
		
		}	
	
?>
