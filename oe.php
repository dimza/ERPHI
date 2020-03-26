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
    
    $today = date("j/m/Y");     
  
  if ($kd_role == "1") {  

    $tab="EXPENSES D2D";    
  
    include ("head_meta.php");

?>

<body>

<?PHP include ("header.php"); ?>
<?PHP include ("sidebar.php"); ?>

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

                      <?php
            

                        $sum = mysql_query("SELECT sum(value) FROM billExpenses WHERE cost_code='7001' && rate='501'") or die(mysql_error());
                        while ($rows = mysql_fetch_array($sum)) 

                        { $cc2= $rows['sum(value)']; }

                        $sum2 = mysql_query("SELECT sum(value) FROM billExpenses WHERE cost_code='7002' && rate='501'") or die(mysql_error());
                        while ($rows = mysql_fetch_array($sum2)) 

                        { $cc3= $rows['sum(value)']; }

                        $sum3 = mysql_query("SELECT sum(value) FROM billExpenses WHERE cost_code='7003' && rate='501'") or die(mysql_error());
                        while ($rows = mysql_fetch_array($sum3)) 

                        { $cc4= $rows['sum(value)']; }                                              

                        $sum4 = mysql_query("SELECT sum(value) FROM billExpenses WHERE cost_code='7001' && rate='502'") or die(mysql_error());
                        while ($rows = mysql_fetch_array($sum4)) 

                        { $cc5= $rows['sum(value)']; }

                        $sum5 = mysql_query("SELECT sum(value) FROM billExpenses WHERE cost_code='7002' && rate='502'") or die(mysql_error());
                        while ($rows = mysql_fetch_array($sum5)) 

                        { $cc6= $rows['sum(value)']; }

                        $sum6 = mysql_query("SELECT sum(value) FROM billExpenses WHERE cost_code='7003' && rate='502'") or die(mysql_error());
                        while ($rows = mysql_fetch_array($sum6)) 

                        { $cc7= $rows['sum(value)']; }
                      
                      ?>      

      <div class=row>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><a href=#>
          <div class="tile default">
            <!-- tile start here -->
            <div class=tile-icon>IDR</div>
            <div class=tile-content>
              <div class=number><?PHP echo $cc2; ?></div>
              <h3>SDHTM.TRD</h3>
            </div>
          </div></a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><a href=#>
          <div class="tile default">
            <!-- tile start here -->
            <div class=tile-icon>IDR</div>
            <div class=tile-content>
              <div class=number><?PHP echo $cc3; ?></div>
              <h3>SDHTM.CO</h3>
            </div>
          </div></a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><a href=#>
          <div class="tile default">
            <!-- tile start here -->
            <div class=tile-icon>IDR</div>
            <div class=tile-content>
              <div class=number><?PHP echo $cc4; ?></div>
              <h3>SDHTM.MISC</h3>
            </div>
          </div></a>
        </div>
      </div>

      <div class=row>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><a href=#>
          <div class="tile default">
            <!-- tile start here -->
            <div class=tile-icon>USD</div>
            <div class=tile-content>
              <div class=number><?PHP echo $cc5; ?></div>
              <h3>SDHTM.TRD</h3>
            </div>
          </div></a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><a href=#>
          <div class="tile default">
            <!-- tile start here -->
            <div class=tile-icon>USD</div>
            <div class=tile-content>
              <div class=number><?PHP echo $cc6; ?></div>
              <h3>SDHTM.CO</h3>
            </div>
          </div></a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12"><a href=#>
          <div class="tile default">
            <!-- tile start here -->
            <div class=tile-icon>USD</div>
            <div class=tile-content>
              <div class=number><?PHP echo $cc7; ?></div>
              <h3>SDHTM.MISC</h3>
            </div>
          </div></a>
        </div>
      </div>

      <div class=row>
        <!-- Start .row -->      
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          
            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a PO Out No. <a href="sys/engine/del_oe.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a Description.
            </div>             
            
            <?PHP break; default: }?>           
          
          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>OPERATION EXPENSES DAY TO DAY LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id=datatable>
                <thead>
                  <tr>
                    <!-- <th>Bills No. -->
                    <th>Description
                    <th>Employee
                    <th>Value                                                             
                    <!-- <th>Verify by -->
                    <th>Payment
                    <!-- <th>Cost Code -->                     
                    <!-- <th>Created Date -->          
                    <th><i class="im-cog"></i>      
                <tbody>
                <?PHP 

                  $qt= mysql_query("select * from billExpenses where vis='0' order by id_oe asc limit 0, 10001");
    
                    While($qt2= mysql_fetch_assoc($qt))
                      
                      {

                        echo '<tr class="odd gradeX">';               
                        //echo '<td>'.$qt2['id_oe'];
                        echo '<td><a href="view_oe.php?kd='.$qt2["id_oe"].'" target="_Blank">'.$qt2['description'];

                          $empl=$qt2['name_user'];
                          $empl2= mysql_query("select * from `employee` where no_pegawai='$empl'") or die(mysql_error());
                          $empl3= mysql_result($empl2, 0, 'nama_depan');
                          $empl33= mysql_result($empl2, 0, 'nama_belakang');

                        echo '<td>'.$empl3.' '.$empl33;

                          $kurs=$qt2['rate'];
                          $kurs2= mysql_query("select * from `currency` where idCurrency='$kurs'") or die(mysql_error());
                          $kurs3= mysql_result($kurs2, 0, 'symbol');

                          $vl=$qt2['value'];

                        echo '<td>'.number_format("$vl",0);                        

                          $empl4=$qt2['name_verify'];
                          $empl5= mysql_query("select * from `employee` where no_pegawai='$empl4'") or die(mysql_error());
                          $empl6= mysql_result($empl5, 0, 'nama_depan');

                        //echo '<td>'.$empl6;

                          include __DIR__ . '/sys/engine/oe_stat.php';

                          $cc=$qt2['cost_code'];
                          $cc2= mysql_query("select * from `cost_code` where noreg_cost='$cc'") or die(mysql_error());
                          $cc3= mysql_result($cc2, 0, 'description');                          

                        //echo '<td>'.$cc3;                               
                        // echo '<td>'.$qt2['modified_date'];
                        echo '<td><a href="edit_oe.php?kd='.$qt2["id_oe"].'" target="_Blank"><i class="en-pencil"></i></a> | ';
                        echo '<a href="sys/engine/del_oe.php?kd='.$qt2["id_oe"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$qt2["description"].'&&swch=1" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';                 
                      }
                ?>                      
                <tfoot>
                  <tr>
                    <th><a href="add_expenses.php" target="_Blank"><button type=button class="btn btn-sm btn-primary">ADD EXPENSES</button></a> 
<!--                <th>
                    <th>
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
      
      <!-- Page End here -->
    </div>
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
<script src=assets/js/pages/data-tables.js></script>
<!-- Google Analytics:  -->
<?PHP   }  else { header("Location: error_page.php"); } ?>