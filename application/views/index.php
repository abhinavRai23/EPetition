<style type="text/css">
	a{
		text-decoration: none;
	}
</style>

<div class="android-content mdl-layout__content">
    <div class="android-more-section">
      <div class="android-section-title mdl-typography--display-1-color-contrast">Latest Petition</div>
       <div class="android-card-container mdl-grid">

<?php 

foreach ($latestPetition as $value) {
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

?>
      </div>
    </div>
</div>	
