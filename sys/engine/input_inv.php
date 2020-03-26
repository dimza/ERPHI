<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php'); 
	
	define("UPLOAD_DIR", "../../photo/inventory/");
	
		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

	if ($nama_file["error"] !== UPLOAD_ERR_OK) {	

		$kr2=$_POST['kr'];
		$ref=$_POST['trek'];
		$pot=$_POST['pot'];
		$idbl2=$_POST['idbl'];
		$jmlh=$_POST['jml'];
		$unt=$_POST['unt'];		
		$tgal=$_POST['tanggal'];
		$remk=$_POST['rmk'];		
		$usr=$_POST['usr'];
		$date=$_POST['tgl'];
		
		//default null
		$no='';
		
		//status inv
		$stat2='50';

		//status inv
		$stat3='60';				
		
		//mengisi nilai kosong
		$null='0';

		$null2='n/a';

      	$sql3= mysql_query("select * from `buying_list` where id_buying_list='$idbl2'") or die(mysql_error());
      	$ibl= mysql_result($sql3, 0, 'description');
      	$ibl2= mysql_result($sql3, 0, 'goods_no');


		// store data inventory					
		$sql= "insert INTO `inventory` (id_inv, noreg_inv, reference_no, company_no, client_no,	supplier_no, po_out, goods_no, nama_barang,	jumlah,	unit, date, remark, status,	foto, swh, vis,	create_user, create_date, modified_user, modified_date) 	
						VALUES 	  	 ('$no', '$kr2', '$ref', '$null2', '$null2', '$null2', '$pot', 	'$ibl2', '$ibl', '$jmlh', '$unt', '$tgal', '$remk', '$stat2', '$null2', '100', '$null', '$usr', '$date', '$usr', '$date')";	
		$result= mysql_query($sql) or die(mysql_error());

		// store data stock
		//$sql= "insert INTO `stock` (id_stock, goods_no, qty,	unit,  remark, status, vis, swh,	create_user, create_date, modified_user, modified_date) 	
		//				VALUES 	  	 ('$no', '$ibl2', '$jmlh', '$unt', '$null2', '$stat3', '$null', '$null', '$usr', '$date', '$usr', '$date')";	
		//$result= mysql_query($sql) or die(mysql_error());

 		// update status quote
		$sql3= "update `buying_list` SET status='21' WHERE id_buying_list='$idbl2'";	
		$result3= mysql_query($sql3) or die(mysql_error());
 
		//
		header("Location: ../../inventory.php");
		
}


			// ensure a safe filename
			$nama_baru=preg_replace("/[^A-Z0-9._-]/i", "_", $nama_file["name"]);

			// dont overwirte an existising file
			$i= 0;
			$parts= pathinfo($nama_baru);
			while (file_exists(UPLOAD_DIR . $nama_baru))	{
				$i++;
				$nama_baru = $parts["filename"] . "-" . $i . "." . $parts["extension"];
				
				}

			// preserve file from temporary directory
			$success= move_uploaded_file($nama_file["tmp_name"], UPLOAD_DIR . $nama_baru);

			if (!$success) {
				echo "<p>Unable to save file.</p>";
				exit;
				}

			// set proper permission on the new file
			chmod(UPLOAD_DIR . $nama_baru, 0644);
		}

		$kr2=$_POST['kr'];
		$ref=$_POST['trek'];
		$pot=$_POST['pot'];
		$idbl2=$_POST['idbl'];
		$jmlh=$_POST['jml'];
		$unt=$_POST['unt'];		
		$tgal=$_POST['tanggal'];
		$remk=$_POST['rmk'];		
		$usr=$_POST['usr'];
		$date=$_POST['tgl'];
		
		//default null
		$no='';
		
		//status inv
		$stat2='50';
		
		//mengisi nilai kosong
		$null='0';

		$null2='n/a';		
		
		//	  	
      	$sql3= mysql_query("select * from `buying_list` where id_buying_list='$idbl2'") or die(mysql_error());
      	$ibl= mysql_result($sql3, 0, 'description');
      	$ibl2= mysql_result($sql3, 0, 'goods_no');     	


		// store data pembelian					
		$sql= "insert INTO `inventory` (id_inv, noreg_inv, reference_no, company_no, client_no,	supplier_no, po_out, goods_no, nama_barang,	jumlah,	unit, date, remark, status,	foto, swh, vis,	create_user, create_date, modified_user, modified_date) 	
						VALUES 	  	 ('$no', '$kr2', '$ref', '$null2', '$null2', '$null2', '$pot', 	'$ibl2', '$ibl', '$jmlh', '$unt', '$tgal', '$remk', '$stat2', '$nama_baru', '100', '$null', '$usr', '$date', '$usr', '$date')";	
		$result= mysql_query($sql) or die(mysql_error());				

 		// update status buyin_list
		$sql3= "update `buying_list` SET status='21' WHERE id_buying_list='$idbl2'";	
		$result3= mysql_query($sql3) or die(mysql_error());
 
		//
		header("Location: ../../inventory.php");			

mysql_close();

ob_end_flush(); ?>
	