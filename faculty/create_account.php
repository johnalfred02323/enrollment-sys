<?php
// header('Location: ../404');
?>
<!DOCTYPE html>
<html lang="en" class="scroll">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

   <!-- Favicon -->
  <link rel="icon" href="../src/img/logo.png" type="image/gif" sizes="32x32">

  <!-- Font Roboto -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <!-- <link href="offline-icon/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Vibur" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="src/css/admin.css" rel="stylesheet">
  <link href="src/css/dark-mode-admin.css" rel="stylesheet">

  <!-- My CSS -->
  <link href="src/css/custom-error.css" rel="stylesheet">
  <link href="src/css/main.css" rel="stylesheet">
  <script src="../src/vendor/jquery/jquery-3.3.1.min.js"></script>
<title>GRC System | Create Faculty Account</title>
<style type="text/css">
.cont {
  width: 300px;
  height: auto;
  margin: 100px auto;
}
.cc {
  width: 800px;
  height: auto;
  margin: 0 auto;
}
#footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  text-align: center;
  height: 4em;
  letter-spacing: 2px;
  color:  #999;
  font-size: 14px;
  font-family: Open Sans, sans-serif ;
}
@media screen and (max-width: 600px) {
  .cont {
  width: 100%;
  margin: 0 auto;
  padding: 10px 0;
}

.cc {
  width: 100%;
  margin: 0 auto;
  margin-bottom: 150px;
}

#footer {
    font-size: 12px;
  }
}
</style>
</head>
<body>
<div class="wrapper">
  <div class="cont">
    <div class="conn">
        <div class="grc-logo">
          <img src="src/img/logo-name.png" alt="GRC Logo" width="100%;" />
          <h5><center>Faculty Portal</center></h5>
        </div>
    </div>
  </div>
  <div class="cc">
    <div class="card shadow-sm">
      <div class="card-header">Create Account</div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">

            <div id="cf_f" class="form-group">
              <input id="firstname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
                    <error_cff>
                      First Name is required
                        <i>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24h-24z" fill="none"/>
                            <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                          </svg>
                        </i>
                    </error_cff>
            </div>



            <div id="cf_l" class="form-group">
              <input id="lastname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="lastname" class="float-label" style="font-family:Arial, FontAwesome">Last Name</label>
                    <error_cfl>
                      Last Name is required
                        <i>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24h-24z" fill="none"/>
                            <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                          </svg>
                        </i>
                    </error_cfl>
            </div>



            <div id="cf_m" class="form-group">
              <input id="middlename" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="middlename" class="float-label" style="font-family:Arial, FontAwesome">Middle Name</label>
                    <error_cfm>
                      Middle Name is required
                        <i>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24h-24z" fill="none"/>
                            <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                          </svg>
                        </i>
                    </error_cfm>
            </div>

            <div id="cf_cn" class="form-group">
              <input type="text" id="contact_num" spellcheck=false class="form-control" type="text" maxlength="13" alt="login" required="" value="+639">
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="contact_num" class="float-label" style="font-family:Arial, FontAwesome">Contact Number</label>
                    <error_cfcn>
                      <span>Contact Number is required</span>
                        <i>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24h-24z" fill="none"/>
                            <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                          </svg>
                        </i>
                    </error_cfcn>
            </div>
          </div>
          <div class="col-lg-6">
            <div id="cf_u" class="form-group">
              <input id="username" spellcheck=false class="form-control" name="username" type="text" size="18" alt="login" required="">
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="username" class="float-label" style="font-family:Arial, FontAwesome">Username</label>
                    <error_cfu>
                      <span>Username is required</span>
                        <i>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24h-24z" fill="none"/>
                            <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                          </svg>
                        </i>
                    </error_cfu>
            </div>


            <div id="cf_p" class="form-group">
              <input type="password" id="password" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="password1" class="float-label" style="font-family:Arial, FontAwesome">Password</label>
                    <error_cfp>
                      <span>Password is required</span>
                        <i>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24h-24z" fill="none"/>
                            <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                          </svg>
                        </i>
                    </error_cfp>
            </div>


            <div id="cf_cp" class="form-group">
              <input type="password" id="confirm_pass" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
              <span toggle="#confirm_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                  <label for="confirm_pass" class="float-label" style="font-family:Arial, FontAwesome">Confirm Password</label>
                    <error_cfcp>
                      <span>Confirm Password is required</span>
                        <i>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24h-24z" fill="none"/>
                            <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                          </svg>
                        </i>
                    </error_cfcp>
            </div>



            <!-- Show PassWord -->
            <script type="text/javascript">
              $(".toggle-password").click(function() {

              $(this).toggleClass("fa-eye fa-eye-slash");
              var input = $($(this).attr("toggle"));
              if (input.attr("type") == "password") {
                input.attr("type", "text");
              } else {
                input.attr("type", "password");
              }
            });
            </script>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="button" class="cus-btn sec" id="create_btn" ripple><i class="fas fa-save"></i> Create Account</button>
        <button type="button" class="cus-btn pri" onclick="window.history.back();" ripple><i class="fas fa-times"></i> Cancel</button>
      </div>
    </div>
  </div>

      <!-- Footer -->
      <?php require 'src/layout/footer.php'; ?>

