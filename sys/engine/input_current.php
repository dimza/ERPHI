<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../photo/barang/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {	 

					$an2=$_POST['an'];
					$desc2=$_POST['desc'];
					$com2=$_POST['com'];
					$tpe2=$_POST['tpe'];
					$val2=$_POST['val'];
					$mu=$_POST['matauang'];
					$rmk2=$_POST['rmk'];
					$tgl=$_POST['tanggal'];					
					$usr2=$_POST['user'];
					$dat=$_POST['tgl'];

					$null='';
					$null2='0';											
		
					$sql= "insert INTO ca ( id_ca, assets_name, type, value, currency_no, company_no, date, remark, picture, vis, create_user, create_date, modified_user, modified_date) 
	
							VALUES ( '$null', '$desc2', '$tpe2', '$val2', '$mu', '$com2', '$tgl', '$rmk2', '$null2', '$null2', '$usr2', '$dat', '$usr2', '$dat')";
	
					$result = mysql_query($sql) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../current.php");

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

					$an2=$_POST['an'];
					$desc2=$_POST['desc'];
					$com2=$_POST['com'];
					$tpe2=$_POST['tpe'];
					$val2=$_POST['val'];
					$mu=$_POST['matauang'];
					$rmk2=$_POST['rmk'];
					$tgl=$_POST['tanggal'];					
					$usr2=$_POST['user'];
					$dat=$_POST['tgl'];

					$null='';
					$null2='0';											
		
					$sql= "insert INTO ca ( id_ca, assets_name, type, value, currency_no, company_no, date, remark, picture, vis, create_user, create_date, modified_user, modified_date) 
	
							VALUES ( '$null', '$desc2', '$tpe2', '$val2', '$mu', '$com2', '$tgl', '$rmk2', '$nama_baru', '$null2', '$usr2', '$dat', '$usr2', '$dat')";
	
					$result = mysql_query($sql) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../current.php");
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../oe.php");

mysql_close();

ob_end_flush(); ?>
	