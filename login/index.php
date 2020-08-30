<!-- head -->
<?php require 'layout/head.php'; ?>

  <script src="../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<title>GRC System | LogIn</title>

</head>

<body class="">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-9 col-lg-12 col-md-9 animated animatedFadeInUp fadeInUp">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-logo">
                
              <?php require 'layout/left.php'; ?>

              </div>

              <div class="col-lg-6">
                <div class="p-5">

                <?php require 'layout/right.php'; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php require 'layout/footer.php'; ?>

    </div>

  </div>
  <div id="head"></div>
  <script type="text/javascript">
    $('#login_btn').click(function(){
      var user = $('#username').val();
      var pass = $('#password').val();
      
      var udiv = $('#u');
      var pdiv = $('#p');
      var umsg = $('erroru');
      var pmsg = $('errorp');

      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"login":1,user:user,pass:pass},
        success:function(data)
        {
          if(data == "401"){
            pdiv.attr('errr','');
            pmsg.html('Password is Incorrect');
          }
          else if(data == "400") {
            udiv.attr('errr','');
            umsg.html('Username is Incorrect');
            pdiv.attr('errr','');
            pmsg.html('Password is Incorrect');
          }
          else{
            window.location.href = data;
          }
        }
      });
    });
  </script>
  <script src="js/script.js"></script>
  <script src="js/slider.js"></script>

</body>

</html>