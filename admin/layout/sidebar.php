<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li <?php if(empty($_GET)) echo 'class="active"' ;?>>
                      <a class="" href="<?php echo ADMIN ;?>index.php">
                          <i class="icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li <?php if(!empty($_GET) && $_GET['modules'] == "users") echo 'class="active"' ;?>>
                      <a class="" href="<?php echo ADMIN ;?>index.php?modules=users&&action=index">
                          <i class="icon-book"></i>
                          <span>Users</span>
                      </a>
                  </li>
                  <li <?php if(!empty($_GET) && ($_GET['modules'] == "bahaya" || $_GET['modules'] == "aman")) echo 'class="active"' ; else echo 'class="sub-menu"' ;?>>
                      <a href="javascript:;" class="">
                          <i class="icon-th"></i>
                          <span>Data</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo ADMIN ;?>index.php?modules=bahaya&&action=index">Data Kriminal</a></li>
                          <li><a class="" href="<?php echo ADMIN ;?>index.php?modules=aman&&action=index">Data Titik Aman</a></li>
                      </ul>
                  </li>
                  <li <?php if(!empty($_GET) && $_GET['modules'] == "feedback") echo 'class="active"' ;?>>
                      <a class="" href="<?php echo ADMIN ;?>index.php?modules=feedback&&action=index">
                          <i class="icon-envelope"></i>
                          <span>Feedback</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->