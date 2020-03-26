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

  
  if ($kd_role == "1") {  

    include ("head_meta.php");  
    
?>

<body>

<?PHP include ("header.php"); ?>
<?PHP include ("sidebar.php"); ?>

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
              <h4>EDIT INVENTORY</h4>
            </div>
            <div class=panel-body>

              <?PHP 

                $kd2= @$_GET['kd'];
                $rol2= @$_GET['rol'];

                switch ($rol2) { case '100':

                    $id_inv= mysql_query("select * from inventory where noreg_inv='$kd2'");
                    $id_inv2 = mysql_fetch_array($id_inv);
                    $id_inv3 = $id_inv2['reference_no'];
                    $id_inv4 = $id_inv2['po_out'];
                    $id_inv5 = $id_inv2['nama_barang'];
                    $id_inv6 = $id_inv2['jumlah'];
                    $id_inv7 = $id_inv2['unit'];
                    $id_inv8 = $id_inv2['date'];
                    $id_inv9 = $id_inv2['remark'];                    

              ?>

              <form class="form-horizontal " role=form action=sys/engine/input_inventory.php enctype="multipart/form-data" method="post" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">noreg. Inventory</label>
                  <div class="col-lg-10 col-md-10">
                    <input class=form-control readonly value="<?PHP echo $kd2 ?>" name="kr">
                  </div>
                </div>  
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">no. PO-Out</label>
                    <div class="col-lg-10 col-md-10">
                      <input class=form-control readonly value="<?PHP echo $id_inv4 ?>" name="kr">
                    </div>
                </div>
                <!-- End .form-group  -->                   
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Reference No.</label>
                    <div class="col-lg-10 col-md-10">
                      <input class="form-control tip" value="<?PHP echo $id_inv3 ?>" name="trek">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Goods</label>
                    <div class="col-lg-10 col-md-10">
                      <input class=form-control readonly value="<?PHP echo $id_inv5 ?>" name="kr">
                    </div>
                </div>
                <!-- End .form-group  -->                                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Quantity</label>
                    <div class="col-lg-5 col-md-5">
                      <input class="form-control tip" value="<?PHP echo $id_inv6 ?>" name="jml">
                    </div>
                    <div class="col-lg-2 col-md-2">
                      <input class="form-control tip" value="<?PHP echo $id_inv7 ?>" name="unt">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Date</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>
                      <div class="col-lg-4 col-md-4">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $id_inv8 ?>">                           
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->                                                               
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Photo</label>
                  <div class="col-lg-6 col-md-6">
                    <input type=file name="nama_file">
                    <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                  </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-10 col-md-10">
                      <textarea class=form-control rows=2 name="rmk"><?PHP echo $id_inv9 ?></textarea>
                    </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div class="col-lg-10 col-md-10">
                    <button type=submit class="btn btn-primary">UPDATED</button>
          
                  </div>
                </div>
                <!-- End .form-group  -->
              </form>              

              <?PHP break; ?>

              <?PHP case '200': 

                    $id_inv= mysql_query("select * from inventory where noreg_inv='$kd2'");
                    $id_inv2 = mysql_fetch_array($id_inv);
                    $id_inv3 = $id_inv2['reference_no'];
                    $id_inv4 = $id_inv2['po_out'];
                    $id_inv5 = $id_inv2['nama_barang'];
                    $id_inv6 = $id_inv2['jumlah'];
                    $id_inv7 = $id_inv2['unit'];
                    $id_inv8 = $id_inv2['date'];
                    $id_inv9 = $id_inv2['remark'];
                    $id_inv10 = $id_inv2['company_no'];
                    $id_inv11 = $id_inv2['supplier_no'];
                    $id_inv12 = $id_inv2['client_no'];
                    $id_inv13 = $id_inv2['goods_no'];
                    $id_inv14 = $id_inv2['nama_barang'];

                    $coms= mysql_query("select * from `company` where kode_company='$id_inv10'") or die(mysql_error());
                    $coms2= mysql_result($coms, 0, 'nama_company');

                    $coms3= mysql_query("select * from `supplier` where noreg_supplier='$id_inv11'") or die(mysql_error());
                    $coms4= mysql_result($coms3, 0, 'nama_supplier');

                    $coms5= mysql_query("select * from `client` where id_client='$id_inv12'") or die(mysql_error());
                    $coms6= mysql_result($coms5, 0, 'nama_client');                    

              ?>
                    
              <form class="form-horizontal " role=form action=sys/engine/input_inv2.php enctype="multipart/form-data" method="post" id=validate>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">noreg. Inventory</label>
                  <div class="col-lg-6 col-md-6">
                    <input class=form-control readonly value="<?PHP echo $kd2 ?>" name="kr">
                  </div>
                </div>  
                <!-- End .form-group  -->                 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Reference No.</label>
                    <div class="col-lg-6 col-md-6">
                      <input class="form-control tip" value="<?PHP echo $id_inv3 ?>" name="trek">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $comp= mysql_query("select * from company order by id_company asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="comp">';
                        echo '<option value="'.$id_inv10.'">'.$coms2.'';
                  
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Client</label>
                    <div class="col-lg-6 col-md-6">
                      <?PHP $clie= mysql_query("select * from client order by id_client asc limit 0, 100");
            
                        echo '<select class="form-control select2" name="clnt">';
                        echo '<option value="'.$id_inv12.'">'.$coms6.'';
                  
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Supplier</label>
          <div class="col-lg-6 col-md-6">
            <?PHP $clie= mysql_query("select * from supplier order by id_supplier asc limit 0, 10001");
            
                echo '<select class="form-control select2" name="sup">';
                echo '<option value="'.$id_inv11.'">'.$coms4.'';
                  
                  While($clie2= mysql_fetch_assoc($clie))
                {
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Goods</label>
          <div class="col-lg-6 col-md-6">
                      <?PHP $tampil_barang= mysql_query("select * from goods order by id_goods asc limit 0, 10001");
            
                              echo '<select class="form-control select2" name="brg">';
                              echo '<option value="'.$id_inv13.'">'.$id_inv14.'';
                  
                                While($tampil_barang2= mysql_fetch_assoc($tampil_barang))
                                  
                                  {

                                    echo '<option value="'.$tampil_barang2['id_goods'].'">';
                                    echo $tampil_barang2['description_goods'];
                                    echo '</option>';
                                  }
                
                                    echo '</select>';
                      ?>
                </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Quantity</label>
                    <div class="col-lg-5 col-md-5">
                      <input class="form-control tip" value="<?PHP echo $id_inv6 ?>" name="jml">
                    </div>
                    <div class="col-lg-2 col-md-2">
                      <input class="form-control tip" value="<?PHP echo $id_inv7 ?>" name="unt">
                    </div>
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Date</label>
                  <div class="col-lg-10 col-md-10">
                    <div class=row>
                      <div class="col-lg-4 col-md-4">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="tanggal" value="<?PHP echo $id_inv8 ?>">
                          <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                          <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End .form-group  -->                                                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Photo</label>
                  <div class="col-lg-6 col-md-6">
                    <input type=file name="nama_file">
                  </div>
                </div>                
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                    <div class="col-lg-6 col-md-6">
                      <textarea class=form-control rows=4 name="rmk"><?PHP echo $id_inv9 ?></textarea>
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

              <?PHP break; ?>

              <?PHP default: ?>
                    error
              <?PHP break; } ?>



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
<script>
function showItm(str) {
  if (str=="") {
    document.getElementById("txtHint2").innerHTML="";
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
      document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sys/engine/getitm.php?q="+str,true);
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
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->
<?PHP   }  else { header("Location: error_page.php"); } ?>