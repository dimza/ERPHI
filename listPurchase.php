<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
    $peg = $data_tampil['nama_pegawai'];
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);

    $var = @$_GET['kd'];
    $alrt = @$_GET['al'];    

    $today = date("l jS \of F Y h:i:s A"); 	
	
	if ($kd_role == "1") {	

    $tab="CURRENCY";    

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
      <div class=row>
        <!-- Start .row -->
       <div class=col-lg-12>
          <div class="bs-callout bs-callout-info fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <h4>Info</h4>
            <p>Mohon maaf, untuk modul ini masih dalam proses maintenance.</p>
          </div>
        </div>
      </div> 
      <!-- End .row -->      
      <div class=row>
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->

            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a name of currency. <a href="sys/engine/delCurrency.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a name of currency.
            </div>             
            
            <?PHP break; default: }?> 

          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>INTERNAL PURCHASE LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id=datatable>
                <thead>
                  <tr>
                    <th>Tittle 
                    <th>Company
                    <th>Status
                    <th>Created Date
                    <th>Owner                  
                    <th class="text-center"><i class="im-cog"></i>								
                <tbody>					
					        <?PHP 

                    $pi= mysql_query("select * from purchaseint where vis='0' order by idPurchaseInt asc");
		
						          While($pi2= mysql_fetch_assoc($pi)) 

                      {							
								        echo '<tr class="odd gradeX">';								
								        echo '<td>'.$pi2['tittle'];
								        echo '<td>'.$pi2['idCompany'];
								        echo '<td>'.$pi2['status'];
                        echo '<td>'.$pi2['modDate'];
                        echo '<td>'.$pi2['modUser'];                       
                        echo '<td class="text-center"><a href="editPurchaseInt.php?kd='.$pi2["idPurchaseInt"].'" target="_Blank"><i class="en-pencil"></i></a> | ';                
								        echo '<a href="sys/engine/delCurrency.php?kd='.$pi2["idPurchaseInt"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$pi2["tittle"].'&&swch=1" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';								
							        }
					        ?> 					
                <tfoot>
                  <tr>
                    <th><a href=#myModal role=button data-toggle=modal><button type=button class="btn btn-sm btn-primary">CREATE ORDERS</button></a>	
<!--                     <th>
                    <th> -->
                    <!-- <th> -->
<!--                     <th style="text-align: right;">              
                      <div class=btn-group>
                        <button type=button class="btn btn-sm btn-primary">EXPORT</button>
                        <button type=button class="btn btn-sm btn-primary dropdown-toggle" data-toggle=dropdown><span class=caret></span> <span class=sr-only>Toggle Dropdown</span></button>
                        <ul class=dropdown-menu role=menu>
                          <li style="text-align: left;"><a href=#>PDF</a></li>
                          <li style="text-align: left;"><a href=#>Excel</a></li>
                        </ul>
                      </div> -->
                    <!-- <th> -->				
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
                  <h4 class=modal-title>Create New Purchase Details</h4>
                </div>
                <div class=modal-body>

            <div class=panel-body>
              <form class="form-horizontal" role=form action=sys/engine/input_currency.php method="post" id=validate>
                <div class="form-group">
                  <label class="col-lg-2 col-md-4 col-sm-12 control-label">Currency Name</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required placeholder="Rupiah" name="cn"> 
                  </div>
                  <div class="col-lg-2 col-md-2">
                    <input class=form-control readonly value="<?PHP echo $cur3 ?>" name="cc">
                  </div>                  
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-4 col-sm-12 control-label">Symbol</label>
                  <div class="col-lg-2 col-md-2">
                    <input class="form-control tip" placeholder="IDR" name="sym">
                    <input type="hidden" class=form-control value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type="hidden" class=form-control value="<?PHP echo $today ?>" name="dat">
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <select class="form-control select2" name="ngr">
                      <option value="">SELECT COUNTRY 
                        <?PHP include ("negara.php"); ?>
                    </select>
                  </div>                  
                </div>        
                <!-- End .form-group  -->                                                                           
              
            </div>               

                </div>
                <div class=modal-footer>
                  <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                  <button type=button class="btn btn-primary">Add</button>
                  </form>
                </div>
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
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>