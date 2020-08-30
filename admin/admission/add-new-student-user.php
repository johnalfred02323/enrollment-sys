<!-- STANDBY MUNA HEHEHEHEHEHEHE -->

<style type="text/css">
.form-group err_new_sn,.form-group err_new_f, .form-group err_new_l, .form-group err_new_m, .form-group err_new_pass, .form-group err_new_con_pass {
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

.form-group err_new_sn i,.form-group err_new_f i,.form-group err_new_l i, .form-group err_new_m i,.form-group err_new_pass i,.form-group err_new_con_pass i {
  position: absolute;
  right: 0;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  float: right;
}

.form-group err_new_sn i svg, .form-group err_new_f i svg, .form-group err_new_l i svg, .form-group err_new_m i svg,.form-group err_new_pass i svg,.form-group err_new_con_pass i svg {
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


.form-group[errr] err_new_sn, .form-group[errr] err_new_f, .form-group[errr] err_new_l, .form-group[errr] err_new_m, .form-group[errr] err_new_pass, .form-group[errr] err_new_con_pass  {
  opacity: 1;
}
</style>
  <!-- Add User Modal-->
  <div class="modal fade" id="student_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
      <div id="user_forms"></div> 
      <div id="user_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Student User Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        

  <div class="row">
              <div class="col-lg-6">
  <div id="new_sn" class="form-group">
    <input id="new_student_number" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="new_student_number" class="float-label" style="font-family:Arial, FontAwesome">Student Name</label>
          <err_new_sn>
            Student Number is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </err_new_sn>
  </div>

  <div id="new_f" class="form-group">
    <input id="new_firstname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="new_firstname" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
          <err_new_f>
            First Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </err_new_f>
  </div>



  <div id="new_l" class="form-group">
    <input id="new_lastname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="new_lastname" class="float-label" style="font-family:Arial, FontAwesome">Last Name</label>
          <err_new_l>
            Last Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </err_new_l>
  </div>



  <div id="new_m" class="form-group">
    <input id="new_middlename" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="new_middlename" class="float-label" style="font-family:Arial, FontAwesome">Middle Name</label>
          <err_new_m>
            Middle Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </err_new_m>
  </div>



              </div>

              <div class="col-lg-6">



   <div class="box2" id="eoc">
      <label class="select-label">Course</label>
      <select name='' id="new_course" required>
        <option value="Choose Course" hidden>Choose Course</option>
        <option value="BSIT">BSIT</option>
        <option value="BSA">BSA</option>
        <option value="BSBA">BSBA</option>
        <option value="BSEd">BSEd</option>
        <option value="BEEd">BEEd</option>
      </select>
    </div>
   
    
  <div id="new_p" class="form-group">
    <input type="password" id="new_password" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span toggle="#new_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="new_password" class="float-label" style="font-family:Arial, FontAwesome">Password</label>
          <err_new_pass>
            Password is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </err_new_pass>
  </div>
          
    
  <div id="new_cp" class="form-group">
    <input type="password" id="new_confirm_pass" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span toggle="#new_confirm_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="new_confirm_pass" class="float-label" style="font-family:Arial, FontAwesome">Confirm Password</label>
          <err_new_con_pass>
            Confirm Password is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </err_new_con_pass>
  </div>






              </div> <!-- col-lg-6 End -->
  </div> <!-- Row End -->





        </div> <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" ripple><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="save" id="save_new_btn" ripple><i class="fas fa-save"></i> Save</button>
      </div>

      </div>

</div>

    </div>
  </div>


<script type="text/javascript">
  $(document).ready(function(){
    var password = $('#new_password'),
      con_pass = $('#new_confirm_pass'),
      sn = $('#new_student_number'),
      f = $('#new_firstname'),
      l = $('#new_lastname'),
      m = $('#new_middlename'),
      err_new_sn = $('err_new_sn'),
      err_new_f = $('err_new_f'),
      err_new_l = $('err_new_l'),
      err_new_m = $('err_new_m'),
      err_pass = $('err_new_pass'),
      err_con_pass = $('err_new_con_pass'),
      pdiv = $('#new_p'),
      cpdiv = $('#new_cp'),
      fdiv = $('#new_f'),
      ldiv = $('#new_l'),
      mdiv = $('#new_m'),
      sndiv = $('#new_sn');

    sn.blur(function() {
      if (sn.val() == '') {
        sndiv.attr('errr','');
      } else {
        sndiv.removeAttr('errr');
      }
    });

    f.blur(function() {
      if (f.val() == '') {
        fdiv.attr('errr','');
      } else {
        fdiv.removeAttr('errr');
      }
    });

    l.blur(function() {
      if (l.val() == '') {
        ldiv.attr('errr','');
      } else {
        ldiv.removeAttr('errr');
      }
    });

    m.blur(function() {
      if (m.val() == '') {
        mdiv.attr('errr','');
      } else {
        mdiv.removeAttr('errr');
      }
    });

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

    $('#save_new_btn').click(function(){
      var sn = $('#new_student_number').val();
      var fname = $('#new_firstname').val();
      var lname = $('#new_lastname').val();
      var mname = $('#new_middlename').val();
      var pass = $('#new_password').val();
      var con_pass = $('#new_con_pass').val();

      if(sn == '' || fname == '' || lname == '' || mname == '' || pass == '' || con_pass == '') {
        sndiv.attr('errr','');
        fdiv.attr('errr','');
        ldiv.attr('errr','');
        mdiv.attr('errr','');
        pdiv.attr('errr','');
        cpdiv.attr('errr','');
      }
      else if(pass != con_pass) {
        pdiv.attr('errr','');
        err_pass.find('span').html("Password did not match");
        cpdiv.attr('errr','');
        err_con_pass.find('span').html("Password did not match");
      }
      else {
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"add_new_student_user":1,sn:sn,fname:fname,lname:lname,mname:mname}
        });
      }

    });
  });
</script>