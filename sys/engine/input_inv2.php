<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php'); 
	
	define("UPLOAD_DIR", "../../photo/inventory/");
	
		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

	if ($nama_file["error"] !== UPLOAD_ERR_OK) {	

		$kr2=$_POST['kr'];
		$ref2=$_POST['ref'];
		$clnt2=$_POST['clnt'];
		$comp2=$_POST['comp'];
		$sup2=$_POST['sup'];
		$brg2=$_POST['brg'];
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

      	$sql3= mysql_query("select * from `goods` where id_goods='$brg2'") or die(mysql_error());
      	$ibl= mysql_result($sql3, 0, 'description_goods');

      	$sql4= mysql_query("select * from `stock` where goods_no='$brg2'") or die(mysql_error());
      	$qj= mysql_result($sql4, 0, 'qty');

      	$jml_qty= $qj + $jmlh ;

		// store data pembelian					
		$sql= "insert INTO `inventory` 
				(id_inv, noreg_inv, reference_no, company_no, client_no, supplier_no, po_out, goods_no, nama_barang,	jumlah,	unit, date, remark, status,	foto, swh, vis,	create_user, create_date, modified_user, modified_date) 	
							VALUES 	  	 
				('$no', '$kr2', '$ref2', '$comp2', '$clnt2', '$sup2', '$null2', '$brg2', '$ibl', '$jmlh', '$unt', '$tgal', '$remk', '$stat2', '$null2', '200', '$null', '$usr', '$date', '$usr', '$date')";	
		$result= mysql_query($sql) or die(mysql_error());

 		// update status quote
		$sql5="UPDATE `stock` SET qty='$jml_qty', unit='$unt' WHERE goods_no='$brg2'";	
		$result5= mysql_query($sql5) or die(mysql_error());
 
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
		$ref2=$_POST['ref'];
		$clnt2=$_POST['clnt'];
		$comp2=$_POST['comp'];
		$sup2=$_POST['sup'];
		$brg2=$_POST['brg'];
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

      	$sql3= mysql_query("select * from `goods` where id_goods='$brg2'") or die(mysql_error());
      	$ibl= mysql_result($sql3, 0, 'description_goods');

      	$sql4= mysql_query("select * from `stock` where goods_no='$brg2'") or die(mysql_error());
      	$qj= mysql_result($sql4, 0, 'qty');

      	$jml_qty= $qj + $jmlh ;      	    	    	

		// store data pembelian					
		$sql= "insert INTO `inventory` (id_inv, noreg_inv, reference_no, company_no, client_no,	supplier_no, po_out, goods_no, nama_barang,	jumlah,	unit, date, remark, status,	foto, swh, vis,	create_user, create_date, modified_user, modified_date) 	
						VALUES 	  	 ('$no', '$kr2', '$ref2', '$comp2', '$clnt2', '$sup2', '$null2', '$brg2', '$ibl', '$jmlh', '$unt', '$tgal', '$remk', '$stat2', '$nama_baru', '200', '$null', '$usr', '$date', '$usr', '$date')";

		$result= mysql_query($sql) or die(mysql_error());	

 		// update status quote
		$sql5="UPDATE `stock` SET qty='$jml_qty', unit='$unt' WHERE goods_no='$brg2'";	
		$result5= mysql_query($sql5) or die(mysql_error());  
 
		//
		header("Location: ../../inventory.php");			

mysql_close();

ob_end_flush(); ?>
	