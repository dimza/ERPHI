<?PHP 	

	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php');

					$sup=$_POST['sup'];
					$nt=$_POST['nt'];
					$idg=$_POST['idg'];
					$pl=$_POST['pl'];
					$qty=$_POST['qty'];
					$unt=$_POST['unt'];
					$rmk=$_POST['rmk'];
					$usr=$_POST['usr'];
					$tgl=$_POST['tgl'];

		define("UPLOAD_DIR", "../../photo/doc/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {	 

	  						$goods= mysql_query("select * from goods where id_goods='$idg'");
	  						$dtaGoods= mysql_fetch_array($goods);
	  
	  						$desc = $dtaGoods['description_goods'];
	  						$pnum = $dtaGoods['part_number'];
	  						$igds = $dtaGoods['id_goods'];

                          //$goods= mysql_query("select * from `goods` where id_goods='$idg'") or die(mysql_error());
                          //$desc= mysql_result($goods, 0, 'description_goods');
                          //$pnum= mysql_result($goods, 0, 'part_number');											
		
					$sql= "INSERT INTO `tenderItems` (`tenderITemsId`, `tenderNo`, `idSupplier`, `description`, `partNumber`, `priceList`, `qtyItems`, `unitItems`, `remark`, `createDate`, `modUser`) 
	
					VALUES (NULL, '$nt', '$sup', '$desc', '$pnum', '$pl', '$qty', '$unt', '$rmk', '$tgl', '$usr')";
	
					$result= mysql_query($sql) or die(mysql_error());					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../tenderView.php?kd=$nt");

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

	  						$goods= mysql_query("select * from goods where id_goods='$idg'");
	  						$dtaGoods= mysql_fetch_array($goods);
	  
	  						$desc = $dtaGoods['description_goods'];
	  						$pnum = $dtaGoods['part_number'];
	  						$igds = $dtaGoods['id_goods'];

                          //$goods= mysql_query("select * from `goods` where id_goods='$idg'") or die(mysql_error());
                          //$desc= mysql_result($goods, 0, 'description_goods');
                          //$pnum= mysql_result($goods, 0, 'part_number');											
		
					$sql= "INSERT INTO `tenderItems` (`tenderITemsId`, `tenderNo`,  `idSupplier`, `description`, `partNumber`, `priceList`, `qtyItems`, `unitItems`, `remark`, `createDate`, `modUser`, `doc`) 
	
					VALUES (NULL, '$nt',  '$sup',  '$desc', '$pnum', '$pl', '$qty', '$unt', '$rmk', '$tgl', '$usr', '$nama_baru')";
	
					$result = mysql_query($sql) or die(mysql_error());					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../tenderView.php?kd=$nt");

mysql_close($bd);

ob_end_flush(); ?>
	