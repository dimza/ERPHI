<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../photo/avatar/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {	 

					$nd=$_POST['nd'];
					$nb=$_POST['nb'];
					$com=$_POST['com'];
					$eml=$_POST['eml'];
					$en=$_POST['en'];
					$npwp=$_POST['npwp'];
					$jd=$_POST['jd'];
					$tl=$_POST['tl'];
					$ttl=$_POST['ttl'];
					$ms=$_POST['ms'];
					$sex=$_POST['sex'];
					$eca=$_POST['eca'];
					$pnu=$_POST['pnu'];
					$ide=$_POST['ide'];
					$idem=$_POST['idem'];
					$almt=$_POST['almt'];
					$ngr=$_POST['ngr'];
					$prpns=$_POST['prpns'];
					$kta=$_POST['kta'];
					$kp=$_POST['kp'];
					$tlp=$_POST['tlp'];
					$mob=$_POST['mob'];
					$dat=$_POST['dat'];

					$null='0';
					$foto2="11.png";											
		
					$sql_emp= "insert INTO employee ( no_pegawai, join_date, kode_company, nama_depan, nama_belakang, tempat_lahir, ttl_karyawan, alamat_karyawan, kota_karyawan, kodepos_karyawan, propinsi_karyawan, negara_karyawan, telpon_karyawan, mobile_karyawan, email_karyawan, npwp, sex, martial_status, emergency_contact, emergency_phone, id_type, id_no, foto, vis, create_date) 
	
							VALUES ( '$en', '$jd', '$com', '$nd', '$nb', '$tl', '$ttl', '$almt', '$kta', '$kp', '$prpns', '$ngr', '$tlp', '$mob', '$eml', '$npwp', '$sex', '$ms', '$eca', '$pnu', '$ide', '$idem', '$foto2', '$null', '$dat')";
	
					$result = mysql_query($sql_emp) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../registerEmployee.php?nd=$nd&&nb=$nb&&en=$en&&alrt=1");

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

					$nd=$_POST['nd'];
					$nb=$_POST['nb'];
					$com=$_POST['com'];
					$eml=$_POST['eml'];
					$en=$_POST['en'];
					$npwp=$_POST['npwp'];
					$jd=$_POST['jd'];
					$tl=$_POST['tl'];
					$ttl=$_POST['ttl'];
					$ms=$_POST['ms'];
					$sex=$_POST['sex'];
					$pnu=$_POST['pnu'];
					$ide=$_POST['ide'];
					$idem=$_POST['idem'];
					$almt=$_POST['almt'];
					$ngr=$_POST['ngr'];
					$prpns=$_POST['prpns'];
					$kta=$_POST['kta'];
					$kp=$_POST['kp'];
					$tlp=$_POST['tlp'];
					$mob=$_POST['mob'];
					$dat=$_POST['dat'];

					$null='0';
					$foto2="11.png";											
		
					$sql_emp= "insert INTO employee ( no_pegawai, join_date, kode_company, nama_depan, nama_belakang, tempat_lahir, ttl_karyawan, alamat_karyawan, kota_karyawan, kodepos_karyawan, propinsi_karyawan, negara_karyawan, telpon_karyawan, mobile_karyawan, email_karyawan, npwp, sex, martial_status, emergency_contact, emergency_phone, id_type, id_no, foto, vis, create_date) 
	
							VALUES ( '$en', '$jd', '$com', '$nd', '$nb', '$tl', '$ttl', '$almt', '$kta', '$kp', '$prpns', '$ngr', '$tlp', '$mob', '$eml', '$npwp', '$sex', '$ms', '$eca', '$pnu', '$ide', '$idem', '$foto2', '$null', '$dat')";
	
					$result = mysql_query($sql_emp) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../registerEmployee.php?nd=$nd&&nb=$nb&&en=$en&&alrt=1");

mysql_close();

ob_end_flush(); ?>
	