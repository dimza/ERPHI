<?PHP
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../file_upload/bills_expenses/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {

					
					$desc2=$_POST['desc'];
					$emp2=$_POST['emp'];
					$cc=$_POST['cc'];
					$val2=$_POST['val'];
					$mu=$_POST['matauang'];
					$pay=$_POST['payment'];
					$bank=$_POST['bank'];
					$type=$_POST['type'];
					$tgl=$_POST['tanggal'];
					$rmk2=$_POST['rmk'];
					$usr2=$_POST['user'];
					$dat=$_POST['tgl'];
					$rn2=$_POST['rn'];

					$fot2=$_POST['foto'];
								
					$sql="UPDATE billExpenses SET cost_code='$cc', description='$desc2', name_user='$emp2', value='$val2', rate='$mu', payment='$pay', 
					source_funds='$bank', type='$type', remark='$rmk2', date_input='$tgl', picture='$fot2', modified_user='$usr2', modified_date='$dat' WHERE id_oe='$rn2'";
	
					$result= mysql_query($sql) or die(mysql_error());
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../oe.php");

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

					$desc2=$_POST['desc'];
					$emp2=$_POST['emp'];
					$cc=$_POST['cc'];
					$val2=$_POST['val'];
					$mu=$_POST['matauang'];
					$pay=$_POST['payment'];
					$bank=$_POST['bank'];
					$type=$_POST['type'];
					$tgl=$_POST['tanggal'];
					$rmk2=$_POST['rmk'];
					$usr2=$_POST['user'];
					$dat=$_POST['tgl'];
					$rn2=$_POST['rn'];
								
					$sql="UPDATE billExpenses SET cost_code='$cc', description='$desc2', name_user='$emp2', value='$val2', rate='$mu', payment='$pay', 
					source_funds='$bank', type='$type', remark='$rmk2', date_input='$tgl', picture='$nama_baru', modified_user='$usr2', modified_date='$dat' WHERE id_oe='$rn2'";

					$result= mysql_query($sql) or die(mysql_error());
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../oe.php");	

mysql_close(); ?>
	