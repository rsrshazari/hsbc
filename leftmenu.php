
<div class="vertical-menu">

    <div data-simplebar class="h-100">
      <div style="text-align:center;width:70px;height:70px;margin:20px auto 10px;overflow:hidden">
<img src="patientZoneCMSAdmin/src/assets/img/<?php echo $logo ?>" alt="" style="width:70px">
</div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <!--<li class="menu-title" key="t-menu">Menu</li>-->
                <li ><a href="dashboard.php" class="waves-effect"><i class="bx bxs-dashboard"></i><span key="t-dashboards">Dashboard</span></a></li>
                <li><a href="profile.php" class=" waves-effect"><i class='bx bxs-user'></i><span key="t-layouts">Profile</span>  </a>  </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-pages">Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                         <li><a href="viewpage.php" key="t-product-detail"> All Pages</a></li>
                          <li><a href="addpage.php" key="t-products">Add New</a></li>
                        <li><a href="viewhomepage.php" key="t-products">Home </a></li>
                          <li><a href="viewcontact.php" key="t-products">Contact </a></li>



                    </ul>
                </li>

  <li><a href="settings.php" key="t-products">  <i class="bx bx-cog"></i>Settings</a></li>
  <li><a href="logout.php" key="t-product-detail">  <i class="bx bx-lock"></i>Log Out</a></li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
