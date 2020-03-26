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
  
  if ($kd_role == "1") {  

    $tab="SETTINGS";    

  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php"); 

  ?>

      <?PHP
        
        $tam= mysql_query("select * from employee where no_pegawai='$nopeg'");
        $data_tam = mysql_fetch_array($tam);
      
      ?>

<!-- Start #content -->
<div id="content">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper">
  <br>
    <!-- End .row -->
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class="row">
        <!-- Start .row -->
        <div class="col-lg-12">
          <!-- Start col-lg-12 -->
          <div class="panel panel-default panel-closed toggle panelRefresh panelClose showControls">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4>EDIT DATA EMPLOYEE</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/upd_prof.php method="post" enctype="multipart/form-data" id=validate>
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Full Name</label>                                  
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control required value="<?PHP echo $data_tam['nama_depan'] ?>" name="nd"> 
                  </div>
<!--                   <div class="col-lg-4 col-md-4">
                    <input class=form-control required value="<?PHP echo $data_tam['nama_tengah'] ?>" name="nt"> 
                  </div> -->                  
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control required value="<?PHP echo $data_tam['nama_belakang'] ?>" name="nb"> 
                  </div>                                                 
                </div>
                <!-- End .form-group  -->                 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Email</label>
                    <div class="col-lg-2 col-md-4">
                    <input class="form-control tip" readonly id=email type=email value="<?PHP echo $data_tam['email_karyawan'] ?>">
                    </div>
                  <div class="col-lg-2 col-md-4">
                    <input class=form-control readonly value="<?PHP echo $data_tam['no_pegawai'] ?>">
                  </div>                                     
                </div>
                <!-- End .form-group  -->

          <div class=page-header><h4><small></small></h4></div>

                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Birth Date</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>
                      <div class="col-lg-5 col-md-5">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="ttl" value="<?PHP echo $data_tam['ttl_karyawan'] ?>">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                      </div>
                      <label class="col-lg-2 col-md-2 col-sm-12 control-label">Place</label>                   
                      <div class="col-lg-4 col-md-4">
                        <input class=form-control required value="<?PHP echo $data_tam['tempat_lahir'] ?>" placeholder="Balikpapan"name="tl">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Martial Status</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                  
                   <div class="col-lg-5 col-md-5">
                        <select class="form-control select2" name="ms">
                          <option value="<?PHP echo $data_tam['martial_status'] ?>"><?PHP echo $data_tam['martial_status'] ?>
                          <option value="Single">Single
                          <option value="Married">Married
                          <option value="Divorce">Divorce              
                        </select>
                    </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">SEX</label>
                  <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="sex">
                          <option value="<?PHP echo $data_tam['sex'] ?>"><?PHP echo $data_tam['sex'] ?>           
                          <option value="Male">Male
                          <option value="Female">Female             
                        </select>
                    </div>
                    </div>
                  </div>                                        
                </div>
                <!-- End .form-group  -->                
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Spouse Name</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                  
                  <div class="col-lg-5 col-md-5">
                    <input class=form-control required value="<?PHP echo $data_tam['spouse_name'] ?>" name="spo"> 
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Child</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required value="<?PHP echo $data_tam['no_child'] ?>" name="noc"> 
                  </div>
                    </div>
                  </div>                  
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Emergency Call</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                  
                   <div class="col-lg-5 col-md-5">
                        <select class="form-control select2" name="eca">
                          <option value="<?PHP echo $data_tam['emergency_contact'] ?>"><?PHP echo $data_tam['emergency_contact'] ?>
                          <option value="Daddy">Daddy
                          <option value="Mother">Mother
                          <option value="Brother / Sister">Brother / Sister
                          <option value="Husband / Wife">Husband / Wife
                          <option value="Others">Others             
                        </select>
                    </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Phone</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required value="<?PHP echo $data_tam['emergency_phone'] ?>" name="pnu"> 
                  </div>
                    </div>
                  </div>                  
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">NPWP</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                  
                  <div class="col-lg-5 col-md-5">
                    <input class=form-control readonly value="<?PHP echo $data_tam['npwp'] ?>" name="npwp"> 
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">BPJS</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly value="<?PHP echo $data_tam['bpjs'] ?>" name="bpjs"> 
                  </div>
                    </div>
                  </div>                  
                </div>
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">ID Employee</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                   
                    <div class="col-lg-5 col-md-5">
                        <select class="form-control select2" readonly name="ide">
                          <option value="<?PHP echo $data_tam['id_type'] ?>"><?PHP echo $data_tam['id_type'] ?>
                          <option value="KTP">KTP
                          <option value="SIM">SIM
                          <option value="PASSPORT">PASSPORT             
                        </select>
                    </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">ID No</label>
                  <div class="col-lg-4 col-md-4">
                      <input class="form-control tip" readonly value="<?PHP echo $data_tam['id_no'] ?>" name="idem">
                    </div>
                    </div></div>                   
                </div>
                <!-- End .form-group  -->                                                                       
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Address</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                   
                  <div class="col-lg-11 col-md-11">
                    <textarea class=form-control rows=3 placeholder="Jalan Kura-Kura Ninja" name="almt"><?PHP echo $data_tam['alamat_karyawan'] ?></textarea> 
                  </div>
                  </div></div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Country</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                   
                    <div class="col-lg-5 col-md-5">
                      <select class="form-control select2" name="ngr">
                        <option value="<?PHP echo $data_tam['negara_karyawan'] ?>"><?PHP echo $data_tam['negara_karyawan'] ?>  
                        <?PHP include ("negara.php"); ?>
                        </select>
                    </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Region</label>
                  <div class="col-lg-4 col-md-4">
                      <input class="form-control tip" value="<?PHP echo $data_tam['propinsi_karyawan'] ?>" name="prpns"> 
                    </div>
                  </div></div>                    
                </div>
                <!-- End .form-group  -->                                       
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">City</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                  
                    <div class="col-lg-5 col-md-5">
                      <input class="form-control tip" value="<?PHP echo $data_tam['kota_karyawan'] ?>" name="kta">
                    </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Postal</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" value="<?PHP echo $data_tam['kodepos_karyawan'] ?>" placeholder="76123" name="kp">
                  </div>
                  </div></div>                    
                </div>                    
                <!-- End .form-group  -->   
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Phone</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                  
                  <div class="col-lg-5 col-md-5">
                    <input class="form-control tip" value="<?PHP echo $data_tam['telpon_karyawan'] ?>" placeholder="home" name="tlp">
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Mobile</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" required value="<?PHP echo $data_tam['mobile_karyawan'] ?>" placeholder="Mobile" name="mob">
                  </div>
                  </div></div>                  
                </div>        
                <!-- End .form-group  -->       
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Photo</label>
                  <div class="col-lg-6 col-md-6">
                    <input type=file name="nama_file">
                    <input type="hidden" class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type="hidden" class=form-control readonly value="<?PHP echo $today ?>" name="dat">
                    <input type="hidden" class=form-control readonly value="<?PHP echo $nopeg ?>" name="nik">
                  </div>
                </div>
                <!-- End .form-group  -->                                      
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-6 col-md-6">
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

        <div class="col-lg-12">
          <!-- Start col-lg-12 -->
          <div class="panel panel-default panelClose toggle">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4>CHANGE PASSWORD</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/pass_reset.php enctype="multipart/form-data" method="post" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Username</label>
                    <div class="col-lg-7 col-md-7">
                      <input class=form-control readonly value="<?PHP echo $data_tam['email_karyawan'] ?>" name="id">
                    </div>              
                </div>                
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Change Password</label>
                  <div class="col-lg-7 col-md-7">
                    <input id=password-metter type=password class=form-control placeholder="Enter your password" name="pword">
                    <span class="help-block mt10"><a href=# id=generate-password class="btn btn-default">Generate</a> <a href=# id=show-password class="btn btn-default">Show password</a> <span id=output-message class="badge p10 ml15">Enter some password</span></span></div>
                </div>
                <!-- End .form-group  -->                                                                     
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <button type=submit class="btn btn-primary">CHANGE</button>
          
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
<?PHP   }  else { header("Location: error_page.php"); } ?>