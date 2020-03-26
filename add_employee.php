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
	  
	  $emp= mysql_query("select * from employee order by no_pegawai desc limit 1");
	  $emp2 = mysql_fetch_array($emp);
	  $emp3 = $emp2['no_pegawai']+'1';
	
	if ($kd_role == "1") {	

    $tab="ADD EMP";    

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
              <h4>ADD NEW EMPLOYEE</h4>
            </div>
            <div class=panel-body>
              <form class="form-horizontal" role=form action="sys/engine/input_emp.php" method="post" enctype="multipart/form-data" id="validate">
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">First Name</label>                 
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required placeholder="first" name="nd"> 
                  </div>
<!--              <div class="col-lg-2 col-md-2">
                    <input class=form-control placeholder="middle" name="nt"> 
                  </div> -->
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Last Name</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required placeholder="last" name="nb"> 
                  </div>                                    
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                    <div class="col-lg-4 col-md-4">
                      <?PHP $comp= mysql_query("select * from company order by id_company asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="com" onchange="showDmn(this.value)">';
                        echo '<option value="">SELECT';
                  
                          While($comp2= mysql_fetch_assoc($comp)) {

                            echo '<option value="'.$comp2['id_company'].'">';
                            echo $comp2['nama_company'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">ID Employee</label>
                    <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly value="<?PHP echo $emp3 ?>" name="en">
                    </div>
                </div>
                <!-- End .form-group  -->                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Email</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control" placeholder="firstname.lastname" name="eml">
                    <input type="hidden" class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                    <input type="hidden" class=form-control readonly value="<?PHP echo $today ?>" name="dat">
                  </div>
                   <div class="col-lg-4 col-md-4" id="txtHint"></div>                  
                </div>        
                <!-- End .form-group  -->

          <div class=page-header>
            <h4><small></small></h4>
          </div>

                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Job Tittle</label>
					         <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="jt">
                          <option value="">SELECT</option>
                          <option value="5185">CEO</option>
                          <option value="5186">Manager HRD &amp; GA</option>
                          <option value="5187">Supervisor HRD &amp; GA</option>
                          <option value="5188">Staff HRD</option>
                          <option value="5189">Staff GA</option>
                          <option value="5190">Manager Finance &amp; Accounting</option>
                          <option value="5191">Supervisor Accounting</option>
                          <option value="5192">Staff Accounting</option>
                          <option value="5193">Supervisor Finance</option>
                          <option value="5194">Staff Finance</option>
                          <option value="5195">Manager Sales &amp; Marketing</option>
                          <option value="5196">Supervisor Sales &amp; Marketing</option>
                          <option value="5197">Staff Sales</option>
                          <option value="5198">Staff Marketing</option>
                          <option value="5199">Manager IT</option>
                          <option value="5200">Supervisor IT</option>
                          <option value="5201">Staff IT</option>
                        </select>
                    </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Level</label>
                   <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" disabled name="sta">
                          <option value="">SELECT         
                            <option value="1253">CEO</option>
                            <option value="1254">Manager</option>
                            <option value="1255">Supervisor</option>
                            <option value="1256">staff</option>           
                        </select>
                    </div>                    
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Salary</label>                  
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly placeholder="IDR Only" name="bsc"> 
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Meals/Transport</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly placeholder="IDR Only" name="mls"> 
                  </div>                
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">NPWP</label>                 
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required placeholder="Tax Number" name="npwp"> 
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Jamsostek</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly placeholder="Jamsostek Number" name="bpjs"> 
                  </div>                 
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Join Date</label>
                      <div class="col-lg-4 col-md-4">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="jd">
                          <span class=input-group-addon><i class=fa-calendar></i></span></div>
                        </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Status</label>
                   <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" readonly name="sta">
                          <option value="">SELECT         
                            <option value="1253">Internship</option>
                            <option value="1254">Contract</option>
                            <option value="1255">Staff</option>
                            <option value="1256">Probation</option>           
                        </select>
                    </div>                                            
                </div>
                <!-- End .form-group  -->                                  

          <div class=page-header>
            <h4><small></small></h4>
          </div>

                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Birth Place</label>
                      <div class="col-lg-4 col-md-4">
                        <input class=form-control required placeholder="Place of Birth" name="tl">                      
                        </div> 
                        <label class="col-lg-2 col-md-2 col-sm-12 control-label">Birth Date</label>                   
                      <div class="col-lg-4 col-md-4">
                        <div class=input-group>
                          <input class="form-control datetime-picker2" name="ttl">
                          <span class=input-group-addon><i class=fa-calendar></i></span>
                        </div>                        
                      </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Martial Status</label>
                   <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="ms">
                          <option value="">SELECT           
                          <option value="Single">Single
                          <option value="Married">Married
                          <option value="Divorce">Divorce             
                        </select>
                    </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">SEX</label>  
                   <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="sex">
                          <option value="">SELECT           
                          <option value="Male">Male
                          <option value="Female">Female             
                        </select>
                    </div>                    
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Spouse Name</label>                  
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly placeholder="Full Name" name="spo"> 
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Child</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly placeholder="No of Children" name="noc"> 
                  </div>                  
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Emergency Call</label>                 
                   <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="eca">
                          <option value="">SELECT           
                          <option value="Daddy">Daddy
                          <option value="Mother">Mother
                          <option value="Brother / Sister">Brother / Sister
                          <option value="Husband / Wife">Husband / Wife
                          <option value="Others">Others              
                        </select>
                    </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Phone</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required placeholder="Phone Number" name="pnu"> 
                  </div>                  
                </div>
                <!-- End .form-group  -->                                 
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">ID Employee</label>
                    <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" name="ide">
                          <option value="">SELECT           
                          <option value="KTP">KTP
                          <option value="SIM">SIM
                          <option value="PASSPORT">PASSPORT             
                        </select>
                    </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">No</label>
                    <div class="col-lg-4 col-md-4">
                      <input class="form-control tip" required placeholder="id number" name="idem">
                    </div>                    
                </div>
                <!-- End .form-group  -->

          <div class=page-header>
            <h4><small></small></h4>
          </div>
                                                                         				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Address</label>
                  <div class="col-lg-10 col-md-10">
                    <textarea class=form-control rows=3 placeholder="Jalan Kura-Kura Ninja" name="almt"></textarea> 
                  </div>
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Country</label>
                    <div class="col-lg-4 col-md-4">
                      <select class="form-control select2" name="ngr">
                        <option value="">SELECT  
                          <?PHP include ("negara.php"); ?>
                        </select>
                    </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Region</label>
                    <div class="col-lg-4 col-md-4">
                      <input class="form-control tip" placeholder="Region" name="prpns">
                    </div>                    
                </div>
                <!-- End .form-group  -->                                				
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">City</label>
					          <div class="col-lg-4 col-md-4">
					            <input class="form-control tip" placeholder="City" name="kta">
                    </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Postal Code</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" placeholder="Postal Code" name="kp">
                  </div>                    
                </div>                    
                <!-- End .form-group  -->		
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Phone</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" placeholder="Home" name="tlp">
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Mobile</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control tip" required placeholder="Mobile" name="mob">
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
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label"></label>
                  <div style="margin-left:40%; margin-top:2%; margin-bottom:2%;">
                    <button type=submit class="btn btn-sm btn-primary">SAVE EMPLOYEE</button>
                    <!-- <button type=submit class="btn btn-sm btn-primary">SAVE AND ADD EMPLOYEE</button> -->
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
<script>
function showDmn(str) {
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
  xmlhttp.open("GET","sys/engine/getdmn.php?q="+str,true);
  xmlhttp.send();
}
</script>
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