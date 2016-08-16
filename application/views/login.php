
      <div class="android-content mdl-layout__content">
        <div class="android-more-section">
            <div class="android-card-container mdl-grid">

              <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-phone mdl-card mdl-shadow--3dp" id="login" style="margin:0px auto;">
                <div class="android-section-title mdl-typography--display-1-color-contrast heading" style="font-size:24px;">
                  Login Here
                </div>

                <div class="form">
                  <form action="<?php echo base_url('index.php/epetition/login'); ?>" method="post" id="loginform">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="email" name="email" id="email">
                      <label class="mdl-textfield__label" for="email">Enter Email Id...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="password" name="password" id="password">
                      <label class="mdl-textfield__label" for="password">Enter Password...</label>
                    </div>
                    <div id="logMsg" style="color:red;">
                      <?php echo validation_errors(); 
                       echo $login_error; ?>
                    </div>
                    <input type="button" value="Login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="float:right; background-color:green;" onclick="validateLogin();">
                  </form>
                  <p style="color:green;margin:8%;"><a style="color: green;cursor:pointer" href="<?php echo base_url('index.php/epetition/signup'); ?>">Don't Have a Account, Click here.</a></p>
                </div>
              </div>

            </div>  
        </div>
      </div>
<script type="text/javascript">
function validateLogin(){
  var email = document.getElementById("email").value;
  var pass = document.getElementById("password").value;
  if(email!='' && pass!='')
    document.getElementById("loginform").submit();
  else
    document.getElementById("logMsg").innerHTML="*Please Fill all Fields.";  
}
</script>