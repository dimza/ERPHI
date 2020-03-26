<?PHP
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../photo/barang/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {

					$gb2=$_POST['gb'];
					$sp12=$_POST['sp1'];
					$sp22=$_POST['sp2'];
					$pn2=$_POST['pn'];
					$desc2=$_POST['desc'];
					$merk2=$_POST['merk'];
					$man2=$_POST['man'];
					$prc2=$_POST['prc'];
					$mu2=$_POST['mu'];
					$sta2=$_POST['stat'];
					$rem2=$_POST['rem'];
					$usr2=$_POST['usr'];
					$dat2=$_POST['dat'];
		
					$kode= @$_GET['kd'];
								
					$sql="UPDATE goods SET kode_principal='$sp12', kode_principal2='$sp22', type_goods='$gb2', description_goods='$desc2', brand_goods='$merk2', part_number='$pn2', manufactured='$man2', price_list='$prc2', currency_goods='$mu2', remark_goods='$rem2', status_goods='$sta2',  modified_user='$usr2', modified_date='$dat2' WHERE id_goods='$kode'";
	
					$result= mysql_query($sql) or die(mysql_error());
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../listGoods.php?kd=$kode");

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

		$gb2=$_POST['gb'];
		$sp12=$_POST['sp1'];
		$sp22=$_POST['sp2'];
		$sn2=$_POST['sn'];
		$pn2=$_POST['pn'];
		$desc2=$_POST['desc'];
		$merk2=$_POST['merk'];
		$man2=$_POST['man'];
		$prc2=$_POST['prc'];
		$mu2=$_POST['mu'];
		$sta2=$_POST['stat'];
		$rem2=$_POST['rem'];
		$usr2=$_POST['usr'];
		$dat2=$_POST['dat'];
		
		$kode= @$_GET['kd'];
								
		$sql="UPDATE goods SET kode_principal='$sp12', kode_principal2='$sp22', type_goods='$gb2', description_goods='$desc2', brand_goods='$merk2', part_number='$pn2', manufactured='$man2', price_list='$prc2', currency_goods='$mu2', remark_goods='$rem2', status_goods='$sta2', foto='$nama_baru', modified_user='$usr2', modified_date='$dat2' WHERE id_goods='$kode'";
	
		$result= mysql_query($sql) or die(mysql_error());
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../listGoods.php?kd=$kode");	

mysql_close(); ?>
	