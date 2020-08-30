<!DOCTYPE html>
<html lang="en" class="scroll">
    <head>
        <!-- Primary Meta Tags -->
        <title>GRC | Student Portal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="title" content="Global Reciprocal Colleges Student Portal">
        <meta name="author" content="Global Reciprocal Colleges">
        <meta name="description" content="Global Reciprocal Colleges Student Portal.">
        <meta name="keywords" content="Global Reciprocal Colleges Student Portal, GRC, Student Portal, GRC Student Portal" />
        <link rel="canonical" href="http://localhost/grc/">
    
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://localhost/grc/">
        <meta property="og:title" content="Global Reciprocal Colleges Student Portal">
        <meta property="og:description" content="Global Reciprocal Colleges Student Portal.">
        <meta property="og:image" content="http://localhost/img/thumbnail/thumbnail.png">
    
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="http://localhost/grc/">
        <meta property="twitter:title" content="Global Reciprocal Colleges Student Portal">
        <meta property="twitter:description" content="Global Reciprocal Colleges Student Portal.">
        <meta property="twitter:image" content="http://localhost/img/thumbnail/thumbnail.png">
    
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="120x120" href="./asset/img/favicon/logo.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./asset/img/favicon/logo.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./asset/img/favicon/logo.png">
        <link rel="manifest" href="./asset/img/favicon/site.webmanifest">
        <link rel="mask-icon" href="./asset/img/favicon/folder-open.svg" color="#fa5252">
        <meta name="msapplication-TileColor" content="#fa5252">
        <meta name="theme-color" content="#fa5252">
    
        <link href="./asset/css/mystyle.css" rel="stylesheet">
        
        <script src="./src/vendor/jquery/jquery.min.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics Here -->

    </head>
<body>
    <main>
        <section class="min-vh-100 d-flex align-items-center">
            <div class="lazy bg-img-holder section-image top-0 left-0 col-lg-6 col-xl-7 z-10 vh-100 d-none d-lg-block"
                data-background="./asset/img/background/student.jpg">
            </div>
            <div class="container-fluid py-5">
                <div class="row align-items-center">
                    <div class="col-sm-10 col-lg-6 col-xl-5 mx-auto mr-lg-0">
                        <div class="px-1 px-xl-6">
                            <div>
                                <div class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <img class="lazy img-logo-login" data-src="./asset/img/logo/logo.png">
                                    </div>
                                    <h1 class="display-4">GRC Student Portal</h1>
                                    <p class="text-gray mb-0 my-4">Sign in your account to continue.</p>
                                </div>
                                <span class="clearfix"></span>
                                 <p class="text-danger" id="error_msg" style="display: none;">Error Here</p>  
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" id="student_number" class="form-control"
                                            placeholder="Enter Student Number" autocomplete="off" required autofocus maxlength="13">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" autocomplete="off" type="password" id="password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-eye" onclick="show()" style="cursor: pointer;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox">
                                        <span class="form-check-sign"></span>
                                        I agree to the <a href="#">Terms of Use</a> and <a href="">Privacy Statement</a>
                                    </label>
                                </div> -->
                                <div class="mt-4">
                                    <button type="submit" id="login_btn" class="btn btn-block btn-danger" ripple>Sign in</button>
                                </div>
                                <div class="d-block d-sm-flex justify-content-between align-items-center mt-4">
                                    <!-- <span>
                                        <small>Not registered?</small>
                                        <a href="#" class="small font-weight-bold">Create account</a>
                                    </span> -->
                                    <div><a href="#" class="small text-right">Lost password?</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- <div class="alert-box warning" style="max-width: 600px;">
      <i class="fas fa-exclamation-triangle"></i> <span id="warningmsg">Warning!</span>
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    <div class="alert-box failed" style="max-width: 600px;">
      <i class="fas fa-times-circle"></i> <span id="failedmsg">Failed!</span>
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
 -->
    <script type="text/javascript">
        $('#student_number').keyup(function(){
          var val = $(this).val();
          if(val.length == 4) { $(this).val(val+'-'); }
          if(val.length == 7) { $(this).val(val+'-'); }
        });

        $('#login_btn').click(function(){
          var sn = $('#student_number').val();
          var pass = $('#password').val();
          if(sn == '' || pass == '') {
            $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#warningmsg").html('Please, Enter Student Number and Password.');
          }
          else {
            $.ajax({
              url:"process.php",
              method:"POST",
              data:{"login":1,sn:sn,pass:pass},
              success:function(data) {  
                if(data == "0") {
                    $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $("#warningmsg").html("Accessing this webpage is currently unable. Please, contact the administrator to activate this webpage.");
                }
                else if(data == "1") {
                    $( "#error_msg" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $("#error_msg").html("Student Number doesn't exists.");
                }
                else if(data == "2") {
                    $( "#error_msg" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $("#error_msg").html("Incorrect Password.");
                }
                else {
                  window.location.href = data;
                }
              }
            });
          }
        });
    </script>
    <!-- Core -->
    <script src="./asset/vendor/jquery/jquery.min.js"></script>
    <script src="./asset/vendor/bootstrap/bootstrap.min.js"></script>

    <!-- Vendor JS -->
    <script src="./asset/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="./asset/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="./asset/vendor/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
    <script src="./asset/vendor/prism/prism.js"></script>
    <script src="./asset/js/console.js"></script>

    <!-- My JS -->
    <script src="./asset/js/myjs.js"></script>

    <!-- Lazy Load -->
    <script src="./asset/vendor/jquery-lazy-load/jquery.lazy.min.js"></script>

</body>

</html>