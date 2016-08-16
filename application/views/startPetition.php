<style type="text/css">
  
   input[type=file] {
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    width: 100%;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    border-bottom: 1px solid rgba(0,0,0,.12);
}

</style>
      <div class="android-content mdl-layout__content">
        <div class="android-more-section">
            <div class="android-card-container mdl-grid">
              <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-phone mdl-card mdl-shadow--3dp" id="signUp" style="margin:0px auto;">
                <div class="android-section-title mdl-typography--display-1-color-contrast heading" style="font-size:24px;">
                  Start a Petition
                </div>
                <div class="form">
                  <form action="<?php echo base_url('index.php/epetition/startPetition'); ?>" method="post" id="createPetetion" enctype="multipart/form-data">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" name="heading" id="heading">
                      <label class="mdl-textfield__label" for="heading">Enter Heading...</label>
                    </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <select id="select" class="mdl-textfield__input" name="category">
                          <option value="" disabled selected></option>
                          <option value="education">Education</option>
                          <option value="politics">Politics</option>
                          <option value="sports">Sports</option>
                          <option value="business">Business</option>
                          <option value="other">others</option>
                        </select>
                        <label class="mdl-textfield__label" for="select">Choose A Category</label>
                      </div>
                    <div class="mdl-textfield mdl-js-textfield">
                      <textarea class="mdl-textfield__input" type="text" rows= "3" name="description" id="description" ></textarea>
                      <label class="mdl-textfield__label" for="description">Description...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield" style="">
                      <input class="mdl-textfield__input" type="file" name="photo" id="photo">
                      <label class="mdl-textfield__label" for="photo" id="label">Choose Picture...</label>
                    </div>
                    <div id="msg" style="color:red;"><?php echo validation_errors();
                    foreach($error as $e) {
                      echo "$e";
                    }
                    ?></div>
                    <input type="button" value="Create" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="float:right;background-color:green;margin-bottom:2%;" onclick="notEmpty();">
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>

<script type="text/javascript">
  document.getElementById('photo').onchange = uploadOnChange;

  function uploadOnChange() {
      var filename = this.value;
      var lastIndex = filename.lastIndexOf("\\");
      if (lastIndex >= 0) {
          filename = filename.substring(lastIndex + 1);
      }
      document.getElementById('label').innerHTML = filename;
      document.getElementById('label').style.color = "rgba(0,0,0,  1)";
  }
  
  function notEmpty(){
    var title = document.getElementById("heading").value;
    var cat = document.getElementById("select").value;
    var dis = document.getElementById("description").value;
    var pic = document.getElementById("photo").value;
    if(title!='' && cat!='' && dis!='' && pic!='')
      document.getElementById("createPetetion").submit();
    else
      document.getElementById("msg").innerHTML="*Please Fill all fields!";
  }
</script>