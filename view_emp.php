<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
    $peg = $data_tampil['nama_pegawai'];
    $spc= $data_tampil['spc'];    
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);

	
	if ($kd_role == "1") {	

    $tab="VIEW EMP";    

  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php"); 

  ?>

<?PHP 

    $kode= @$_GET['kd'];
				
	  $tam= mysql_query("select * from employee where id_karyawan='$kode'");
	  $data_tam = mysql_fetch_array($tam);

    $cm=$data_tam['kode_company'];
    $cm2= mysql_query("select * from `company` where kode_company='$cm'") or die(mysql_error());
    $cm3= mysql_result($cm2, 0, 'nama_company');    
			
?>

<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
    <div class=row>
      <!-- Start .row -->
      <!-- Start .page-header -->
      <div class="col-lg-12 heading">
        <h1 class=page-header><i class=en-megaphone></i>
          <?PHP echo $data_tam['nama_depan']; ?> 
          <?PHP echo $data_tam['nama_tengah']; ?>
          <?PHP echo $data_tam['nama_belakang']; ?></h1>
        <!-- Start .bredcrumb -->
        <!-- End .breadcrumb -->
      </div>
      <!-- End .page-header -->
    </div>
    <!-- End .row -->
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
            </div>
       		     <div class=panel-body>
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Company</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $cm3; ?>
                    </p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Job Tittle</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['job_tittle']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Status</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['status_karyawan']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->                                				        
                <div class=form-group>
                  <label class="col-lg-2 col-md-4 control-label">Employee No.</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['no_pegawai']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->  
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">NPWP</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['npwp']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Jamsostek</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['bpjs']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">ID Number</label>
                  <div class="col-lg-6 col-md-6">
                    <p>-</p>
                  </div>
                </div>
                <!-- End .form-group  -->                                                               
				        <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Join Date</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['join_date']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Status Pegawai</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['status_karyawan']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Nama Pegawai</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['nama_depan']; ?> <?PHP echo $data_tam['nama_belakang']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">TTL</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['tempat_lahir']; ?>, <?PHP echo $data_tam['ttl_karyawan']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Agama</label>
                  <div class="col-lg-6 col-md-6">
                    <p>-</p>
                  </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Alamat</label>
                  <div class="col-lg-8 col-md-8">
                    <p><?PHP echo $data_tam['alamat_karyawan']; ?>, <?PHP echo $data_tam['kota_karyawan']; ?> - <?PHP echo $data_tam['kodepos_karyawan']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Propinsi</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['propinsi_karyawan']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Negara</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['negara_karyawan']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Telpon Mobile</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['mobile_karyawan']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Telpon Home</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['telpon_karyawan']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Email</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['email_karyawan']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
<!--                 <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Modified User</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['modified_user']; ?></p>
                  </div>
                </div> -->
                <!-- End .form-group  -->
<!--                 <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Modified Date</label>
                  <div class="col-lg-8 col-md-8">
                    <p><?PHP echo $data_tam['modified_date']; ?></p>
                  </div>
                </div> -->
                <!-- End .form-group  -->                 
                                                
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-8 end here -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <!-- col-lg-4 start here -->
          <div class="panel panel-default plain profile-widget">
            <!-- Start .panel -->
              <div class="col-lg-4 col-md-12 col-sm-12">
                <br><br>
                <div class=profile-avatar><img src=photo/avatar/<?PHP echo $data_tam['foto']; ?> ></div>
              </div>
               <div class="col-lg-8 col-md-12 col-sm-12">
                <div class=profile-name><?PHP echo $data_tam['nama_belakang']; ?>, <?PHP echo $data_tam['nama_depan']; ?> <?PHP echo $data_tam['nama_tengah']; ?> <br><span class="label label-success">EDIT</span></div>
                </div>                          
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-4 end here -->        
      </div>
      <!-- Page End here -->
    </div>
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
<script src=assets/js/pages/data-tables.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>