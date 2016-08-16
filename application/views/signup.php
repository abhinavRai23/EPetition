      <div class="android-content mdl-layout__content">
        <div class="android-more-section">
            <div class="android-card-container mdl-grid">

	            <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-phone mdl-card mdl-shadow--3dp" id="signUp" style="margin:0px auto;">
                <div class="android-section-title mdl-typography--display-1-color-contrast heading" style="font-size:24px;">
                  Create Accounts
                </div>
                <div class="form">
                  <form action="<?php echo base_url('index.php/epetition/signup'); ?>" method="post" id="loginform">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" name="username" id="username">
                      <label class="mdl-textfield__label" for="username">Enter Name...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="email" name="email" id="email" onkeyup="check_email(this.value);">
                      <label class="mdl-textfield__label" for="email">Enter Email Id...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="password" name="password" id="password">
                      <label class="mdl-textfield__label" for="password">Enter Password...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="password" id="confirmPassword">
                      <label class="mdl-textfield__label" for="confirmPassword">Confirm Password...</label>
                    </div>
                    <span style="color:red;" id="msg"><?php echo validation_errors(); ?>
                    </span>
                    <input type="button" value="Sign Up" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="float:right;background-color:green;" onclick="validate();">
                  </form>
                  <p style="color: green; margin:8%;"><a style="color: green;cursor:pointer" href="<?php echo base_url('index.php/epetition/login'); ?>">Already Have an Account, Click Here</a></p>
                </div>
	            </div>

          </div>
        </div>
      </div>    
<script type="text/javascript">
    function validate(){
      var pass = document.getElementById("password").value;
      var cpass = document.getElementById("confirmPassword").value;
      var user = document.getElementById("username").value;
      var email = document.getElementById("email").value;
      var msg = document.getElementById("email").value;

      if(pass==cpass && username!='' && email!='' && pass!='' && cpass!='' && msg!='')
        document.getElementById("loginform").submit();
      else if(pass!=cpass)
        document.getElementById("msg").innerHTML="*Password not match.";
      else
        document.getElementById("msg").innerHTML="*Please Fill all Fields.";    
    }
</script>