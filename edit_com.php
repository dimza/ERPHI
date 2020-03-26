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

    $kode= @$_GET['kd'];
        
    $tam= mysql_query("select * from company where id_company='$kode'");
    $data_tam = mysql_fetch_array($tam);

    $nma = $data_tam['nama_company'];

	if ($kd_role == "1") {

    $tab="EDIT-COMPANY";    

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
              <h4>UPDATE DATA <?PHP echo $nma; ?></h4>
            </div>			
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/ubah_com.php?kd=<?PHP echo $kode ?> method="post" id=validate>
				        <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Notarial / NPWP</label>
                    <div class="col-lg-4 col-md-4">
                      <input class=form-control value="<?PHP echo $data_tam['akta_notaris']; ?>" name="ak">
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <input class=form-control placeholder="NPWP" value="<?PHP echo $data_tam['npwp']; ?>" name="np">
                    </div>                    
				        </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Type / Scalabillity</label>
                    <div class="col-lg-4 col-md-4">
                      <input class=form-control value="<?PHP echo $data_tam['type_industry']; ?>" name="tob">
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <input class=form-control value="<?PHP echo $data_tam['skala_usaha']; ?>" name="sc">
                    </div>                    
                </div>
                <!-- End .form-group  --> 		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company Name</label>
                    <div class="col-lg-6 col-md-6">
                      <input class=form-control required value="<?PHP echo $data_tam['nama_company']; ?>" name="nm"> 
                    </div>
                    <div class="col-lg-2 col-md-2">
                      <input class=form-control readonly required value="<?PHP echo $data_tam['kode_company']; ?>" name="kg">
                    </div>                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Since Date / Place</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>
                      <div class="col-lg-4 col-md-4">
                        <input class=form-control required value="<?PHP echo $data_tam['kota_lahir']; ?>" name="kta2">
                      </div>
                      <div class="col-lg-5 col-md-5">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" value="<?PHP echo $data_tam['tanggal_lahir']; ?>" name="dat">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">CEO / VICE</label>
                    <div class="col-lg-4 col-md-4">
                      <?PHP $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="ceo">';
                        echo '<option value="">SELECT';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['no_pegawai'].'">';
                            echo $emp2['nama_depan'].' '.$emp2['nama_belakang'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <?PHP $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="vice">';
                        echo '<option value="">SELECT';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['no_pegawai'].'">';
                            echo $emp2['nama_depan'].' '.$emp2['nama_belakang'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>                                      
                </div>
                <!-- End .form-group  --> 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Commisioner 1 / 2</label>
                    <div class="col-lg-4 col-md-4">
                      <?PHP $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="coms1">';
                        echo '<option value="">SELECT';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['no_pegawai'].'">';
                            echo $emp2['nama_depan'].' '.$emp2['nama_belakang'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <?PHP $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="coms2">';
                        echo '<option value="">SELECT';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['no_pegawai'].'">';
                            echo $emp2['nama_depan'].' '.$emp2['nama_belakang'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>                   
                </div>
                <!-- End .form-group  -->                                                				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Address</label>
                  <div class="col-lg-8 col-md-8">
                    <textarea class=form-control rows=3 placeholder="" name="almt"><?PHP echo $data_tam['alamat_company']; ?></textarea>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Country / Region</label>
                      <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="ngr">
                          <option value=<?PHP echo $data_tam['negara_company']; ?>><?PHP echo $data_tam['negara_company']; ?>                 
                          <?PHP include ("negara.php"); ?>             
                        </select>
                    </div>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" value=<?PHP echo $data_tam['propinsi_company']; ?> name="prpns">
                  </div>                    
                </div>
                <!-- End .form-group  -->                  
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">City / Postal</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" value=<?PHP echo $data_tam['kota_company']; ?> name="kta">
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" value="<?PHP echo $data_tam['kodepos_company']; ?>" name="kp">
                  </div>                  
                </div>        
                <!-- End .form-group  -->                   			
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Phone / Fax</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" required value="<?PHP echo $data_tam['telpon_company']; ?>" name="tlp">
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" required value="<?PHP echo $data_tam['telpon_company']; ?>" name="fax">
                  </div>                  
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Email / Websites</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" id=email type=email value="<?PHP echo $data_tam['email_company']; ?>" name="eml">
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control value="<?PHP echo $data_tam['situs']; ?>" name="sts">
                    <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">                    
                  </div>                  
                </div>				
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Domail Email</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control value="<?PHP echo $data_tam['domain']; ?>" name="sts">                  
                  </div>
                </div>        
                <!-- End .form-group  -->                 				
				        <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Upload Logo</label>
                  <div class="col-lg-10 col-md-10">
                    <input type=file>
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