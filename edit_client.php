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

    $tab="EDIT-CLIENT";    

  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php");
  include ("date_format.php"); 

  ?>

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
              <h4>EDIT CLIENT FORM</h4>
            </div>
            <div class=panel-body>
			<?PHP
			
				$kode= @$_GET['kd'];
				
				$tam= mysql_query("select * from client where id_client='$kode'");
				$data_tam = mysql_fetch_array($tam);
			
			?>			
              <form class="form-horizontal" role=form action=sys/engine/ubah_rek.php?kd=<?PHP echo $kode ?> method="post" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Registration No.</label>
                  <div class="col-lg-8 col-md-8">
                    <input class=form-control readonly value="<?PHP echo $kode ?>">
                  </div>
                </div>
                <!-- End .form-group  -->			
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company Name</label>
                  <div class="col-lg-8 col-md-8">
                    <input class=form-control required value="<?PHP echo $data_tam['nama_client']; ?>" name="nm"> 
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Address</label>
                  <div class="col-lg-8 col-md-8">
                    <textarea class=form-control rows=3 placeholder="Jalan Kura - Kura Ninja" name="alm"><?PHP echo $data_tam['alamat_client']; ?></textarea> 
                  </div>
                </div>
                <!-- End .form-group  -->                							
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Country</label>
          <div class="col-lg-6 col-md-6">
            <select class="form-control select2" name="ngr">
              <option value="<?PHP echo $data_tam['negara_client']; ?>"><?PHP echo $data_tam['negara_client']; ?> 
                <?PHP include ("negara.php"); ?>
            </select>
                    </div>
                </div>
                <!-- End .form-group  -->                 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Region</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tip" value="<?PHP echo $data_tam['propinsi_client']; ?>" name="prpns">
                  </div>
                </div>        
                <!-- End .form-group  -->                  
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">City</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tip" value="<?PHP echo $data_tam['kota_client']; ?>" name="kta">
                  </div>
                </div>        
                <!-- End .form-group  -->                 		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Postal Code</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tip" value="<?PHP echo $data_tam['kodepos_client']; ?>" name="kp">
                  </div>
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Phone</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tip" required value="<?PHP echo $data_tam['telpon_client']; ?>" name="tlp">
                  </div>
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Email</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tip" value="<?PHP echo $data_tam['email_client']; ?>" name="eml">
                  </div>
                </div>				
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Website</label>
                  <div class="col-lg-8 col-md-8">
                    <input class=form-control value="<?PHP echo $data_tam['situs']; ?>" name="sts">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                    <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tags</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tags" value="petroleum, gas, mining">
                  </div>
                </div>
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <button type=submit class="btn btn-primary">UPDATE</button>
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