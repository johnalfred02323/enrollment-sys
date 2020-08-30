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
    <a class="text-decoration-none text-gray-600" href="">
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
  <a class="text-decoration-none text-gray-600" href="../../grading/">
    <div class="card-icon">
      <h5><i class="fas fa-file-signature icon"></i></h5>
      <p>Grading</p>
    </div>
  </div>
  </a>
</div>

              </div>
            </li>



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
				<a class="dropdown-item" href="../manage-accounts">
                  <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Manage Accounts
                </a>
                <a class="dropdown-item" href="../activity-logs/">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Activity Log
                </a>
                
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pass-modal">
                  <i class="fa fa-adjust fa-sm fa-fw mr-2 text-gray-700 icon-hover"></i>
                  Lock Screen
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


<!-- Modal -->
<div class="modal fade bg-white" id="pass-modal" tabindex="-1" role="dialog" aria-labelledby="passcode" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content shadow-none border-none">
      <div class="modal-header border-0 d-flex justify-content-center">
        <img class="modal-title" id="passcode" src="../../../login/img/logo-name.png" style="width: 450px; height: auto;">
      </div>      
      <div class="modal-body border-0">
        
      <p><i class="fas fa-info-circle"></i> Enter your account password to continue.</p>
      <small style="color: red"><b id="attemptlbl" style="display: none">Login Attempts: </b></small>
      <small style="color: red"><b id="attemptcount" style="display: none">0</b></small>
      <div id="passdiv" class="form-group">
        <input id="passlock" spellcheck=false class="form-control" type="password" size="18" alt="login" required="">
          <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">Password</label>
              <errorp>
                Password is required
                  <i>   
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path d="M0 0h24v24h-24z" fill="none"/>
                      <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                  </i>
              </errorp>
      </div>

      </div>
      <div class="modal-footer border-0">
        <button type="button" class="save" id="login"><i class="fas fa-key"></i> Continue</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
  var count = 0;
  $(document).on('click', '#login', function(){
    var username = '<?php echo $_SESSION['user']; ?>';
    var password = $('#passlock').val();
    var passdiv = $('#passdiv');
    var passlbl = $('errorp');
    if(password == '')
    {
      passdiv.attr('errr','');
    }
    else
    {
    $.ajax({   
           url:"../process.php", 
           method:"POST",  
           data:{"login":1,username:username,password:password},  
           success:function(data)  
           {  
                if(data == 0)
                {
                  $('#pass-modal').modal('hide');
                  count = 0;
                  $('#attemptlbl').hide();
                  $('#attemptcount').hide();
                  $('#attemptcount').text('0');
                  $('#passlock').val('');
                }
                else
                {
                  $('#attemptlbl').show();
                  $('#attemptcount').show();
                  count = Number(count) + Number(data);
                  $('#attemptcount').text(count);
                  passdiv.attr('errr','');
                  passlbl.html('Password is Incorrect');
                }
           }  
        });  
    }
  });

    $('#pass-modal').on('shown.bs.modal', function () {
    window.onbeforeunload = function () {
      return "Do you really want to close?";
    };
    });
    $('#pass-modal').on('hide.bs.modal', function () {
      window.onbeforeunload = null;
    });
});
</script>
