<?php
include('../../config/config.php');
include('../../src/func.php');
if(isset($_COOKIE['userrole'])) :
$usertype = $_COOKIE['userrole'];
$stmt = $pdo_conn->prepare("SELECT * FROM notification WHERE message_for = :msg_for ORDER BY created_at DESC;");
$stmt->bindparam(':msg_for', $usertype, PDO::PARAM_STR, 12);
$stmt->execute();
// $total_notif = $stmt->fetchColumn();
// $data = $stmt->fetchAll();

$seen_count = $pdo_conn->prepare("SELECT seen FROM notification WHERE message_for = :msg_for AND seen = 0 ORDER BY created_at DESC;");
$seen_count->bindparam(':msg_for', $usertype, PDO::PARAM_STR, 12);
$seen_count->execute();
endif;

?>

<!-- Start of Top Nav -->
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>


  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!--  ////////////////////////////////////////// -->







    <!-- Nav Item - Alerts -->
    <?php if($usertype == 'Super Admin' && isset($_SESSION['usertype'])) : ?>

    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <?php if($seen_count->rowCount() > 0) : ?>
        <span class="badge badge-danger badge-counter notif-num"><?= $seen_count->rowCount(); ?></span>
        <?php endif; ?>
      </a>

      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" style="width:400px !important;">

        <h6 class="dropdown-header">Notification</h6>
        
        <div class="overflow-auto h-25" style="max-height: 544px !important;">
          <?php 
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) :
          ?>
          <a class="dropdown-item d-flex align-items-center <?php if($result['seen'] == 0) : ?>bg-notif<?php endif; ?>" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fas fa-user text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-600"><?= time_elapsed_string($result['created_at']); ?></div>
              <span class="font-weight-normal"><?= $result['message'] ?></span>
            </div>
          </a>
            <?php endwhile; ?>
        </div>
        
        <a class="dropdown-item text-center small text-primary" href="#">See All</a>
      </div>
    </li>
    <script>
      $('#alertsDropdown').click(function(){
        $.ajax({
          url:'process.php',
          method:'POST',
          data:{'update_seen':1,usertype:'<?php echo $usertype; ?>'},
          success:function(data) {
            $('.notif-num').addClass('d-none');
          }
        });
      });
    </script>
    <?php endif; ?>


    







    <!-- /// Nav Item - Alerts \\\ -->
    <li class="nav-item dropdown no-arrow mx-1">

      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <!-- <i class="fas fa-bell fa-fw"></i> --><i class="fas fa-th fa-1x"></i>
        <!-- /// Counter - Alerts \\\ -->
      </a>

      <!-- /// Dropdown \\\ -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
          Other System
        </h6>



<div class="row-icon">
<div class="column-icon">
<a class="text-decoration-none text-gray-600" href="../admission">
<div class="card-icon">
<h5><i class="fas fa-file-alt icon"></i></h5>
<p>Admission</p>
</div>
</a>
</div>

<div class="column-icon">
<a class="text-decoration-none text-gray-600" href="">
<div class="card-icon">
<h5><i class="fas fa-file-invoice-dollar icon"></i></h5>
<p>Accounting</p>
</div>
</a>
</div>

<div class="column-icon">
<a class="text-decoration-none text-gray-600" href="../registrar/">
<div class="card-icon">
<h5><i class="fas fa-folder-open"></i></h5>
<p>Registrar</p>
</div>
</div>
</a>
</div>

      </div>
    </li>






    <!--  ////////////////////////////////////////// -->


    <div class="topbar-divider d-none d-sm-block"></div>

    <li class="nav-item dropdown"><!-- OR <li class="nav-item dropdown no-arrow"> -->
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">GRC Admin</span>
                <img class="img-profile rounded-circle" src="../../src/img/logo.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile/?ID=<?php echo $_SESSION['user'] ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Profile
                </a>
              <a class="dropdown-item" href="manage-accounts">
                  <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Manage Accounts
                </a>
<!--                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#darkmode">
                  <i class="fa fa-adjust fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Dark Theme
                </a> -->
                <a class="dropdown-item" href="activity-logs/">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Activity Log
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pass-modal">
                  <i class="fa fa-adjust fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Lock Screen
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../src/logout.php">
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
