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

	
	if ($kd_role == "1") {	

    $tab="VIEW-CLIENT";    

  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php"); 

  ?>

<?PHP $kode= @$_GET['kd'];
				
	  $tam= mysql_query("select * from client where id_client='$kode'");
	  $data_tam = mysql_fetch_array($tam);
			
?>

<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
    <div class=row>
      <!-- Start .row -->
      <!-- Start .page-header -->
      <div class="col-lg-12 heading">
        <h1 class=page-header><i class=en-megaphone></i><?PHP echo $data_tam['nama_client']; ?></h1>
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
                  <label class="col-lg-4 col-md-4 control-label">noreg. Client</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['id_client']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Type of Industry</label>
                  <div class="col-lg-6 col-md-6">
                    <p>-</p>
                  </div>
                </div>
                <!-- End .form-group  -->                
				        <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">NPWP</label>
                  <div class="col-lg-6 col-md-6">
                    <p>-</p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Year Established</label>
                  <div class="col-lg-6 col-md-6">
                    <p>-</p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Business Activities</label>
                  <div class="col-lg-6 col-md-6">
                    <p>-</p>
                  </div>
                </div>
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Company Name</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['nama_client']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Contact Person</label>
                  <div class="col-lg-6 col-md-6">
                    <p>-</p>
                  </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Address</label>
                  <div class="col-lg-8 col-md-8">
                    <p><?PHP echo $data_tam['alamat_client']; ?>, <?PHP echo $data_tam['kota_client']; ?> - <?PHP echo $data_tam['kodepos_client']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Propince</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['propinsi_client']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Country</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['negara_client']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Phone Office</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['telpon_client']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Fax</label>
                  <div class="col-lg-6 col-md-6">
                    <p>-</p>
                  </div>
                </div>
                <!-- End .form-group  -->                 
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Email</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['email_client']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Website</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['situs']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  --> 
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Modified User</label>
                  <div class="col-lg-6 col-md-6">
                    <p><?PHP echo $data_tam['modified_user']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label">Modified Date</label>
                  <div class="col-lg-8 col-md-8">
                    <p><?PHP echo $data_tam['modified_date']; ?></p>
                  </div>
                </div>
                <!-- End .form-group  -->                               
                <br>
                <div class=form-group>
                  <label class="col-lg-4 col-md-4 col-sm-12 control-label"></label>
                  <div class="col-lg-6 col-md-6">
                  </div>
                </div>
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
                <div class=profile-avatar><img class=img-responsive src=assets/img/avatars/pp3.png alt=@roybarberuk></div>
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