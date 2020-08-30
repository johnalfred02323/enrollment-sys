<!-- head -->
<?php require 'src/layout/head-login.php'; ?>

<title>GRC LogIn Faculty</title>

</head>
<body>



<div class="wrapper">
  <div class="container animated animatedFadeInUp fadeInUp">
    <div class="conn">

      <div class="grc-logo">
        <img src="src/img/logo-name.png" alt="GRC Logo" width="100%;" />
      </div>


      <!-- Form -->
      <?php require 'src/layout/form.php'; ?>

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
  $(document).ready(function(){
    $('#login_btn').click(function(){
      var user = $('#username').val();
      var pass = $('#password').val();
      var udiv = $('#u');
      var pdiv = $('#p');
      var umsg = $('#umsg');
      var pmsg = $('#pmsg');
      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"login":1,user:user,pass:pass},
        success:function(data)
        {
          if(data == '0'){
            udiv.attr('errr','');
            umsg.html('Username is Incorrect');
            pdiv.attr('errr','');
            pmsg.html('Password is Incorrect');
          }
          else if (data == '3') {
            $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#warningmsg").html("Accessing this webpage is currently unable. Please, contact the administrator to activate this webpage.");
          }
          else{
            window.location.href = data;
          }
        }
      });
    });
  });
</script>

</body>
</html>