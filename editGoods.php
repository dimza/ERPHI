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

    $tab="EDIT-GOODS";    

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
          <div class="panel panel-default">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4>EDIT GOODS FORM</h4>
            </div>
            <div class=panel-body>
      <?PHP
      
        $kode= @$_GET['kd'];
        
        $tam= mysql_query("select * from `goods` where id_goods='$kode'");
        $data_tam = mysql_fetch_array($tam);

        $cn= $data_tam['currency_goods'];
        $kp1= $data_tam['kode_principal'];
        $kp2= $data_tam['kode_principal2'];

        $cn2= mysql_query("select * from currency where idCurrency='$cn'") or die(mysql_error());
        $cn3= mysql_result($cn2, 0, 'description');
        $cn4= mysql_result($cn2, 0, 'symbol');

        $kp12= mysql_query("select * from supplier where noreg_supplier='$kp1'") or die(mysql_error());
        $kp13= mysql_result($kp12, 0, 'nama_supplier'); 

        $kp22= mysql_query("select * from supplier where noreg_supplier='$kp2'") or die(mysql_error());
        $kp23= mysql_result($kp22, 0, 'nama_supplier');               
      
      ?>            
              <form class="form-horizontal" role=form action=sys/engine/updateGoods.php?kd=<?PHP echo $kode ?> method="post" enctype="multipart/form-data" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
                  <div class="col-lg-6 col-md-6">
                    <input class="form-control required" required value="<?PHP echo $data_tam['description_goods']; ?>" name="desc"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <input class=form-control readonly value="<?PHP echo $kode ?>">
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Price List</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required value="<?PHP echo $data_tam['price_list']; ?>" name="prc"> 
                  </div>
                    <div class="col-lg-4 col-md-4">
                      <?PHP 

                      $mu= mysql_query("select * from currency order by idCurrency asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="mu">';
                        echo '<option value="'.$cn.'">'.$cn4.'';
                  
                          While($mu2= mysql_fetch_assoc($mu)) {

                            echo '<option value="'.$mu2['idCurrency'].'">';
                            echo $mu2['symbol'].' - '.$mu2['description'];
                            echo '</option>';
                                                              }
                        echo '</select>';
                      ?>                    
                    </div>                  
                </div>
                <!-- End .form-group  -->                                               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Supplier 1</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $clie= mysql_query("select * from supplier order by id_supplier asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="sp1">';
                        echo '<option value="'.$kp1.'">'.$kp13.'';
                  
                          While($clie2= mysql_fetch_assoc($clie)) {

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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Supplier 2</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $clie= mysql_query("select * from supplier order by id_supplier asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="sp2">';
                        echo '<option value="'.$kp2.'">'.$kp23.'';
                  
                          While($clie2= mysql_fetch_assoc($clie)) {

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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Part Number</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required value="<?PHP echo $data_tam['part_number']; ?>" name="pn"> 
                  </div>
                    <div class="col-lg-4 col-md-4">
                      <select class="form-control select2" name="stat">
                          <option value="<?PHP echo $data_tam['status_goods']; ?>"><?PHP echo $data_tam['status_goods']; ?>         
                          <option value="AVAILABLE">AVAILABLE
                          <option value="OBSOLOTE">OBSOLOTE
                          <option value="REPLACEMENT">REPLACEMENT
                          <option value="DISCONTINUED">DISCONTINUED             
                      </select>
                    </div>                                   
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Brand</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required value="<?PHP echo $data_tam['brand_goods']; ?>" name="merk"> 
                  </div>
                     <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="gb">
                          <option value="<?PHP echo $data_tam['type_goods']; ?>"><?PHP echo $data_tam['type_goods']; ?>         
                          <option value="Chemical">Chemical
                          <option value="Electrical">Electrical                         
                          <option value="Instruments">Instruments
                          <option value="Mechanical">Mechanical
                          <option value="MISC">Misc
                          <option value="Piping">Piping
                          <option value="Valve">Valve                 
                        </select>
                    </div>                                   
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Manufactured</label>
                  <div class="col-lg-8 col-md-8">
                    <input class=form-control required value="<?PHP echo $data_tam['manufactured']; ?>" name="man"> 
                  </div>
                </div>
                <!-- End .form-group  -->		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                  <div class="col-lg-8 col-md-8">
                    <textarea class="form-control elastic" rows=5 name="rem" value=""><?PHP echo $data_tam['remark_goods']; ?></textarea>
                  </div>
                </div>
                <!-- End .form-group  -->                
				        <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Picture</label>
                  <div class="col-lg-8 col-md-8">
                    <input type=file name="nama_file">
                    <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="dat">
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
                </div>
                <!-- End .form-group  -->
                <!--<div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Last Qoutes</label>
                  <div class="col-lg-8 col-md-8">
                    <input type=file name="nama_file4">
                  </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-8 col-md-8">
                    <button type=submit class="btn btn-primary">UPDATED</button>
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