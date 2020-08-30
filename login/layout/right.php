          <div class="grc-logo">
            <img src="img/logo-name.png" alt="GRC Logo" width="100%;" />
          </div>
          <form action="" id="login-form">
            <div id="u" class="form-group">
              <input id="username" spellcheck=false class="form-control" type="text" size="18" alt="login" autocomplete="off"required="">
              <span class="form-highlight"></span>
              <span class="form-bar"></span>
              <label for="username" class="float-label" style="font-family:Arial, FontAwesome">&#xf007; &nbsp; Username</label>
              <erroru>
                Username is required
                <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M0 0h24v24h-24z" fill="none"/>
                    <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
                </i>
              </erroru>
            </div>

            <div id="p" class="form-group">
              <input id="password" class="form-control" spellcheck=false type="password" size="18" alt="login" autocomplete="off" required="">
              <span class="form-highlight"></span>
              <span class="form-bar"></span>
              <label for="password" class="float-label" style="font-family:Arial, FontAwesome">&#xf084; &nbsp; Password</label>
              <errorp>
                Password is required
                <i>   
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
              </svg>
              </i>
              </errorp>
            </div>
            <button id="login_btn" class="button-login btn-block mt-3" type="submit" ripple>Login</button>
          </form>