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
                  <li id="toggle-sidebar-li"><a href=# id="toggle-sidebar"><i class=en-arrow-left2></i></a></li>
                  <li><a href=# class=full-screen><i class=fa-fullscreen></i></a></li>
                  <li><a href=# id="toggle-header-area"><i class=ec-download></i></a></li>
              <!--<li class=dropdown><a href=# data-toggle=dropdown><i class=ec-cog></i></a>
                    <ul class=dropdown-menu role=menu>
                     <li><a href=#><i class=en-database></i> Add Country <span class=notification></span></a></li>
                     <li><a href=#><i class=st-cube></i> Add Region <span class="notification blue"></span></a></li>
                     <li><a href=#><i class=st-health></i> Add City <span class="notification yellow"></span></a></li>
                    </ul>
                  </li>-->         
                </ul>
        <ul class="nav navbar-nav pull-right">
<!--           <li class=dropdown><a href=# data-toggle=dropdown><i class=ec-mail></i><span class=notification>1</span></a>
            <ul class="dropdown-menu email" role=menu>
              <li class=mail-head>
                <div class=clearfix>
                  <div class=pull-left><a href=#><i class=ec-archive></i></a></div>
                  <span>Inbox</span>
                  <div class=pull-right><a href=#><i class=st-pencil></i></a></div>
                </div>
              </li>
              <li class="mail-list clearfix"><a href=#><img src=assets/img/avatars/ina.png class="mail-avatar pull-left" alt=avatar>
                <p class=name><span class=status><i class=en-dot></i></span> Aji Bayu Saputra <span class=notification></span> <span class=time>12:30 am</span></p>
                <p class=msg>I contact you regarding my account please can you set up my pass ...</p>
                </a></li>
              <li class=mail-more><a href=#>View all <i class=en-arrow-right7></i></a></li>
            </ul>
          </li>
		      <li class=dropdown>
            <a href=# data-toggle=dropdown>
              <i class=br-alarm></i> 
                <span class=notification>3</span>
            </a>
            <ul class="dropdown-menu notification-menu right" role=menu>
              <li class=clearfix><i class=ec-chat></i> <a href=# class=notification-user>Dimza</a> <span class=notification-action>Mengubah Data</span> <a href=# class=notification-link>Vendor</a></li>
              <li class=clearfix><i class=st-pencil></i> <a href=# class=notification-user>Dimza</a> <span class=notification-action>Menambahkan Data</span> <a href=# class=notification-link>Supplier</a></li>
              <li class=clearfix><i class=ec-trashcan></i> <a href=# class=notification-user>Dimza</a> <span class=notification-action>Menghapus Data</span> <a href=# class=notification-link>Invoice</a></li>
            </ul>
          </li> -->

          <?PHP
                $idu= $data_tampil['nama_pegawai'];

                $idu2= mysql_query("select * from employee where nama_depan='$idu'") or die(mysql_error());
                $idu3= mysql_result($idu2, 0, 'foto');
                $idu4= mysql_result($idu2, 0, 'nama_depan');
                $idu5= mysql_result($idu2, 0, 'nama_tengah');
                $idu6= mysql_result($idu2, 0, 'nama_belakang');

          ?>
		  
          <li class=dropdown>
            <a href=# data-toggle=dropdown>
              <?PHP

                  //$pic=$idu3;

                  //if($pic=="") { echo '<i class=im-user color-dark></i>';}
                  //else { echo '<img class=user-avatar src=assets/img/avatars/'.$pic.' >';}

              ?>

              <img class=user-avatar src=assets/img/ico/profile.png >

              <?PHP echo $idu4 ?> <?PHP echo $idu5 ?> <?PHP echo $idu6 ?>
            </a>
            <ul class="dropdown-menu right" role=menu>
              <li><a href=profile.php><i class=st-user></i> Profile</a></li>
              <li><a href=settings.php><i class=st-settings></i> Settings</a></li>
              <li><a href=index.php?idm=03b9dccb9f840822af6d4768c8194697&&dis=03b9dccb9f840822af6d4768c819469703b9dccb9f840822af6d4768c8194697&&online=0&&user=<?PHP echo $nopeg; ?>><i class=im-exit></i> Logout</a></li>
            </ul>
          </li>
          <li id="toggle-right-sidebar-li"><a href=# id="toggle-right-sidebar"><i class="ec-users"></i> <span class="notification">1</span></a></li>
        </ul>
      </nav>
    </div>
	
    <!-- Start #header-area -->
	
    <div id="header-area" class="fadeInDown">
      <div class="header-area-inner">
        <ul class="list-unstyled list-inline">
          <li><div class=shortcut-button><a href=list_group.php><i class="im-office color-red"></i> <span>GROUP</span></a></div></li>
          <li><div class=shortcut-button><a href=list_client.php><i class="st-diamond color-lime"></i> <span>CLIENT</span></a></div></li>
          <li><div class=shortcut-button><a href=list_supplier.php><i class="im-link color-dark"></i> <span>SUPPLIER</span></a></div></li> 
          <!-- <li><div class=shortcut-button><a href=listContact.php><i class="br-address-book color-brown"></i> <span>CONTACT</span></a></div></li> -->	  
          <li><div class=shortcut-button><a href=listLetter.php><i class="fa-envelope-alt color-orange"></i> <span>LETTER OUT</span></a></div></li>
          <li><div class=shortcut-button><a href=listPurchase.php><i class="im-cart color-magenta"></i> <span>PURCHASE</span></a></div></li>
          <!-- <li><div class=shortcut-button><a href=task.php><i class="im-calendar color-magenta"></i> <span>TASK</span></a></div></li>
          <li><div class=shortcut-button><a href=404.php><i class="st-user color-purple"></i> <span>ESS <span class=notification></span></span></a></div></li>
          <li><div class=shortcut-button><a href=404.php><i class="fa-cloud color-blue2"></i> <span>CLOUD DATA</span></a></div></li>          
          <li><div class=shortcut-button><a href=listCurrency.php><i class="im-coin color-blue2"></i> <span>CURRENCY</span></a></div></li> -->
        </ul>
      </div>
    </div>
	
    <!-- End #header-area -->
	
  </div>
  
  <!-- Start .header-inner -->
  
</div>

<!-- End #header