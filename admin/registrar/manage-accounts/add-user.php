<form id="user_form">
  <!-- Add User Modal-->
  <div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <option value="Faculty-Head">Faculty Head</option>
        <option value="Faculty">Faculty</option>
      </select>
    </div>


   <div class="box2" id="eoc">
      <label class="select-label">Course</label>
      <select name='' id="course" required>
        <option value="Choose Course" hidden>Choose Course</option>
        <?php 
           $query = "SELECT DISTINCT course_abbreviation, course_name FROM course WHERE status = 'Active'";
           $result = mysqli_query($conn, $query); 
            if($count=mysqli_num_rows($result) > 0)  
            {
            while($rows=mysqli_fetch_array($result))
            {
              echo "<option value=".$rows['course_abbreviation'].">".$rows['course_abbreviation']."</option>";
            }
            }
            ?>
      </select>
    </div>

   <div class="box2" id="eocm">
      <label class="select-label">Major</label>
      <select name='' id="major" required>
        <option value="Choose Major" hidden>Choose Major</option>
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
</form>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box warning">
  <i class="fas fa-check"></i> <span id="warningmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


<script type="text/javascript">
$('#eoc').hide();
$('#eocm').hide();
function fetch_data(){
  var table = $('#user_table').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 5,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "fetch.php",

      responsive: true,

      searchPlaceholder: "Search records",

      fixedHeader: {
          header: true,
          footer: true
      },
      language: {
          search: "_INPUT_",
          searchPlaceholder: "Search..."
      }
  } );
}

function reset(){
  $('#user_form').trigger('reset');
  $('#user_forms_new').show();
  $('#user_forms').hide();
    $('#eocm').hide();
    $('#major').val("Choose Major");
    $('#eoc').hide();
    $('#course').val("Choose Course");
    $('#usertype').val("Choose Usertype");
}

$("#usertype").change(function(){
  if($('#usertype').val() == "Enlistment" || $('#usertype').val() == "Faculty-Head")
  {
    $('#eoc').show();
    $('#eocm').show();
  }
  else
  {
    $('#eocm').hide();
    $('#major').val("Choose Major");
    $('#eoc').hide();
    $('#course').val("Choose Course");
  }
});

$(document).ready(function(){
  $("#confirm_pass").keyup(function(){
    var pass = $("#password").val();
    var pmsg = $("erroru");
    var cpmsg = $("errorp");
    var pdiv = $("#p");
    var cpdiv = $("#cp");
    if(pass != $(this).val()){
      cpdiv.attr("errr","");
      cpmsg.html("Password did not match.");
    }else{
      cpdiv.removeAttr("errr");
    }
  });
      $('#usertype option[value=Faculty]').hide();
      $('#usertype option[value=Admin]').hide();
      $('#usertype option[value=Cashier]').hide();
      $('#usertype option[value=Staff]').hide();
      $('#usertype option[value=Enlistment]').hide();
      $('#usertype option[value=Faculty-Head]').hide();

  $('#department').change(function(){
    var val = $(this).val();
    if(val == 'Accounting'){
      $('#usertype option[value=Admin]').prop('selected', true);
      $('#usertype option[value=Cashier]').show();
      $('#usertype option[value=Admin]').show();
      $('#usertype option[value=Staff]').hide();
      $('#usertype option[value=Faculty]').hide();
      $('#usertype option[value=Enlistment]').hide();
      $('#usertype option[value=Faculty-Head]').hide();
    }else if(val == 'Faculty'){
      $('#usertype option[value=Faculty]').prop('selected', true);
      $('#usertype option[value=Faculty]').show();
      $('#usertype option[value=Admin]').hide();
      $('#usertype option[value=Cashier]').hide();
      $('#usertype option[value=Staff]').hide();
      $('#usertype option[value=Enlistment]').hide();
      $('#usertype option[value=Faculty-Head]').hide();
    }else if (val == 'Admission'){
      $('#usertype option[value=Admin]').prop('selected', true);
      $('#usertype option[value=Faculty]').hide();
      $('#usertype option[value=Cashier]').hide();
      $('#usertype option[value=Enlistment]').hide();
      $('#usertype option[value=Staff]').show();
      $('#usertype option[value=Admin]').show();
      $('#usertype option[value=Faculty-Head]').hide();
    }else if (val == 'Registrar'){
      $('#usertype option[value=Admin]').prop('selected', true);
      $('#usertype option[value=Faculty]').hide();
      $('#usertype option[value=Cashier]').hide();
      $('#usertype option[value=Staff]').hide();
      $('#usertype option[value=Enlistment]').show();
      $('#usertype option[value=Admin]').show();
      $('#usertype option[value=Faculty-Head]').show();
    }
      $('#eocm').hide();
      $('#major').val("Choose Major");
      $('#eoc').hide();
      $('#course').val("Choose Course");
  });

  //for major
$(document).on( 'change','#course', function (e) {
 var course = $(this).val();
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"major":1,course:course},
      success:function(data){
        $('#major').html(data);  
      }
      });
});

  $('#save_btn').click(function(){
    
    var fdiv = $('#f');
    var ldiv = $('#l');
    var mdiv = $('#m');
    var udiv = $('#u');
    var pdiv = $('#p');
    var cpdiv = $('#cp');

    var umsg = $('errorun');


    var fname = $('#firstname').val();
    var lname = $('#lastname').val();
    var mname = $('#middlename').val();
    var uname = $('#username').val();
    var pass = $('#password').val();
    var cpass = $('#confirm_pass').val();
    var usertype = $('#usertype').val();
    var dept = $('#department').val();
    var courseid = $('#course').val();
    var majorid = $('#major').val();

    if(usertype == "Enlistment" && courseid == "Choose Course" && majorid == "Choose Major")
    {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Please Select Course and Major.');

    }
    else if (usertype == "Enlistment" && courseid == "Choose Course")
    {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Please Select Course.');

    }

    else if(usertype == "Enlistment" && majorid == "Choose Major")
    {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Please Select Major.');
    }
    else
    {
        if(courseid == "Choose Course" && majorid == "Choose Major")
        {
            var course = "All";
            var major = "All";
        }
        else
        {
            var course = $('#course').val();
            var major = $('#major').val();
        }

        if(fname == '' || lname == '' || mname == '' || uname == '' || pass == ''){
          if(fname == ''){
            fdiv.attr('errr','');
          }
          if(lname == ''){
            ldiv.attr('errr','');
          }
          if(mname == ''){
            mdiv.attr('errr','');
          }
          if(uname == ''){
            udiv.attr('errr','');
          }
          if(pass == ''){
            pdiv.attr('errr','');
          }
          if(cpass == ''){
            cpdiv.attr('errr','');
          }
        }
        else if(pass != cpass){
          cpdiv.attr('errr','');
        }
        else{
          $.ajax({
            url:'process.php',
            method:'POST',
            data:{"adduser":1,fname:fname,lname:lname,mname:mname,uname:uname,pass:pass,usertype:usertype,dept:dept,course:course,major:major},
            success:function(data){
              if(data == "0"){
                udiv.attr('errr','');
                umsg.html('User already exists.');
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('User already exists.');
              }else if(data == "1"){
                $('#user_modal').modal('hide');
                $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#successmsg").html('User added successfully.');
                $('#user_table').DataTable().destroy();
                fetch_data();
                reset();
              }
            }
          });
        }
    }
  });
});
</script>