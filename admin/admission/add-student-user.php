  <!-- Add User Modal-->
  <div class="modal fade" id="student_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
      <div id="user_forms"></div> 
      <div id="user_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New User Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        

  <div class="row">
              <div class="col-lg-6">
  <div id="sn" class="form-group">
    <input id="firstname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">Student Name</label>
          <erroru>
            Student Number is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>

  <div id="f" class="form-group">
    <input id="firstname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
          <erroru>
            First Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



  <div id="l" class="form-group">
    <input id="lastname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="lastname" class="float-label" style="font-family:Arial, FontAwesome">Last Name</label>
          <erroru>
            Last Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



  <div id="m" class="form-group">
    <input id="middlename" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="middlename" class="float-label" style="font-family:Arial, FontAwesome">Middle Name</label>
          <erroru>
            Middle Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



    <div class="box1">
      <label class="select-label">Department</label>
      <select name='' id="department" required>
        <option hidden>Choose Department</option>
        <option value="Accounting">Accounting</option>
        <option value="Admission">Admission</option>
        <option value="Faculty">Faculty</option>
        <option value="Registrar">Registrar</option>
      </select>
    </div>


              </div>

              <div class="col-lg-6">


    <div class="box2">
      <label class="select-label">Usertype</label>
      <select name='' id="usertype" required>
        <option hidden>Choose Usertype</option>
        <option value="Admin">Admin</option>
        <option value="Cashier">Cashier</option>
        <option value="Staff">Staff</option>
        <option value="Enlistment">Enlistment Officer</option>
        <option value="Faculty">Faculty</option>
      </select>
    </div>


   <div class="box2" id="eoc">
      <label class="select-label">Course</label>
      <select name='' id="course" required>
        <option value="Choose Course" hidden>Choose Course</option>
        <option value="BSIT">BSIT</option>
        <option value="BSA">BSA</option>
        <option value="BSBA">BSBA</option>
        <option value="BSEd">BSEd</option>
        <option value="BEEd">BEEd</option>
      </select>
    </div>

        

  <div id="u" class="form-group">
    <input id="username" spellcheck=false class="form-control" name="username" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="username" class="float-label" style="font-family:Arial, FontAwesome">Username</label>
          <errorun>
            Username is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </errorun>
  </div>
    
    
  <div id="p" class="form-group">
    <input type="password" id="password" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="password1" class="float-label" style="font-family:Arial, FontAwesome">Password</label>
          <erroru>
            Password is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>
          
    
  <div id="cp" class="form-group">
    <input type="password" id="confirm_pass" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span toggle="#confirm_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="confirm_pass" class="float-label" style="font-family:Arial, FontAwesome">Confirm Password</label>
          <errorp>
            Confirm Password is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </errorp>
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
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="save" id="save_btn" ripple><i class="fas fa-save"></i> Save</button>
      </div>

      </div>

</div>

    </div>
  </div>