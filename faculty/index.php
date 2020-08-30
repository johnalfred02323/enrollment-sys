<!-- head -->
<?php require 'src/layout/head-login.php'; ?>

<script src="../src/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<title>GRC System | Faculty Log In</title>
<style>
.error_cc {
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 7px;
  padding-right: 7px;
  border: 2px solid transparent;
  border-radius: 2px;
  top: 1em;
  max-width: 100%;
  width: auto;
  text-align: left;
}

.failed {
    color: black;
    background-color: #f5cac6;
    border-color: #f44336;
    display: none;
}

</style>
</head>
<body>



<div class="wrapper">
  <div class="container animated animatedFadeInUp fadeInUp">
    <div class="conn">

      <div class="grc-logo">
        <img src="src/img/logo-name.png" alt="GRC Logo" width="100%;" />
        <h3><center>Faculty Portal</center></h3>
      </div>


      <!-- Form -->
      <?php require 'src/layout/form.php'; ?>
      <span class="create-acc" data-toggle="modal" data-target="#forgot-acc-modal">forgot account</span>
    </div>


  </div>
      <!-- Footer -->
      <?php require 'src/layout/footer.php'; ?>

</div>
  <div class="alert-box warning" style="max-width: 600px;">
    <i class="fas fa-exclamation-triangle"></i> <span id="warningmsg">Warning!</span>
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>

  <!-- Modal Start -->
  <div class="modal fade" id="forgot-acc-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Find Your Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="$('div.error_cc').hide(); $('#search').val('');">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
          <div id="search_acc">
            <div class="error_cc failed"><b>No Search Results</b><br>Your search did not return any results. Please try again with other information.</div>
            <div class="ml-5 mt-4">
              <h6>Please enter your email or mobile number to search for your account.</h6>
              <input id="search" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" autocomplete="off" style="width:90%;">
            </div>
            <br>
            <button class="btn btn-primary float-right" id="search_btn">Search</button>
          </div>
          <div id="user_info" class="m-2"></div>
        </div>
      </div>
    </div>
  </div> <!-- Modal End -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!-- Responsive core JavaScript -->
<script src="../src/vendor/js/bootstrap.bundle.min.js"></script>
  <script src="src/js/error.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#search_btn').click(function(){
      var val = $('#search').val();
      var ediv = $('#em_u'), errorem = $('errorem');

      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"search_account":1,val:val},
        success:function(data) {
          if(data == "0") {
            ediv.attr('errr','');
            $('#search').val('');
            $('div.failed').show();
          }
          else {
            $('#search_acc').hide();
            var info = JSON.parse(data);
            $('#user_info').html('Is this you? <b>'+info['firstname']+' '+info['lastname']+" ("+info['email']+"/"+info['contact_number']+")</b><br><br> To change your password, click the 'Reset my Password' button below. <br> <small>Note: Check your spam mails if you can't find the email in your inbox. </small><br><br><button class='btn btn-primary float-right change-pass' id='"+info['id']+"'>Reset my Password</button>");
            $('.change-pass').click(function(){
              var id = $(this).attr('id');
              $('#forgot-acc-modal').modal('hide');
              $.ajax({
                url:"../admin/grading/create_account_process.php",
                method:"POST",
                data:{"change-pass":1,id:id},
                success:function(data){
                  location.reload();
                }
              });
            });
          }
        }
      });
    });
    // $('.change-pass').click(function(){
    //   var id = $(this).val();

    //   $.ajax({
    //     url:'process.php',
    //     method:'POST',
    //     data:{'change_pass':1, id:id},
    //     success:function(data) {

    //     }
    //   });
    // });
    // $('#reg_btn').click(function(){
    //   window.open('create_account','_self');
    // });
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
          console.log(data);
          if(data == '0'){
            udiv.attr('errr','');
            umsg.html('Username is Incorrect');
            pdiv.attr('errr','');
            pmsg.html('Password is Incorrect');
          }
          else if (data == '2') {
            $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#warningmsg").html("Your account has been disabled by the admin. Please, contact the administrator to enable your account.");
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
