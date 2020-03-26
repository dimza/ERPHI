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
    
    $ab= mysql_query("select * from accountBank");
    $ab2 = mysql_fetch_array($ab);
    $ab3 = $ab2['id_aBank']+'1';
  
  if ($kd_role == "1") {

    $tab="ADD-BANK";    

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
              <h4>ADD ACCOUNT BANK</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_accBank.php method="post" id="validate">
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-6 control-label">Company</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $comp= mysql_query("select * from company order by id_company asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="com">';
                        echo '<option value="">SELECT';
                  
                          While($comp2= mysql_fetch_assoc($comp))
                        {
                          echo '<option value="'.$comp2['kode_company'].'">';
                          echo $comp2['nama_company'];
                          echo '</option>';
                        }
                
                        echo '</select>';
                      ?>
                    </div>                                      
                  <div class="col-lg-5 col-md-5">
                    <input class=form-control readonly value="<?PHP echo $ab3 ?>" name="ab">
                  </div>
                  </div>
                    </div>
                  </div>                  
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Currency</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                  
                <div class="col-lg-6 col-md-6">
                      <?PHP $mu= mysql_query("select * from currency order by simbol asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="mu">';
                        echo '<option value="">CURRENCY';
                  
                          While($mu2= mysql_fetch_assoc($mu)) {

                            echo '<option value="'.$mu2['id_currency'].'">';
                            echo $mu2['simbol'].' - '.$mu2['negara'];
                            echo '</option>';
                                                              }
                        echo '</select>';
                      ?></div>
                      <div class="col-lg-5 col-md-5">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="tgl" value="<?PHP echo $today ?>">
                          <input type="hidden" class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                          <input type="hidden" class=form-control readonly value="<?PHP echo $today ?>" name="dat">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                  </div>
                    </div>                                          
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-6 control-label">Name of Bank</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                                      
                  <div class="col-lg-6 col-md-6">
                    <input class=form-control placeholder="Mandiri Bank" name="nb">
                  </div>
                  <div class="col-lg-5 col-md-5">
                    <input class=form-control placeholder="Account Number" name="an">
                  </div>                  
                  </div>
                    </div>
                  </div>                  
                <!-- End .form-group  -->                                                  
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                  <div class="col-lg-8 col-md-8">
                    <div class=row>                   
                  <div class="col-lg-11 col-md-11">
                    <textarea class=form-control rows=4 placeholder="New bank bussiness for" name="rmk"></textarea> 
                  </div>
                  </div>
                    </div>                  
                </div>
                <!-- End .form-group  -->                                            
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-8 col-md-8">
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