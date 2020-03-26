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
    
    $today = date("j F Y"); 

    $tahun = date("Y");

  
  if ($kd_role == "1") {

    $tab="RCV-FORM/NO PO-IN";    

  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php"); 

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
          <div class="panel panel-default">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4>RECEIVING PROCESS WITHOUT PO-IN FORM</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_inv2.php enctype="multipart/form-data" method="post" id=validate>
              <?PHP
                	
                  $id_inv= mysql_query("select * from inventory order by id_inv desc limit 1");
	  				      $id_inv2 = mysql_fetch_array($id_inv);
	  				      $id_inv3 = $id_inv2['noreg_inv']+'1';
	  				  ?>
	  			    <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Registration No.</label>
                  <div class="col-lg-6 col-md-6">
                    <input class=form-control readonly value="<?PHP echo $id_inv3 ?>" name="kr">
                  </div>
                </div>	
                <!-- End .form-group  -->                 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tracking No.</label>
                    <div class="col-lg-6 col-md-6">
                      <input class="form-control tip" placeholder="No. PO Masuk / Reference No." name="ref">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Client</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $clie= mysql_query("select * from client order by id_client asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="clnt">';
                        echo '<option value="">SELECT';
                        echo '<option value="2005">NON AVAILABLE';
                  
                          While($clie2= mysql_fetch_assoc($clie)) {

                            echo '<option value="'.$clie2['id_client'].'">';
                            echo $clie2['nama_client'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                </div>
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $comp= mysql_query("select * from company order by id_company asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="comp">';
                        echo '<option value="">SELECT';
                  
                          While($comp2= mysql_fetch_assoc($comp)) {

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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Supplier</label>
          <div class="col-lg-6 col-md-6">
						<?PHP $clie= mysql_query("select * from supplier order by id_supplier asc limit 0, 10001");
						
								echo '<select class="form-control select2" name="sup">';
								echo '<option value="">SELECT';
									
									While($clie2= mysql_fetch_assoc($clie))
								{
									echo '<option value="'.$clie2['noreg_supplier'].'">';
									echo $clie2['nama_supplier'];
									echo '</option>';
								}
								
								echo '</select>';
						?>
                </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Goods</label>
          <div class="col-lg-6 col-md-6">
                      <?PHP $tampil_barang= mysql_query("select * from goods order by id_goods asc limit 0, 10001");
            
                              echo '<select class="form-control select2" name="brg">';
                              echo '<option value="">SELECT';
                  
                                While($tampil_barang2= mysql_fetch_assoc($tampil_barang))
                                  
                                  {

                                    echo '<option value="'.$tampil_barang2['id_goods'].'">';
                                    echo $tampil_barang2['description_goods'];
                                    echo '</option>';
                                  }
                
                                    echo '</select>';
                      ?>
                </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Quantity</label>
                    <div class="col-lg-2 col-md-2">
                      <input class="form-control tip" placeholder="1-100" name="jml">
                    </div>
                    <div class="col-lg-2 col-md-2">
                      <input class="form-control tip" placeholder="UNIT" name="unt">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Date</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>
                      <div class="col-lg-6 col-md-6">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="tanggal">
                          <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                          <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->                                                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-6 col-md-6">
                      <textarea class=form-control rows=4 placeholder="" name="rmk"></textarea>
                    </div>
                </div>
                <!-- End .form-group  --> 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Upload Photo</label>
                  <div class="col-lg-6 col-md-6">
                    <input type=file name="nama_file">
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
<?PHP   }  else { header("Location: error_page.php"); } ?>