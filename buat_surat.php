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
              <h4>BUAT SURAT</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal group-border hover-stripped" role=form action=sys/engine/login.php method="post">
				<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">NoReg. Surat</label>
                  <div class="col-lg-10 col-md-10">
                    <input class="form-control tip" placeholder="No. Tender / No. Inquiry">
                  </div>
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Perusahaan</label>
					<div class="col-lg-6 col-md-6">
						<?PHP $comp= mysql_query("select * from company order by id_company asc limit 0, 10");
						
								echo '<select class="form-control select2" name="company">';
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Client</label>
					<div class="col-lg-6 col-md-6">
						<?PHP $clie= mysql_query("select * from client order by id_client asc limit 0, 10");
						
								echo '<select class="form-control select2" name="client">';
								echo '<option value="">----- PILIH -----';
									
									While($clie2= mysql_fetch_assoc($clie))
								{
									echo '<option value="'.$comp2['id_client'].'">';
									echo $clie2['nama_client'];
									echo '</option>';
								}
								
								echo '</select>';
						?>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Mata Uang</label>
					<div class="col-lg-6 col-md-6">
						<?PHP $mu= mysql_query("select * from currency order by id_currency asc limit 0, 10");
						
								echo '<select class="form-control select2" name="matauang">';
								echo '<option value="">----- PILIH -----';
									
									While($mu2= mysql_fetch_assoc($mu))
								{
									echo '<option value="'.$mu2['id_currency'].'">';
									echo $mu2['matauang'].' - '.$mu2['simbol'];
									echo '</option>';
								}
								
								echo '</select>';
						?>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Pajak</label>
                  <div class="col-lg-10 col-md-10">
                    <input type=checkbox class="switch noStyle" name=switch id=switch value=option1 checked>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tanggal</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>
                      <div class="col-lg-4 col-md-4">
                        <div class=input-group>
                          <input class="form-control datetime-picker2">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Jumlah Hari</label>
                  <div class="col-lg-10 col-md-10">
                    <input class="form-control tip" placeholder="Jumhlah masa berlaku Penawaran">
                  </div>
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">User Input</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>">
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tanggal Input</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control readonly value="<?PHP echo $today ?>">
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <a href="input_item_penawaran.php"><button type=submit class="btn btn-primary">LANJUT</button></a>
					
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
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>