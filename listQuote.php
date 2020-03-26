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

    $tab="QTS";    

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
  <div class="content-wrapper">
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
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a quote No. <a href="sys/engine/hapus_penawaran.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a quote No.
            </div>             
            
            <?PHP break; default: }?>          
          
          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->                   
            <div class="panel-heading white-bg">
              <h4>INQUIRY LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id=datatable>
                <thead>
                  <tr>
                    <th>Quote No.
                    <!-- <th>Client                     
                    <th>Reference No. -->
                    <th>Value
                    <!-- <th class="text-center">Rate -->
                    <!-- <th class="text-center">Tax -->                                       
                    <th>Status
                    <!-- <th>Created Date -->
                    <th>Sales Call                             
                    <th><i class="im-cog"></i>      
                <tbody>         
                <?PHP 

                  $qt= mysql_query("select * from quote where vis='0' order by id_quote asc limit 0, 10001");
    
                  While($qt2= mysql_fetch_assoc($qt))
              {
                echo '<tr class="odd gradeX">';               
                echo '<td><a href="viewQuote.php?qo='.$qt2["quote_no"].'" target="_Blank">'.$qt2['quote_no'];

                          $cno=$qt2['client_no'];
                          $cno2= mysql_query("select * from `client` where id_client='$cno'") or die(mysql_error());
                          $cno3= mysql_result($cno2, 0, 'nama_client');

                //echo '<td>'.$cno3;
                //echo '<td>'.$qt2['reference_no'];
                          
                          $nq=$qt2['quote_no'];
                          $pjk=$qt2['tax']; 
                          $sum = mysql_query("SELECT sum(sub_price) FROM quote_list WHERE quote_no='$nq'") or die(mysql_error());
                          while ($rows = mysql_fetch_array($sum)) {

                          $th= $rows['sum(sub_price)'];
                          $tax2= $pjk/100;
                          $thg= $th*$tax2;
                          $thg2= $th+$thg;

                        }

                          $kurs=$qt2['currency_no'];
                          $kurs2= mysql_query("select * from `currency` where idCurrency='$kurs'") or die(mysql_error());
                          $kurs3= mysql_result($kurs2, 0, 'symbol');

                echo '<td>'.$kurs3.' - '.number_format("$thg2",0);                
                //echo '<td class="text-center">'.$kurs3;                                                  
                //echo '<td class="text-center">'.$qt2['tax'].' %';                
                echo '<td>';

                    include __DIR__ . '/sys/engine/quote_stat.php';                              

                //echo '<td>'.$qt2['date'];

                          $sal=$qt2['quote_no'];
                          $sal2= mysql_query("select * from `tlquote` where noQuote='$sal'") or die(mysql_error());
                          $sal3= mysql_result($sal2, 0, 'salesQuote');

                          $sal4= mysql_query("select * from `employee` where no_pegawai='$sal3'") or die(mysql_error());
                          $sal5= mysql_result($sal4, 0, 'nama_depan');
                          $sal6= mysql_result($sal4, 0, 'nama_belakang');

                echo '<td>'.$sal5.' '.$sal6;
                echo '<td>';
                echo '<a href="editQuote.php?kd='.$qt2["quote_no"].'" target="_Blank"><i class="fa-edit"></i></a> | ';
                //include __DIR__ . '/include/button/actionEdit.php';
                echo '<a href="sys/engine/hapus_penawaran.php?kd='.$qt2["id_quote"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$qt2["quote_no"].'&&swch=1" onclick=\'return confirm("Are you sure want to delete '.$qt2["quote_no"].' ?")\'><i class="fa-trash"></i></a>';
                //include __DIR__ . '/include/button/actionDelete.php';                 
              }
          ?>          
                <tfoot>
                  <tr>
                    <th><a href=#myModal role=button data-toggle=modal><button type=button class="btn btn-sm btn-primary">CREATE INQUIRY</button></a>
                      <!-- <a href="addQuote.php" target="_Blank"><button type=button class="btn btn-sm btn-primary">ADD QUOTE</button></a> --> 
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
                      </div>  -->       
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
                  <h4 class=modal-title>Add Inquiry Details</h4>
                </div>
                <div class=modal-body>
                  <!-- content in modal, tinyMCE 4 texarea -->
                <br>
                
                <form class="form-horizontal" role=form action=sys/engine/input_quote.php method="post" enctype="multipart/form-data" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Ref. Number</label>
                    <div class="col-lg-2 col-md-10">
                      <input class="form-control required" placeholder="no bidding / no inquiry" name="referensi">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <hr>                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Costumers</label>
                    <div class="col-lg-2 col-md-6">
                      <?PHP $clie= mysql_query("select * from client order by id_client");
            
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
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $comp= mysql_query("select * from company order by nama_company asc");
            
                        echo '<select class="form-control select2" name="company" onchange="showQts(this.value)">';
                        echo '<option value="">SELECT';
                  
                          While($comp2= mysql_fetch_assoc($comp)) {

                            echo '<option value="'.$comp2['id_company'].'">';
                            echo $comp2['nama_company'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-4 col-md-4" id="txtHint"></div>                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Sales Call</label>
                    <div class="col-lg-6 col-md-6">
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

                <hr>

                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">TAX</label>
                    <div class="col-lg-2 col-md-4">
                      <input type=checkbox class="switch noStyle" name="pajak" id=switch value="10">
                    </div>                                    
                    <div class="col-lg-2 col-md-5">
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Days</label>
                    <div class="col-lg-2 col-md-2">
                      <input class=form-control id=number placeholder="0" name="hari">
                      <input type="hidden" class=form-control value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="user">
                      <input type="hidden" class=form-control value="<?PHP echo $today ?>" name="tgl">
                    </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>                      
                        <div class="col-lg-2 col-md-5">
                          <div class=input-group>
                            <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $today ?>">
                            <span class=input-group-addon><i class=fa-calendar></i></span>
                          </div>
                        </div>
                </div>
                <!-- End .form-group  -->

                <hr>

                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-2 col-md-10">
                      <textarea class=form-control rows=2 name="remark" placeholder="additional info"></textarea>
                    </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Upload Doc.</label>
                  <div class="col-lg-8 col-md-8">
                    <input type=file name="file_doc">
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
function showQts(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sys/engine/getqts.php?q="+str,true);
  xmlhttp.send();
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
<?PHP   }  else { header("Location: error_page.php"); } ?>