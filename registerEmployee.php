<?PHP 
 
	require_once(__DIR__.'/sys/db_con/db.php');

    $emp= mysql_query("select * from employee order by no_pegawai desc limit 1");
    $emp2 = mysql_fetch_array($emp);
    $emp3 = $emp2['no_pegawai']+'1';      

        $alrt = @$_GET['alrt'];
        $nd = @$_GET['nd'];
        $nb = @$_GET['nb'];
        $en = @$_GET['en'];

?>

<!DOCTYPE html>
<html lang=en>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
<meta charset=utf-8>
<title>ABM | Register Employees</title>
<!-- Mobile specific metas -->
<meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1">
<!-- Force IE9 to render in normal mode -->
<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
<meta name=author content=>
<meta name=description content="sprFlat admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework">
<meta name=keywords content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap">
<meta name=application-name content="sprFlat admin template">
<!-- Import google fonts - Heading first/ text second -->
<link rel=stylesheet type=text/css href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Droid+Sans:400,700">
<!--[if lt IE 9]>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- Css files -->
<link rel=stylesheet href=assets/css/main.min.css>
<!-- Fav and touch icons -->
<link rel=apple-touch-icon-precomposed sizes=144x144 href=assets/img/ico/apple-touch-icon-144-precomposed.png>
<link rel=apple-touch-icon-precomposed sizes=114x114 href=assets/img/ico/apple-touch-icon-114-precomposed.png>
<link rel=apple-touch-icon-precomposed sizes=72x72 href=assets/img/ico/apple-touch-icon-72-precomposed.png>
<link rel=apple-touch-icon-precomposed href=assets/img/ico/apple-touch-icon-57-precomposed.png>
<link rel=icon href=assets/img/ico/logo02.png type=image/png>
<!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
<meta name=msapplication-TileColor content=#3399cc>

<body>

Start #header -->

<div id="header">
  <div class=container-fluid>
    <div class=navbar>
      <div class="navbar-header">
        <a class=navbar-brand href=dashboard.php>
          <!-- <i class="im-stack text-logo-element animated bounceIn"></i> -->
          <img style="margin: 5px 5px 10px 20px;" width="25" height="30" src=assets/img/logo01.png>
            <span class=text-logo>ABM GROUP</span><span class=text-slogan></span></a></div>
              <nav class=top-nav role=navigation>
                <ul class="nav navbar-nav pull-left">
                  <li id="toggle-sidebar-li">
                    <a href=# id="toggle-sidebar"><i class=en-arrow-left2></i></a>
                  </li>
                  <li>
                    <a href=# class=full-screen><i class=fa-fullscreen></i></a>
                  </li>        
                </ul>
        <ul class="nav navbar-nav pull-right">

          </ul>
      </nav>
    </div>
  
    <!-- Start #header-area -->
  
    <!-- End #header-area -->
  
  </div>
  
  <!-- Start .header-inner -->
  
</div>

<!-- End #header

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

            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully registered your Data Employee, Thanks <strong><?PHP echo $nd; ?> <?php echo $nb ?></strong> your Employee Id is <strong><?PHP echo $en ?></strong>
            </div>                        
            
            <?PHP break; default: }?>

        <div class=col-lg-12>
          <div class="bs-callout bs-callout-info fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <h4>Info</h4>
            <p>Silahkan mengisi Data diri personal anda. Pastikan semua kolom terisi jika tidak silahkan diberi angka "0".</p>
          </div>
        </div>
      </div>
      <!-- End .row -->

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
              <form class="form-horizontal" role=form action="sys/engine/inputEmployee.php" method="post" enctype="multipart/form-data" id="validate">
                
                <!-- Nama Depan -->  
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">First Name</label>                 
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required placeholder="first" name="nd"> 
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Last Name</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control required placeholder="last" name="nb"> 
                  </div>                                    
                </div>
                <!-- End .form-group  -->                                
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Email</label>
                  <div class="col-lg-4 col-md-4">
                    <input class="form-control" placeholder="text@domain.com" name="eml">
                    <input type="hidden" class=form-control readonly value="<?PHP echo $today ?>" name="dat">
                  </div>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">ID Employee</label>
                    <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly value="<?PHP echo $emp3 ?>" name="en">
                    </div>                                    
                </div>        
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Company</label>
                    <div class="col-lg-4 col-md-6">
                      <?PHP $comp= mysql_query("select * from company order by id_company asc limit 0, 10");
            
                        echo '<select class="form-control select2" name="com">';
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

          <div class=page-header>
            <h4><small></small></h4>
          </div>

<!--                 <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Job Tittle</label>
					         <div class="col-lg-4 col-md-4">
                        <select class="form-control select2" disabled name="jt">
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
                </div> -->
                <!-- End .form-group  -->
<!--                 <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Salary</label>                  
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly placeholder="IDR Only" name="bsc"> 
                  </div>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Meals/Transport</label>
                  <div class="col-lg-4 col-md-4">
                    <input class=form-control readonly placeholder="IDR Only" name="mls"> 
                  </div>                
                </div> -->
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
                        <select class="form-control select2" disabled name="sta">
                          <option value="">SELECT         
                            <option value="1253">Internship</option>
                            <option value="1254">Contract</option>
                            <option value="1255">Staff</option>          
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
