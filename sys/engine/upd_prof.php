<?PHP
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../photo/avatar/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {	 

					$nik=$_POST['nik'];

					$nd=$_POST['nd'];
					$nt=$_POST['nt'];
					$nb=$_POST['nb'];
					$tl=$_POST['tl'];
					$ttl=$_POST['ttl'];					
					$npwp2=$_POST['npwp'];
					$bpjs2=$_POST['bpjs'];
					$ms=$_POST['ms'];
					$sex=$_POST['sex'];
					$spo=$_POST['spo'];
					$noc=$_POST['noc'];
					$eca=$_POST['eca'];
					$pnu2=$_POST['pnu'];
					$ide=$_POST['ide'];
					$idem2=$_POST['idem'];
					$almt=$_POST['almt'];
					$ngr=$_POST['ngr'];
					$prpns=$_POST['prpns'];
					$kta=$_POST['kta'];
					$kp=$_POST['kp'];
					$tlp=$_POST['tlp'];
					$mob=$_POST['mob'];
					$usr=$_POST['usr'];
					$dat=$_POST['dat'];

					$null='';
					$null2='0';
					$foto="pp2.png";											
		
					$sql_emp= "UPDATE employee SET nama_depan='$nd', nama_tengah='$nt', nama_belakang='$nb', tempat_lahir='$tl', ttl_karyawan='$ttl', alamat_karyawan='$almt', 
					kota_karyawan='$kta', kodepos_karyawan='$kp', propinsi_karyawan='$prpns', negara_karyawan='$ngr', telpon_karyawan='$tlp', 
					mobile_karyawan='$mob', npwp='$npwp2', bpjs='$bpjs2', sex='$sex', martial_status='$ms', spouse_name='$spo', no_child='$noc',
					emergency_contact='$eca', emergency_phone='$pnu2', id_type='$ide', id_no='$idem2' WHERE no_pegawai='$nik'";

					$result= mysql_query($sql_emp) or die(mysql_error());
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../profile.php");

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

					$nik=$_POST['nik'];

					$nd=$_POST['nd'];
					$nt=$_POST['nt'];
					$nb=$_POST['nb'];
					$tl=$_POST['tl'];
					$ttl=$_POST['ttl'];					
					$npwp2=$_POST['npwp'];
					$bpjs2=$_POST['bpjs'];
					$ms=$_POST['ms'];
					$sex=$_POST['sex'];
					$spo=$_POST['spo'];
					$noc=$_POST['noc'];
					$eca=$_POST['eca'];
					$pnu2=$_POST['pnu'];
					$ide=$_POST['ide'];
					$idem2=$_POST['idem'];
					$almt=$_POST['almt'];
					$ngr=$_POST['ngr'];
					$prpns=$_POST['prpns'];
					$kta=$_POST['kta'];
					$kp=$_POST['kp'];
					$tlp=$_POST['tlp'];
					$mob=$_POST['mob'];
					$usr=$_POST['usr'];
					$dat=$_POST['dat'];

					$null='';
					$null2='0';											
		
					$sql_emp= "UPDATE employee SET nama_depan='$nd', nama_tengah='$nt', nama_belakang='$nb', tempat_lahir='$tl', ttl_karyawan='$ttl', alamat_karyawan='$almt', 
					kota_karyawan='$kta', kodepos_karyawan='$kp', propinsi_karyawan='$prpns', negara_karyawan='$ngr', telpon_karyawan='$tlp', 
					mobile_karyawan='$mob', npwp='$npwp2', bpjs='$bpjs2', sex='$sex', martial_status='$ms', spouse_name='$spo', no_child='$noc',
					emergency_contact='$eca', emergency_phone='$pnu2', id_type='$ide', id_no='$idem2', foto='$nama_baru' WHERE no_pegawai='$nik'";


					$result= mysql_query($sql_emp) or die(mysql_error());
							 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../profile.php");


mysql_close();

?>
	