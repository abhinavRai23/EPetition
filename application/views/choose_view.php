<style type="text/css">
  a{
    text-decoration: none;
  }
</style>
      <div class="android-content mdl-layout__content">
        <div class="android-more-section">
          <!-- <div class="android-section-title mdl-typography--display-1-color-contrast">Support This Petition??</div> -->
            <div class="android-card-container mdl-grid">

	            <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                <div class="android-section-title mdl-typography--display-1-color-contrast heading" style="font-size:24px;">
                  View Petition
                </div>
                <div class="form">
                  <form action="<?php echo base_url('index.php/epetition/choose_view'); ?>" method="post" id="view">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <select id="select" class="mdl-textfield__input" name="category">
                          <option value="" disabled selected></option>
                          <option value="all">ALL</option>
                          <option value="education">Education</option>
                          <option value="politics">Politics</option>
                          <option value="sports">Sports</option>
                          <option value="business">Business</option>
                          <option value="other">others</option>
                        </select>
                        <label class="mdl-textfield__label" for="select">Choose A Category</label>
                      </div>
                    <input type="submit" value="Choose" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="float:right;background-color:green;">
                  </form>    
	              </div> 
              </div>  



<?php 

if( isset($_POST['category']) )
{  

echo '<div class="android-content mdl-layout__content">
        <div class="android-more-section">
          <div class="android-section-title mdl-typography--display-1-color-contrast">'.strtoupper($_POST['category']).'</div>
           <div class="android-card-container mdl-grid">';

  foreach ($result as $value) {
  echo ' 
        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
            <div class="mdl-card__media">
              <img src="'.base_url().'/uploads/'.$value->image.'">
            </div>
            <a href="'.base_url('index.php/epetition/viewPetition/'.$value->petitionId.'').'">
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">'.$value->heading.'</h4>
              </div>
            </a>  
        </div>

         '; 
  }
echo "</div>
    </div>
  </div>";

}

?>
<!-- 
<script type="text/javascript">
  var a = document.getElementById("select").value;
  if(a!='')
    document.getElementById("view").submit();
</script> -->