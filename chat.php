  <!-- Start .sidebar-inner -->
  <div class=sidebar-inner>
    <div class="sidebar-panel mt0">
      <div class="sidebar-panel-content fullwidth pt0">
        <div class=chat-user-list>
          <form class="form-horizontal chat-search" role=form>
            <div class=form-group>
              <input class=form-control placeholder="Search for user...">
              <button type=submit><i class="ec-search s16"></i></button>
            </div>
            <!-- End .form-group  -->
          </form>
          <ul class="chat-ui bsAccordion">
<!--             <li><a href=#>Favorites <span class="notification teal">4</span><i class=en-arrow-down5></i></a>
              <ul class=in>
                <li><a href=# class=chat-name><img class=chat-avatar src=assets/img/avatars/photo.jpg alt=@chadengle>Chad Engle <span class=has-message><i class=im-pencil></i></span></a> <span class="status online"><i class=en-dot></i></span></li>
                <li><a href=# class=chat-name><img class=chat-avatar src=assets/img/avatars/photo2.jpg alt=@alagoon>Anthony Lagoon</a> <span class="status offline"><i class=en-dot></i></span></li>
                <li><a href=# class=chat-name><img class=chat-avatar src=assets/img/avatars/photo3.jpg alt=@koridhandy>Kory Handy</a> <span class=status><i class=en-dot></i></span></li>
                <li><a href=# class=chat-name><img class=chat-avatar src=assets/img/avatars/ina.png alt=@divya>Divia Manyan</a> <span class=status><i class=en-dot></i></span></li>
              </ul>
            </li> -->
              <?PHP list($offline)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM user where online='1'")); ?>            
            <li><a href=1>Online <span class="notification green"><?PHP echo $offline; ?></span><i class=en-arrow-down5></i></a>
              <ul class=in>
                <?PHP 

                  $off= mysql_query("select * from user where online='1'");
                  
                    While($off2= mysql_fetch_assoc($off)) 

                      {

                        $nik=$off2['nopeg'];
                        $nik2= mysql_query("select * from employee where no_pegawai='$nik'") or die(mysql_error());
                        $nik3= mysql_result($nik2, 0, 'nama_depan');
                        $nik4= mysql_result($nik2, 0, 'nama_belakang');
                        $nik5= mysql_result($nik2, 0, 'foto');                                               

                        echo '<li><a href=# class=chat-name>';

                          if($nik5=="") { echo '<img class=chat-avatar src=assets/img/avatars/11.png>';}
                          else { echo '<img class=chat-avatar src=photo/avatar/'.$nik5.' >'; }

                        echo $nik3.' '.$nik4;
                        echo '</a> <span class="status online"><i class=en-dot></i></span></li>';  

                      }
                ?>
              </ul>
            </li>
              <?PHP list($offline2)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM user where online='0'")); ?>
            <li><a href=2>Offline <span class="notification red"><?PHP echo $offline2; ?></span><i class=en-arrow-down5></i></a>
              <ul>
                <?PHP 

                  $off3= mysql_query("select * from user where online='0'");
                  
                    While($off4= mysql_fetch_assoc($off3)) 

                      {

                        $nik6=$off4['nopeg'];
                        $nik7= mysql_query("select * from employee where no_pegawai='$nik6'") or die(mysql_error());
                        $nik8= mysql_result($nik7, 0, 'nama_depan');
                        $nik9= mysql_result($nik7, 0, 'nama_belakang');
                        $nik10= mysql_result($nik7, 0, 'foto');                                               

                        echo '<li><a href=# class=chat-name>';

                          if($nik10=="") { echo '<img class=chat-avatar src=assets/img/avatars/11.png>';}
                          else { echo '<img class=chat-avatar src=photo/avatar/'.$nik10.' >'; }

                        echo $nik8.' '.$nik9;
                        echo '</a> <span class=status offline><i class=en-dot></i></span></li>';  

                      }
                ?>
              </ul>
            </li>
          </ul>
        </div>
        <div class=chat-box>
          <h5>Still Not Ready Yet!</h5>
          <a id=close-user-chat href=1 class="btn btn-xs btn-primary"><i class=en-arrow-left4></i></a>
<!--           <ul class="chat-ui chat-messages">
            <li class=chat-user>
              <p class=avatar><img src=assets/img/avatars/11.png alt=@chadengle></p>
              <p class=chat-name>User satu <span class=chat-time>15 seconds ago</span></p>
              <span class="status online"><i class=en-dot></i></span>
              <p class=chat-txt>Hello Sugge check out the last order.</p>
              <hr>
            </li>
            <li class=chat-me>
              <p class=avatar><img src=assets/img/avatars/11.png alt=SuggeElson></p>
              <p class=chat-name>User Dua <span class=chat-time>10 seconds ago</span></p>
              <span class="status online"><i class=en-dot></i></span>
              <p class=chat-txt>Ok i will check it out.</p>
            </li>
            <li class=chat-user>
              <p class=avatar><img src=assets/img/avatars/11.png alt=@chadengle></p>
              <p class=chat-name>User Satu <span class=chat-time>now</span></p>
              <span class="status online"><i class=en-dot></i></span>
              <p class=chat-txt>Thank you, have a nice day</p>
            </li>
          </ul> -->
          <div class=chat-write>
            <form action=# class=form-horizontal role=form>
              <div class=form-group>
                <textarea name=sendmsg id=sendMsg class="form-control elastic" rows=1></textarea>
                <a role=button class=btn id=attach_photo_btn><i class="fa-picture s20"></i></a>
                <input type=file name=attach_photo id=attach_photo>
              </div>
              <!-- End .form-group  -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End .sidebar-inner -->