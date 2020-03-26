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

    $ca= mysql_query("select * from ca order by id_ca desc limit 1");
    $ca2 = mysql_fetch_array($ca);
    $ca3 = $ca2['id_ca']+'1';    
  
  if ($kd_role == "1") {

    $tab="PO-FORM";    
  
    include ("head_meta.php");    
    
?>

<body>

<?PHP 

include ("header.php");
include ("sidebar.php"); 

  $kode= @$_GET['kd'];
        
  $tam= mysql_query("select * from `ca` where id_ca='$kode'");
  $data_tamp = mysql_fetch_array($tam);

        $cn= $data_tamp['currency_no'];

        $cn2= mysql_query("select * from currency where idCurrency='$cn'") or die(mysql_error());
        $cn3= mysql_result($cn2, 0, 'description');
        $cn4= mysql_result($cn2, 0, 'symbol');          

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
              <h4>ADD ASSETS FORM</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/ubah_current.php enctype="multipart/form-data" method="post" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Assets Number</label>
                  <div class="col-lg-6 col-md-6">
                    <input class=form-control readonly value="<?PHP echo $kode ?>" name="an">
                  </div>
                </div>                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
                    <div class="col-lg-6 col-md-6">
                      <input class="form-control tip" placeholder="Personal Computer, DELL Optiplex 980" value="<?PHP echo $data_tamp['assets_name'] ?>" name="desc">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $emp= mysql_query("select * from company order by id_company asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="com">';
                        echo '<option value="">SELECT';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['id_company'].'">';
                            echo $emp2['nama_company'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>              
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Type of Assets</label>
                    <div class="col-lg-6 col-md-6">
                      <select class="form-control select2" name="tpe">
                        <option value="value="<?PHP echo $data_tamp['type'] ?>""><?PHP echo $data_tamp['type'] ?>
                        <option value="LAND">LAND</option>
                        <option value="RESIDENCE">RESIDENCE</option>
                        <option value="VEHICLE">VEHICLE</option>
                        <option value="OFFICE DEVICES">OFFICE DEVICES</option>
                        <option value="OTHERS">OTHERS</option>
                      </select>                    
                    </div>
                </div>
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Value</label>
                    <div class="col-lg-6 col-md-6">
                      <input class="form-control tip" placeholder="6500" value="<?PHP echo $data_tamp['value'] ?>" name="val">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Currency</label>
                    <div class="col-lg-6 col-md-6">
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Details of Assets</label>
                    <div class="col-lg-6 col-md-6">
                      <textarea class=form-control rows=5 name="rmk" placeholder="keterangan tambahan.."><?PHP echo $data_tamp['remark'] ?></textarea>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Upload Picture</label>
                  <div class="col-lg-10 col-md-10">
                    <input type=file name="nama_file">
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Record Date</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>
                      <div class="col-lg-6 col-md-6">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $data_tamp['date'] ?>">
                          <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                          <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="user">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
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