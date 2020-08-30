<style type="text/css">
.form-group err_pass,.form-group err_con_pass {
  position: absolute;
  width: 100%;
  left: 0;
  top: 38px;
  font-size: 11px;
  color: #d34336;
  font-weight: 300;
  transition: 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55) all;
  -moz-transition: 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55) all;
  -webkit-transition: 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55) all;
  -ms-transition: 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55) all;
  -o-transition: 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55) all;
  opacity: 0;
}

.form-group err_pass i,.form-group err_con_pass i {
  position: absolute;
  right: 0;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  float: right;
}

.form-group err_pass i svg, .form-group err_con_pass i svg {
  fill: #d34336;
}

.form-group[errr] .float-label {
  color: #d34336 !important;
}

.form-group[errr] .form-control {
  border-bottom: 1px solid #d34336 !important;  
}

.form-group[errr] .form-control:focus {
  border-bottom: 2px solid #e83b35 !important;  
  background-color: transparent;
}


.form-group[errr] err_pass, .form-group[errr] err_con_pass {
  opacity: 1;
}
</style>
  <!-- Add User Modal-->
  <div class="modal fade" id="student_user_existing_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div id="user_forms"></div> 
      <div id="user_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Existing Student User Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        

  <div class="row">
              <div class="col-lg-12">
  <div id="sn" class="form-group">
    <input id="exist_email" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="exist_email" class="float-label" style="font-family:Arial, FontAwesome">Email</label>
          <erroru>
            Email is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>

  



  <div id="ex_p" class="form-group">
    <input type="password" id="exist_password" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span toggle="#exist_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="exist_password" class="float-label" style="font-family:Arial, FontAwesome">Password</label>
          <err_pass>
            <span>Password is required</span>
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </err_pass>
  </div>
          
    
  <div id="ex_cp" class="form-group">
    <input type="password" id="exist_confirm_pass" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span toggle="#exist_confirm_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="exist_confirm_pass" class="float-label" style="font-family:Arial, FontAwesome">Confirm Password</label>
          <err_con_pass>
            <span>Confirm Password is required</span>
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </err_con_pass>
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


              </div> <!-- col-lg-6 End -->
  </div> <!-- Row End -->





        </div> <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" ripple><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="save" id="save_exist_btn" ripple><i class="fas fa-save"></i> Save</button>
      </div>

      </div>

</div>

    </div>
  </div>

<script type="text/javascript">
  $(document).ready(function(){
    var password = $('#exist_password'),
      con_pass = $('#exist_confirm_pass'),
      err_pass = $('err_pass'),
      err_con_pass = $('err_con_pass'),
      pdiv = $('#ex_p'),
      cpdiv = $('#ex_cp');

    password.blur(function() {
      if (password.val() == '') {
        pdiv.attr('errr','');
      } else {
        pdiv.removeAttr('errr');
      }
    });

    con_pass.blur(function() {
      if (con_pass.val() == '') {
        cpdiv.attr('errr','');
      } else {
        cpdiv.removeAttr('errr');
      }
    });

    $("#save_exist_btn").click(function(){
      var email = $('#exist_email').val();
      var password = $('#exist_password').val();
      var con_pass = $('#exist_confirm_pass').val();
      if(password == '' || con_pass == ''){
        pdiv.attr('errr','');
        cpdiv.attr('errr','');
      }
      else if(password != con_pass){
        pdiv.attr('errr','');
        err_pass.find('span').html("Password did not match");
        cpdiv.attr('errr','');
        err_con_pass.find('span').html("Password did not match");
      }
      else {
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"existing_student_user":1,email:email,password:password},
          success:function(data) {
            if(data == "0") {
              $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#warningmsg").html('User already has an account');
            }
            else if(data == "1"){
              $('#student_user_existing_modal').modal('hide');
              $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#successmsg").html('Student User added successfully');
            }
          }
        });
      }
    });

  

  });
</script>