</div>
  <div class="alert-box warning" style="max-width: 600px;">
    <i class="fas fa-exclamation-triangle"></i> <span id="warningmsg">Warning!</span>
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="src/js/error.js"></script>


<script type="text/javascript">
  var fname = $('#firstname'),
      lname = $('#lastname'),
      mname = $('#middlename'),
      user = $('#username'),
      pass = $('#password'),
      confirm_pass = $('#confirm_pass'),
      contact = $('#contact_num'),
      err_fn = $('error_cff'),
      err_ln = $('error_cfl'),
      err_mn = $('error_cfm'),
      err_un = $('error_cfu'),
      err_p = $('error_cfp'),
      err_cp = $('error_cfcp'),
      err_cn = $('error_cfcn'),
      fdiv = $('#cf_f'),
      ldiv = $('#cf_l'),
      mdiv = $('#cf_m'),
      udiv = $('#cf_u'),
      pdiv = $('#cf_p'),
      cpdiv = $('#cf_cp'),
      cndiv = $('#cf_cn');

  fname.blur(function(){
    if (fname.val() == '') {
      fdiv.attr('errr','');
    } else {
      fdiv.removeAttr('errr');
    }
  });

  lname.blur(function(){
    if (lname.val() == '') {
      ldiv.attr('errr','');
    } else {
      ldiv.removeAttr('errr');
    }
  });

  mname.blur(function(){
    if (mname.val() == '') {
      mdiv.attr('errr','');
    } else {
      mdiv.removeAttr('errr');
    }
  });

  user.blur(function(){
    if (user.val() == '') {
      udiv.attr('errr','');
    } else {
      udiv.removeAttr('errr');
    }
  });

  pass.blur(function(){
    if (pass.val() == '') {
      pdiv.attr('errr','');
    } else {
      pdiv.removeAttr('errr');
    }
  });
  contact.blur(function(){
    if (contact.val() == '+639') {
      cndiv.attr('errr','');
    } else {
      cndiv.removeAttr('errr');
    }
  });

  $('#create_btn').click(function(){
    var firstname = $('#firstname').val(), lastname = $('#lastname').val(), middlename = $('#middlename').val(), username = $('#username').val(), contact_number = $('#contact_num').val(), password = $('#password').val(), confirm_pass = $('#confirm_pass').val();


    if(fname.val() == '' || lname.val() == '' || mname.val() == '' || user.val() == '' || pass.val() == '' || contact.val() == '+639') {
      if (fname.val() == '') {
        fdiv.attr('errr','');
      } else {
        fdiv.removeAttr('errr');
      }
      if (lname.val() == '') {
        ldiv.attr('errr','');
      } else {
        ldiv.removeAttr('errr');
      }
      if (mname.val() == '') {
        mdiv.attr('errr','');
      } else {
        mdiv.removeAttr('errr');
      }
      if (user.val() == '') {
        udiv.attr('errr','');
      } else {
        udiv.removeAttr('errr');
      }
      if (pass.val() == '') {
        pdiv.attr('errr','');
      } else {
        pdiv.removeAttr('errr');
      }

      if (contact.val() == '+639') {
        cndiv.attr('errr','');
      } else {
        cndiv.removeAttr('errr');
      }

      if (contact.length != 13) {
        cndiv.attr('errr','');
        err_cn.find('span').html('Contact Number is invalid');
      } else {
        cndiv.removeAttr('errr');
      }

      if(confirm_pass != password) {
        pdiv.attr('errr','');
        cpdiv.attr('errr','');
        err_p.find('span').html('Password did not match.');
        err_cp.find('span').html('Password did not match.');
      }
      else{
        pdiv.removeAttr('errr','');
        cpdiv.removeAttr('errr','');
      }
    }
    else{
      if(confirm_pass != password) {
        pdiv.attr('errr','');
        cpdiv.attr('errr','');
        err_p.find('span').html('Password did not match.');
        err_cp.find('span').html('Password did not match.');
      }
      else if (contact.val().length != 13) {
        cndiv.attr('errr','');
        err_cn.find('span').html('Contact Number is invalid');
      }
      else{
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"create_account":1,firstname:firstname,lastname:lastname,middlename:middlename,contact_number:contact_number,username:username,password:password},
          success:function(data) {
            if(data == "0"){
              udiv.attr('errr','');
              err_un.find('span').html('User already exists.');
              $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#failedmsg").html('Username already exists. Please try new one.');
            }else{
              window.open(data,'_self');
            }
          }
        });
      }
    }
  });

</script>

</body>
</html>
