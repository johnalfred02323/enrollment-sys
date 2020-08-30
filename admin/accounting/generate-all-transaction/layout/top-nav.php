<!-- Start of Top Nav -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

           <!--  ////////////////////////////////////////// -->



           <!-- /// Nav Item - Alerts \\\ -->
            <!-- <li class="nav-item dropdown no-arrow mx-1">

              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-th fa-1x"></i>
              </a> -->

              <!-- /// Dropdown \\\ -->
              <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Other System
                </h6> -->

<!-- 
                
<div class="row-icon">
  <div class="column-icon">
    <div class="card-icon">
      <h5><i class="fas fa-file-alt icon"></i></h5>
      <p>Admission</p>
    </div>
  </div>

  <div class="column-icon">
    <div class="card-icon">
      <h5><i class="fas fa-file-invoice-dollar icon"></i></h5>
      <p>Accounting</p>
    </div>
  </div>
  
  <div class="column-icon">
    <div class="card-icon">
      <h5><i class="fas fa-file-signature icon"></i></h5>
      <p>Grading</p>
    </div>
  </div>
</div>

              </div>
            </li> -->



            <!--  ////////////////////////////////////////// -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown"><!-- OR <li class="nav-item dropdown no-arrow"> -->
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">GRC Admin</span>
                <img class="img-profile rounded-circle" src="../../../src/img/logo.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../profile/?ID=<?php echo $_SESSION['user'] ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Profile
                </a>
<!--                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#darkmode">
                  <i class="fa fa-adjust fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Dark Theme
                </a> -->
                <a class="dropdown-item" href="#">
                  <i class="fa fa-question-circle fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Help
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../src/logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
<!-- End of Top Nav -->


  <!-- dark mode Modal-->
  <div class="modal fade" id="darkmode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dark theme</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">

          
          Dark theme turns the light surfaces of the page dark, creating an experience ideal for night. Try it out!
          <br /><br />
          Your Dark theme setting will apply to this browser only.
          <br /><br />

<div class="modal-footer">
  DARK MODE:
        <div class="darktheme">
          <label class="switch-dark">
            <input type="checkbox" class="input-dark" id="darkSwitch" name="theme">
            <span class="slider-dark round" for="darkSwitch"></span>
          </label>
        </div>
</div>

        </div>
      </div>
    </div>
  </div>