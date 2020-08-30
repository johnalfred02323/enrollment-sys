
<?php require '../../src/layout/enlistment/head.php'; ?>
<head>
<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>
</head>
<!-- Modal -->
<div class="modal fade bg-white" id="pass" tabindex="-1" role="dialog" aria-labelledby="passcode" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content shadow-none border-none">
      <div class="modal-header border-0 d-flex justify-content-center">
        <img class="modal-title" id="passcode" src="../../login/img/logo-name.png" style="width: 450px; height: auto;">
      </div>      
      <div class="modal-body border-0">
        
      <p><i class="fas fa-info-circle"></i> Enter your account password to continue.</p>

      <div id="" class="form-group">
        <input id="" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
          <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">Password</label>
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

      </div>
      <div class="modal-footer border-0">
        <button type="button" class="save"><i class="fas fa-key"></i> Continue</button>
      </div>
    </div>
  </div>
</div>
<!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>


  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>