<?PHP
	
	require_once(__DIR__.'/../db_con/db.php'); 

		
		$stat=$_POST['sts'];
		$cln=$_POST['client'];
		$mu=$_POST['matauang'];
		$tax=$_POST['pajak'];
		$tgl=$_POST['tanggal'];
		$hr=$_POST['hari'];
		$usr=$_POST['user'];
		$date=$_POST['tgl'];
		$rmk=$_POST['remark'];
		$kde=$_POST['idt'];
		$qoz2=$_POST['qoz'];
        $sales2=$_POST['sales'];
								
		$sql="UPDATE quote SET client_no='$cln', currency_no='$mu', reference_no='$ref', date='$date', expired_days='$hr', tax='$tax', status='$stat', remark='$rmk', modified_user='$usr', modified_date='$date' WHERE id_quote='$kde'";
	
		$result = mysql_query($sql) or die(mysql_error());

		$sql2="UPDATE tlquote SET client_no='$cln'  WHERE id_tlquote='$kde'";
	
		$result2 = mysql_query($sql2) or die(mysql_error());

	header("Location: ../../listQuote.php");	

mysql_close(); ?>
	