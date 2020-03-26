<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../photo/doc/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {	 

					$rn=$_POST['rn'];
					$tt=$_POST['tt'];		
					$com=$_POST['com'];
					$sl=$_POST['sl'];
					$cln=$_POST['cln'];
					$cur=$_POST['cur'];
					$od=$_POST['od'];
					$cd=$_POST['cd'];
					$rmk=$_POST['rmk'];
					$dt=$_POST['dt'];
					$usr=$_POST['usr'];

					$null='0';										
		
					$sqlTender= "insert INTO tender ( companyId, clientId, currencyId, referenceNo, tittleTender, createDate, closeDate, salesCall, remark, modDate, modUser, vis) 
	
							VALUES ( '$com', '$cln', '$cur', '$rn', '$tt', '$od', '$cd', '$sl', '$rmk', '$dt', '$usr', '$null')";
	
					$result = mysql_query($sqlTender) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../tenderList.php");

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

					$rn=$_POST['rn'];
					$tt=$_POST['tt'];		
					$com=$_POST['com'];
					$sl=$_POST['sl'];
					$cln=$_POST['cln'];
					$cur=$_POST['cur'];
					$od=$_POST['od'];
					$cd=$_POST['cd'];
					$rmk=$_POST['rmk'];
					$dt=$_POST['dt'];
					$usr=$_POST['usr'];

					$null='0';										
		
					$sqlTender= "insert INTO tender ( companyId, clientId, currencyId, referenceNo, tittleTender, createDate, closeDate, salesCall, remark, modDate, modUser, vis, doc) 
	
							VALUES ( '$com', '$cln', '$cur', '$rn', '$tt', '$od', '$cd', '$sl', '$rmk', '$dt', '$usr', '$null', '$nama_baru')";
	
					$result = mysql_query($sqlTender) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../tenderList.php");

mysql_close();

ob_end_flush(); ?>
	