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
	  
	  $idOpty= mysql_query("select * from OPPORTUNITY order by opportunityId desc limit 1");
	  $idOpty2 = mysql_fetch_array($idOpty);
	  $idOpty3 = $idOpty2['opportunityId']+'1';
    $idOpty4 = 'OPTY-00-'.$idOpty3;
	
	if ($kd_role == "1") {	
		
    $tab="ADD-OPPORTUNITY";    

  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php");
  include ("date_format.php");   

  ?>

<!-- Start #content -->
<div id="content">
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
	<br>
    <!-- End .row -->
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->
        <div class="col-lg-6 col-md-12">
          <!-- col-lg-6 start here -->
          <div class=page-header>
            <h4>Opportunity Details</h4>
          </div>
          <div class="panel-group accordion" id=accordion>
            <div class="panel panel-default">
              <div class=panel-heading>
                <h5 class=panel-title><a class=accordion-toggle data-toggle=collapse href=#collapseOne>Collapsible Group Item #1</a></h5>
              </div>
              <div id=collapseOne class="panel-collapse collapse in">

            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/#.php method="post" enctype="multipart/form-data" id="validate">    
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description</label>
                  <div class="col-lg-6 col-md-6">
                    <input class=form-control required name="np"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <input class=form-control readonly value="<?PHP echo $idOpty4 ?>" name="kode">
                  </div>                  
                </div>
                <!-- End .form-group  -->
                <div class=page-header>
                  <h4><small></small></h4>
                </div>
                <!-- End .Page-header -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Client</label>
                      <div class="col-lg-4 col-md-4">
                      <?PHP $clie= mysql_query("select * from client order by id_client asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="client">';
                        echo '<option value="">SELECT';
                  
                          While($clie2= mysql_fetch_assoc($clie)) {

                            echo '<option value="'.$clie2['id_client'].'">';
                            echo $clie2['nama_client'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Contact</label>
                      <div class="col-lg-4 col-md-4">
                      <?PHP 

                        $con= mysql_query("select * from contact order by contactId");
            
                        echo '<select class="form-control select2" name="contact">';
                        echo '<option value="">SELECT';
                  
                          While($con2= mysql_fetch_assoc($con)) {

                            echo '<option value="'.$con2['contactId'].'">';
                            echo $con2['firstName'].' '.$con2['lastName'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Create Date</label>                     
                        <div class="col-lg-4 col-md-4">
                          <div class=input-group>
                            <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $today ?>">
                            <span class=input-group-addon><i class=fa-calendar></i></span>
                          </div>
                        </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Close Date</label>                      
                        <div class="col-lg-4 col-md-4">
                          <div class=input-group>
                            <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $today ?>">
                            <span class=input-group-addon><i class=fa-calendar></i></span>
                          </div>
                        </div>                   
                </div>
                <!-- End .form-group  -->  
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Estimated Value</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" name="value">
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Currency</label>
                      <div class="col-lg-4 col-md-4">
                      <?PHP $mu= mysql_query("select * from currency order by symbol asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="matauang">';
                        echo '<option value="">CURRENCY';
                  
                          While($mu2= mysql_fetch_assoc($mu)) {

                            echo '<option value="'.$mu2['idCurrency'].'">';
                            echo $mu2['symbol'].' - '.$mu2['nation'];
                            echo '</option>';
                                                              }
                        echo '</select>';
                      ?>
                    </div>                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Won Precentage %</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" placeholder="10-90%" name="prpns">
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Type</label>
                      <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="sts">
                          <option value="">SELECT
                          <option value="10">PRODUCTS</option>
                          <option value="11">SERVICES</option>
                          <option value="15">PRODUCTS & SERVICES</option>                                                   
                        </select>
                    </div>                    
                </div>
                <!-- End .form-group  --> 
                 <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Status</label>
                      <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="sts">
                          <option value="">SELECT
                          <option value="10">OPEN</option>
                          <option value="11">ON PROGRESS</option>
                          <option value="15">DO DELIVERY</option>
                          <option value="14">INVOICE</option>
                          <option value="13">CLOSE</option>
                          <option value="12">EXPIRED</option>                                                    
                        </select>
                    </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Owner</label>
                      <div class="col-lg-4 col-md-4">
                      <?PHP $emp= mysql_query("select * from employee order by id_karyawan asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="sales">';
                        echo '<option value="">SELECT';
                  
                          While($emp2= mysql_fetch_assoc($emp)) {

                            echo '<option value="'.$emp2['no_pegawai'].'">';
                            echo $emp2['nama_depan'].' '.$emp2['nama_tengah'].' '.$emp2['nama_belakang'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>                    
                </div>
                <!-- End .form-group  -->
                 
                <div class=page-header>
                  <h4><small></small></h4>
                </div>
                <!-- End .Page-header -->                                                                                   
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Note</label>
                  <div class="col-lg-10 col-md-10">
                    <textarea class=form-control rows=4 name="rmk"></textarea> 
                  </div>
                </div>
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div style="margin-left:40%; margin-top:2%; margin-bottom:2%;">
                    <button type=submit class="btn btn-sm btn-primary">UPDATE OPPORTUNITTY</button>

                  </div>
                </div>
                <!-- End .form-group  -->
              </form>
            </div>                  

              </div>
            </div>
            <div class="panel panel-default">
              <div class=panel-heading>
                <h5 class=panel-title><a class=accordion-toggle data-toggle=collapse href=#collapseTwo>Collapsible Group Item #2</a></h5>
              </div>
              <div id=collapseTwo class="panel-collapse collapse">
                <div class=panel-body>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class=panel-heading>
                <h5 class=panel-title><a class=accordion-toggle data-toggle=collapse href=#collapseThree>Collapsible Group Item #3</a></h5>
              </div>
              <div id=collapseThree class="panel-collapse collapse">
                <div class=panel-body>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
              </div>
            </div>
          </div>
        </div>
        <!-- col-lg-6 end here -->
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
<script src=assets/js/pages/elements.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>