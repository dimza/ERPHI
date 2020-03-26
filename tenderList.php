<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
    $peg = $data_tampil['nama_pegawai'];
    $spc= $data_tampil['spc'];    
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);

    $var = @$_GET['kd'];
    $alrt = @$_GET['al'];   

	if ($kd_role == "1") {	

    $tab="EMPLY";    

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
    <div class="row">
      <!-- Start .row -->
      <!-- Start .page-header -->
      <div class="col-lg-12 heading">
        <br>
        <!-- Start .bredcrumb -->
        <ul id="crumb" class="breadcrumb">
        </ul>
        <!-- End .breadcrumb -->
      </div>
      <!-- End .page-header -->
    </div>
    <!-- End .row --> 	
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->

  <?PHP //include ("info.php"); ?> 

      <div class=row>
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          
            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a Reference No. <a href="sys/engine/delTender.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a Reference No.
            </div>             
            
            <?PHP break; default: }?>          

          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>TENDER LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable">
                <thead>
                  <tr>
                    <th>Reference No
                    <th>Client
                    
                    <th>Status				
                    <th>Company
                    <th>Expired					
                    
                    <th><i class="im-cog"></i>			
                <tbody>					
					      <?PHP 

                  $tdr = mysql_query
                    
                    ("select * from TENDER where vis='0' order by tenderId");
		
						      While($tdr2= mysql_fetch_assoc($tdr))
							
                    {
								        
                        echo '<tr class="odd gradeX">';								
								        echo '<td><a href="tenderView.php?kd='.$tdr2["tenderId"].'" target="_Blank">'.$tdr2['referenceNo'];
								        echo '</a>';

                          $clnt=$tdr2['clientId'];
                          $clnt2= mysql_query("select * from `client` where id_client='$clnt'") or die(mysql_error());
                          $clnt3= mysql_result($clnt2, 0, 'nama_client');

                        echo '<td>'.$clnt3;        
                        
                          $st=$tdr2['statusTender'];

                            if ($st== '111') { 

                              echo '<td>'.'<span class="label label-success">WIN</span>';

                            } else if ($st== '112'){ 

                              echo '<td>'.'<span class="label label-warning">REVIEWING</span>';

                            } else if ($st== '113'){ 

                              echo '<td>'.'<span class="label label-danger">LOSE</span>';

                            }                       

                          $todays_date = date("y-m-d");
                          $close_date = $tdr2['closeDate'];

                          $today = strtotime($todays_date); 
                          $expiration_date = strtotime($close_date); 
                            
                            // if ($expiration_date >= $today) { 

                            //   echo '<td>'.'<span class="label label-success">OPEN</span>';

                            // } else { 

                            //   echo '<td>'.'<span class="label label-danger">CLOSE</span>';

                            // }

                          echo '<td>'.$tdr2['companyId'];

                          $hari= $expiration_date-$today;

                            if ($hari >= '0') { 

                              echo '<td>'.'<button class="btn btn-xs btn-success btn-alt">'.floor($hari/(60*60*24)).' days</button>';

                            } else { 

                              echo '<td>'.'<button class="btn btn-xs btn-danger btn-alt">close</button>';

                            }



                        //echo '<td>'.'<span class="label label-success">'.$tdr2['statusTender'].'</span>';

                          $sal=$tdr2['salesCall'];
                          $sal4= mysql_query("select * from `employee` where no_pegawai='$sal'") or die(mysql_error());
                          $sal5= mysql_result($sal4, 0, 'nama_depan');

                        //echo '<td>'.$sal5.' '.$sal6;
                        echo '<td style="text-align: right;"><a href="tenderView.php?kd='.$tdr2["tenderId"].'" target="_Blank"><i class="fa-edit"></i></a> | ';
								        echo '<a href="sys/engine/delTender.php?kd='.$tdr2["tenderId"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$tdr2["referenceNo"].'&&swch=1" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';								
							      }
					      ?> 					
                <tfoot>
                  <tr>
                    <th><a href=#myModal role=button data-toggle=modal><button type=button class="btn btn-sm btn-primary">ADD TENDER</button></a>	
<!--                <th>
                    <th>
                    <th>
                    
                    <th style="text-align: right;">              
                      <div class=btn-group>
                        <button type=button class="btn btn-sm btn-primary">EXPORT</button>
                        <button type=button class="btn btn-sm btn-primary dropdown-toggle" data-toggle=dropdown><span class=caret></span> <span class=sr-only>Toggle Dropdown</span></button>
                        <ul class=dropdown-menu role=menu>
                          <li style="text-align: left;"><a href=#>PDF</a></li>
                          <li style="text-align: left;"><a href=#>Excel</a></li>
                        </ul>
                      </div> -->				
              </table>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->
      </div>

        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <!-- Button to trigger twitter bootstrap modal -->
          <!-- <a href=#myModal role=button class="btn btn-alt btn-danger mb25" data-toggle=modal>Launch TinyMCE in bootstrap modal</a> -->
          <!-- Modal itself -->
          <div class="modal fade" id="myModal" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add Tender Details</h4>
                </div>
                <div class=modal-body>
                  <!-- content in modal, tinyMCE 4 texarea -->
                <br>
                
                <form class="form-horizontal" role=form action=sys/engine/tenderInput.php method="post" enctype="multipart/form-data" id="validate">
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Ref. Number</label>                 
                  <div class="col-lg-2 col-md-8">
                    <input class=form-control required name="rn"> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tittle Tender</label>                 
                  <div class="col-lg-2 col-md-8">
                    <input class=form-control required name="tt"> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <hr>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Costumer</label>
                    <div class="col-lg-4 col-md-6">
                      <?PHP $clie= mysql_query("select * from client order by id_client");
            
                        echo '<select class="form-control select2" name="cln">';
                        echo '<option value="">SELECT';
                  
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
                    <div class="col-lg-4 col-md-6">
                      <?PHP 

                          $comp= mysql_query("select * from company order by nama_company asc");
            
                        echo '<select class="form-control select2" name="com" onchange="showDmn(this.value)">';
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Currency</label>
                    <div class="col-lg-4 col-md-6">
                      <?PHP $mu= mysql_query("select * from currency order by symbol");
            
                        echo '<select class="form-control select2" name="cur">';
                        echo '<option value="">SELECT';
                  
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Owner</label>
                    <div class="col-lg-4 col-md-6">
                      <?PHP $emp= mysql_query("select * from employee order by id_karyawan");
            
                        echo '<select class="form-control select2" name="sl">';
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
                <hr>                
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Open Date</label> 
                  <?PHP $today = date("Y-m-d"); ?>                
                  <div class="col-lg-2 col-md-4">
                    <div class=input-group>
                      <input class="form-control datetime-picker2" name="od" value="<?PHP echo $today ?>">
                      <span class=input-group-addon><i class=fa-calendar></i></span>
                    </div> 
                  </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Close Date</label>                 
                  <div class="col-lg-2 col-md-4">
                    <div class=input-group>
                      <input class="form-control datetime-picker2" name="cd" value="<?PHP echo $today ?>">
                      <span class=input-group-addon><i class=fa-calendar></i></span>
                    </div>
                  </div>                                    
                </div>
                <!-- End .form-group  -->

                <hr>               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                  <div class="col-lg-2 col-md-10">
                    <textarea class=form-control rows=3 name="rmk"></textarea> 
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Document</label>
                  <div class="col-lg-4 col-md-10">
                    <input type=file name="nama_file">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="dt">
                    <input type=hidden class=form-control readonly value="<?PHP echo $nopeg ?>" name="usr">
                  </div>
                </div>
                <!-- End .form-group  -->                

                <br>
                <div class=modal-footer>
                  <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                  <button type=submit class="btn btn-primary">ADD</button>
                </form>
                </div>
                </div>
<!--                 <div class=modal-footer>
                  <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                  <button type=button class="btn btn-primary">ADD</button>
                  </form>
                </div> -->
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!-- col-lg-12 end here -->
      
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
<!-- Javascripts -->
<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete this part?")) {
    document.location = delUrl;
  }
}
</script>
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
<script src=assets/js/pages/data-tables.js></script>
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>