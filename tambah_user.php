<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);
	  
	  $today = date("l jS \of F Y h:i:s A");

	  $tahun = date("Y");
	  
	  $emp= mysql_query("select * from employee order by no_pegawai desc limit 1");
	  $emp2 = mysql_fetch_array($emp);
	  $emp3 = $emp2['no_pegawai']+'1';
	
	if ($kd_role == "1") {	
?>

<?PHP include ("head_meta.php"); ?>

<body>

<?PHP include ("header.php"); ?>

<?PHP include ("sidebar.php"); ?>

<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
	<br>
    <!-- End .row -->
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->
        <div class=col-lg-12>
          <!-- Start col-lg-12 -->
          <div class="panel panel-default toggle">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4>ADD USER</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal group-border hover-stripped" role=form action=sys/engine/input_karyawan.php method="post" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">NoPeg. Karyawan</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control readonly value="<?PHP echo $emp3 ?>" name="np">
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Perusahaan</label>
					<div class="col-lg-6 col-md-6">
						<?PHP $comp= mysql_query("select * from company order by id_company asc limit 0, 10");
						
								echo '<select class="form-control select2" name="com">';
								echo '<option value="">----- PILIH -----';
									
									While($comp2= mysql_fetch_assoc($comp))
								{
									echo '<option value="'.$comp2['kode_company'].'">';
									echo $comp2['nama_company'];
									echo '</option>';
								}
								
								echo '</select>';
						?>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Status</label>
					<div class="col-lg-6 col-md-6">
                        <select class="form-control select2" name="sta">
                          <option value="">----- PILIH -----						
                          <option value="TETAP">TETAP
                          <option value="KONTRAK">KONTRAK
                          <option value="MAGANG">MAGANG						  
                        </select>
                    </div>
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Nama Depan</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control required placeholder="Dimza" name="nd"> 
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Nama Belakang</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control required placeholder="Jouly" name="nb"> 
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">TTL</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>
                      <div class="col-lg-4 col-md-4">
                        <input class=form-control required placeholder=Balikpapan name="tl">
                      </div>
                      <div class="col-lg-4 col-md-4">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="ttl">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->                               				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Alamat</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control required placeholder="Jalan Kura-Kura Ninja" name="alm"> 
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Negara</label>
          <div class="col-lg-6 col-md-6">
            <select class="form-control select2" name="ngr">
              <option value="">----- PILIH -----  
                <?PHP include ("negara.php"); ?>
            </select>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Propinsi</label>
          <div class="col-lg-6 col-md-6">
            <select class="form-control select2" name="prpns">
              <option value="">----- PILIH -----
                <?PHP include ("propinsi.php"); ?>
              </select>
                    </div>
                </div>
                <!-- End .form-group  -->                                 				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Kota</label>
					<div class="col-lg-6 col-md-6">
					    <select class="form-control select2" name="kta">
							<option value="">----- PILIH -----	
								<?PHP include ("kota.php"); ?>
						</select>
                    </div>
                </div>
                <!-- End .form-group  -->		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Kodepos</label>
                  <div class="col-lg-10 col-md-10">
                    <input class="form-control tip" placeholder="761000" name="kp">
                  </div>
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Telpon Rumah</label>
                  <div class="col-lg-10 col-md-10">
                    <input class="form-control tip" placeholder="(0274)-735-000" name="tlp">
                  </div>
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Telpon Mobile</label>
                  <div class="col-lg-10 col-md-10">
                    <input class="form-control tip" required placeholder="+62-8532-333-5885" name="mob">
                  </div>
                </div>				
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Email</label>
                  <div class="col-lg-10 col-md-10">
                    <input class="form-control tip" id=email type=email placeholder="email@domain.com" name="eml">
                    <input type="hidden" class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type="hidden" class=form-control readonly value="<?PHP echo $today ?>" name="dat">
                  </div>
                </div>				
                <!-- End .form-group  -->
				<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Upload Foto</label>
                  <div class="col-lg-10 col-md-10">
                    <input type=file class=form-control name="fot">
                  </div>
                </div>
                <!-- End .form-group  -->                				               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <button type=submit class="btn btn-primary">SUBMIT</button>
                  </div>
                </div>
                <!-- End .form-group  -->
              </form>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- End col-lg-12 -->
      </div>
      <!-- End .row -->	      
      <!-- Page End here -->   
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
<!-- Javascripts -->
<!-- Load pace first -->
<script src=assets/plugins/core/pace/pace.min.js></script>
<!-- Important javascript libs(put in all pages) -->
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')</script>
<script src=http://code.jquery.com/ui/1.10.4/jquery-ui.js></script>
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')</script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="assets/js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="assets/js/libs/respond.min.js"></script>
<![endif]-->
<script src=assets/js/pages/form-validation.js></script>
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>