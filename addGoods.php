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

	  $tahun = date("Y");
	  
	  $id_barang= mysql_query("select * from goods order by id_goods desc limit 1");
	  $id_barang2 = mysql_fetch_array($id_barang);
	  $id_barang3 = $id_barang2['id_goods']+'1';
	
	if ($kd_role == "1") {

    $tab="ADD GOODS";    

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
            <div class=panel-heading><h4>ADD GOODS</h4></div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_barang.php method="post" enctype="multipart/form-data" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
                  <div class="col-lg-6 col-md-6">
                    <input class="form-control required" required placeholder="ex. Hardware, screw, machine, 4-40, 3/4 long, panhead, Phillips" name="desc"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <input class=form-control readonly value="<?PHP echo $id_barang3 ?>" name="kr">
                  </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Supplier 1</label>
					         <div class="col-lg-6 col-md-6">
						        <?PHP $sup= mysql_query("select * from supplier order by id_supplier asc limit 0, 10001");
						
								echo '<select class="form-control select2" name="sp1">';
								echo '<option value="">SELECT';
									
									While($sup2= mysql_fetch_assoc($sup))
								{
									echo '<option value="'.$sup2['noreg_supplier'].'">';
									echo $sup2['nama_supplier'];
									echo '</option>';
								}
								
								echo '</select>';
						?>
                    </div>                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Supplier 2</label>
                   <div class="col-lg-6 col-md-6">
            <?PHP $sup= mysql_query("select * from supplier order by id_supplier asc limit 0, 10001");
            
                echo '<select class="form-control select2" name="sp2">';
                echo '<option value="">SELECT';
                  
                  While($sup2= mysql_fetch_assoc($sup))
                {
                  echo '<option value="'.$sup2['noreg_supplier'].'">';
                  echo $sup2['nama_supplier'];
                  echo '</option>';
                }
                
                echo '</select>';
            ?>
                    </div>                    
                </div>
                <!-- End .form-group  -->                               					
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Part Number</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control  placeholder="ex. HSC0424PP-MZ2N" name="pn"> 
                  </div>  
                    <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="stat">
                          <option value="">SELECT STATUS           
                          <option value="AVAILABLE">AVAILABLE
                          <option value="OBSOLOTE">OBSOLOTE
                          <option value="REPLACEMENT">REPLACEMENT
                          <option value="DISCONTINUED">DISCONTINUED
                          <option value="UNKNOWN">UNKNOWN             
                        </select>
                    </div>                                  
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Brand</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control placeholder="ex. PHILIPS" name="merk"> 
                  </div>
                     <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="gb">
                          <option value=na>TYPE OF GOODS           
                          <option value=Chemical>Chemical
                          <option value=Electrical>Electrical                         
                          <option value=Instruments>Instruments
                          <option value=Mechanical>Mechanical
                          <option value=MISC>Misc
                          <option value=Piping>Piping
                          <option value=Valve>Valve 
                          <option value=Others>Others                
                        </select>
                    </div>                                    
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Manufactured</label>
                  <div class="col-lg-8 col-md-8">
                    <input class=form-control placeholder="ex. PHILIPS" name="man"> 
                  </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Specification</label>
                  <div class="col-lg-8 col-md-8">
                    <textarea class="form-control elastic" rows=5 name="rem"></textarea>
                  </div>
                </div>
                <!-- End .form-group  -->                 
				        <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Picture</label>
                  <div class="col-lg-8 col-md-8">
                    <input type=file name="nama_file">
                    <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="date">
                  </div>
                </div>
                <!-- End .form-group  -->
                <!--<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Upload Picture 2</label>
                  <div class="col-lg-8 col-md-8">
                    <input type=file name="nama_file2">
                  </div>
                </div>
                <!-- End .form-group  -->                               
                <!--<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Brochure</label>
                  <div class="col-lg-8 col-md-8">
                    <input type=file name="nama_file3">
                  </div>
                </div>-->
                <!-- End .form-group  -->
                <!--<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Last Qoute</label>
                  <div class="col-lg-2 col-md-2">
                    <input type=file name="nama_file4">
                  </div>
                </div>-->
                <!-- End .form-group  -->                 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div style="margin-left:40%; margin-top:2%; margin-bottom:2%;">
                    <button type=submit class="btn btn-sm btn-primary">SAVE GOODS</button>
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