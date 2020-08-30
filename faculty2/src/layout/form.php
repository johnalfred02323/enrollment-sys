  <div id="u" class="form-group">
    <input id="username" spellcheck=false class="form-control user" name="username" type="text" size="18" alt="login" required="" autocomplete="off" onKeyPress="return checkSubmit(event)">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
            <label for="username" class="float-label">Username</label>
      <erroru><span id="umsg">
      Username is required</span>
        <i>   
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M0 0h24v24h-24z" fill="none"/>
          <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
        </svg>
        </i>
      </erroru>
  </div>

  <div id="p" class="form-group">
    <input id="password" class="form-control pass" spellcheck=false name="password" type="password" size="18" alt="login" required="" onKeyPress="return checkSubmit(event)">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
            <label for="password" class="float-label">Password</label>
      <errorp><span id="pmsg">
      Password is required</span>
        <i>   
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M0 0h24v24h-24z" fill="none"/>
          <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
          </svg>
        </i>
      </errorp>
  </div>


      <button id="login_btn" class="login-btn" ripple>Login</button>
<script type="text/javascript">
function checkSubmit(e) {
   if(e && e.keyCode == 13) {
      $('#login_btn').click();
   }
}
</script>