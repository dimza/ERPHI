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

    $tab="EDIT-SUPPLIER";    

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
              <h4>EDIT SUPPLIER FORM</h4>
            </div>
			<?PHP
			
				$kode= @$_GET['kd'];
				
				$tam= mysql_query("select * from supplier where noreg_supplier='$kode'");
				$data_tam = mysql_fetch_array($tam);
			
			?>			
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/ubah_sup.php?kd=<?PHP echo $kode ?> method="post" id=validate>			
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company Name</label>
                  <div class="col-lg-6 col-md-6">
                    <input class=form-control value="<?PHP echo $data_tam['nama_supplier']; ?>" name="nm"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <input class=form-control readonly value="<?PHP echo $data_tam['noreg_supplier']; ?>">
                  </div>                  
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Address</label>
                  <div class="col-lg-8 col-md-8">
                    <textarea class=form-control rows=4 name="almt" placeholder="keterangan tambahan.."><?PHP echo $data_tam['alamat_supplier']; ?></textarea>
                  </div>
                </div>
                <!-- End .form-group  -->		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Country</label>
          <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="ngr">
                          <option value=<?PHP echo $data_tam['negara_supplier']; ?>><?PHP echo $data_tam['negara_supplier']; ?>                 
                <?PHP include ("negara.php"); ?>            
                        </select>
                    </div>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" value="<?PHP echo $data_tam['propinsi_supplier']; ?>" name="prpns">
                  </div>
                </div>
                <!-- End .form-group  -->                  
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">City</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" value="<?PHP echo $data_tam['kota_supplier']; ?>" name="kta">
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" value="<?PHP echo $data_tam['kodepos_supplier']; ?>" name="kp">
                  </div>
                </div>        
                <!-- End .form-group  -->		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Phone</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" required value="<?PHP echo $data_tam['telpon_supplier']; ?>" name="tlp">
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" required value="<?PHP echo $data_tam['fax_supplier']; ?>" name="fax">
                  </div>
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Email</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" id=email type=email value="<?PHP echo $data_tam['email_supplier']; ?>" name="eml">
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control value="<?PHP echo $data_tam['situs']; ?>" name="sts">
                    <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                  </div>                  
                </div>				
                <!-- End .form-group  -->		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Products Brand</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tags" value="<?PHP echo $data_tam['productBrand']; ?>" name="pb">
                  </div>
                </div>
                <!-- End .form-group  -->                 		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tags</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tags" value="<?PHP echo $data_tam['tags']; ?>" name="tags">
                  </div>
                </div>
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-8 col-md-8">
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