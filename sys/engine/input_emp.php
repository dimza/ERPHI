<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../photo/avatar/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {	 

					$nd2=$_POST['nd'];
					$nt=$_POST['nt'];
					$nb2=$_POST['nb'];
					$com2=$_POST['com'];
					$en2=$_POST['en'];
					$eml2=$_POST['eml'];
					$jt=$_POST['jt'];
					$sta2=$_POST['sta'];
					$bsc=$_POST['bsc'];
					$mls=$_POST['mls'];
					$npwp=$_POST['npwp'];
					$bpjs=$_POST['bpjs'];
					$jd2=$_POST['jd'];
					$tl2=$_POST['tl'];
					$ttl2=$_POST['ttl'];
					$ms=$_POST['ms'];
					$sex=$_POST['sex'];
					$spo=$_POST['spo'];
					$noc=$_POST['noc'];
					$eca=$_POST['eca'];
					$pnu=$_POST['pnu'];
					$ide=$_POST['ide'];
					$idem=$_POST['idem'];
					$almt2=$_POST['almt'];
					$ngr2=$_POST['ngr'];
					$prpns2=$_POST['prpns'];
					$kta2=$_POST['kta'];
					$kp2=$_POST['kp'];
					$tlp2=$_POST['tlp'];
					$mob2=$_POST['mob'];
					$usr2=$_POST['usr'];
					$dat2=$_POST['dat'];

					$null='';
					$null2='0';
					$foto2="11.png";

						$mail= mysql_query("select * from company where id_company='$com2'");
	  					$mail2= mysql_fetch_array($mail);
	  
	  					$dmn= $mail2['domain'];
	  					$com3= $mail2['kode_company'];

	  					$mail3= $eml2.$dmn;											
		
					$sql_emp= "insert INTO employee ( id_karyawan, no_pegawai, join_date, status_karyawan, kode_company, nama_depan, nama_tengah, nama_belakang, tempat_lahir, ttl_karyawan, alamat_karyawan, kota_karyawan, kodepos_karyawan, propinsi_karyawan, negara_karyawan, telpon_karyawan, mobile_karyawan, email_karyawan, job_tittle, basic_salary, meals_salary, npwp, bpjs, sex, martial_status, spouse_name, no_child, emergency_contact, emergency_phone, id_type, id_no, foto, status, vis, create_user, create_date, modified_user, modified_date) 
	
							VALUES ( '$null', '$en2', '$jd2', '$sta2', '$com3', '$nd2', '$nt', '$nb2', '$tl2', '$ttl2', '$almt2', '$kta2',   '$kp2', '$prpns2', '$ngr2', '$tlp2', '$mob2', '$mail3', '$jt', '$bsc', '$mls', '$npwp', '$bpjs', '$sex', '$ms', '$spo', '$noc',  '$eca', '$pnu', '$ide', '$idem', '$foto2', '$null2', '$null2', '$usr2', '$dat2', '$usr2', '$dat2')";
	
					$result = mysql_query($sql_emp) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../list_employee.php");

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

					$nd2=$_POST['nd'];
					$nt=$_POST['nt'];
					$nb2=$_POST['nb'];
					$com2=$_POST['com'];
					$en2=$_POST['en'];
					$eml2=$_POST['eml'];
					$jt=$_POST['jt'];
					$sta2=$_POST['sta'];
					$bsc=$_POST['bsc'];
					$mls=$_POST['mls'];
					$npwp=$_POST['npwp'];
					$bpjs=$_POST['bpjs'];
					$jd2=$_POST['jd'];
					$tl2=$_POST['tl'];
					$ttl2=$_POST['ttl'];
					$ms=$_POST['ms'];
					$sex=$_POST['sex'];
					$spo=$_POST['spo'];
					$noc=$_POST['noc'];
					$eca=$_POST['eca'];
					$pnu=$_POST['pnu'];
					$ide=$_POST['ide'];
					$idem=$_POST['idem'];
					$almt2=$_POST['almt'];
					$ngr2=$_POST['ngr'];
					$prpns2=$_POST['prpns'];
					$kta2=$_POST['kta'];
					$kp2=$_POST['kp'];
					$tlp2=$_POST['tlp'];
					$mob2=$_POST['mob'];
					$usr2=$_POST['usr'];
					$dat2=$_POST['dat'];

					$null='';
					$null2='0';
					$foto2="pp2.png";

						$mail= mysql_query("select * from company where id_company='$com2'");
	  					$mail2= mysql_fetch_array($mail);
	  
	  					$dmn= $mail2['domain'];
	  					$com3= $mail2['kode_company'];

	  					$mail3= $eml2.$dmn;																
		
					$sql_emp= "insert INTO employee ( id_karyawan, no_pegawai, join_date, status_karyawan, kode_company, nama_depan, nama_tengah, nama_belakang, tempat_lahir, ttl_karyawan, alamat_karyawan, kota_karyawan, kodepos_karyawan, propinsi_karyawan, negara_karyawan, telpon_karyawan, mobile_karyawan, email_karyawan, job_tittle, basic_salary, meals_salary, npwp, bpjs, sex, martial_status, spouse_name, no_child, emergency_contact, emergency_phone, id_type, id_no, foto, status, vis, create_user, create_date, modified_user, modified_date) 
	
							VALUES ( '$null', '$en2', '$jd2', '$sta2', '$com3', '$nd2', '$nt', '$nb2', '$tl2', '$ttl2', '$almt2', '$kta2',   '$kp2', '$prpns2', '$ngr2', '$tlp2', '$mob2', '$mail3', '$jt', '$bsc', '$mls', '$npwp', '$bpjs', '$sex', '$ms', '$spo', '$noc',  '$eca', '$pnu', '$ide', '$idem', '$nama_baru', '$null2', '$null2', '$usr2', '$dat2', '$usr2', '$dat2')";
	
					$result = mysql_query($sql_emp) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../list_employee.php");

mysql_close();

ob_end_flush(); ?>
	