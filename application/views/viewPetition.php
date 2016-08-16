<style type="text/css">
  .android-card-container .mdl-card__supporting-text {
    height: auto;
    color: black;
    padding-bottom: 30px; 
}
.mdl-data-table td {
    position: relative;
    height: 48px;
    border-top: 1px solid rgba(0,0,0,0);
    border-bottom: 1px solid rgba(0,0,0,.12);
    padding: 12px 18px;
    box-sizing: border-box;
    font-weight: bold;
    font-size: 16px;
}
</style>
      <div class="android-content mdl-layout__content">
        <div class="android-more-section">
          <!-- <div class="android-section-title mdl-typography--display-1-color-contrast">Support This Petition??</div> -->
            <div class="android-card-container mdl-grid">

	            <div class="mdl-grid mdl-cell mdl-cell--12-col mdl-cell--4-col-tablet mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__media mdl-cell mdl-cell--12-col-tablet">
                        <img class="article-image" src="<?php echo base_url('uploads/'.$image.''); ?>" border="0" alt="">
                    </div>
                    <div class="mdl-cell mdl-cell--8-col">
                        <h2 class="mdl-card__title-text"><?php echo $heading; ?></h2>
                        <div class="mdl-card__supporting-text padding-top">
                            <span><b>Category:</b><?php echo $category; ?></span>
                        </div>
                        <div class="mdl-card__supporting-text no-left-padding">
                            <p><?php echo $description; ?></p>
                        </div>    
                    </div>
                    <div class="form" style="width:100%;">
                         <form action="<?php echo base_url('index.php/epetition/comments'); ?>" method="post" id="commentform">
                            <div class="mdl-textfield mdl-js-textfield">
                                  <input type="hidden" name="petitionId" value="<?php echo $petitionId; ?>">
                                  <textarea class="mdl-textfield__input" type="text" rows= "3" name="comment" id="commentid" ></textarea>
                                  <label class="mdl-textfield__label" for="comment">Any Comments...</label>
                            </div>
                            <button class="mdl-button mdl-button--raised mdl-button--colored" id="comment_btn" type="button" onclick="btncomment('<?php echo base_url('index.php/epetition/checkSession'); ?>');">Comment</button>
                            <div class="likeNsign" style="float:right;">
                              <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="button" id="like" onclick="likeAjax('<?php echo base_url('index.php/epetition/like/').$petitionId; ?>');">
                            <?php
                            if($login_status==0)
                              echo "LIKE";
                            else if($login_status==1)
                              echo "LIKED";
                            ?>
                              </button>
                              <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="button" id="sign" onclick="signAjax('<?php echo base_url('index.php/epetition/sign/').$petitionId; ?>');">SIGN</button>
                            </div>
                         </form>
                        </div>
              </div>
            </div>

            <div class="android-card-container mdl-grid">

              <div class="mdl-grid mdl-cell mdl-cell--12-col mdl-cell--4-col-tablet mdl-card mdl-shadow--4dp">

                  <table class="mdl-data-table mdl-js-data-table" style="width:100%;border: 1px solid rgba(0,0,0,0);">
                    <thead>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric">Total Comments:<?php echo sizeof($comments);?></td>
                        <td>Signed:<?php echo $likes; ?></td>
                        <td>Likes:<?php echo $sign; ?></td>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table> 
                  <div class="mdl-card__supporting-text no-left-padding"> 
                      <ul class="demo-list-three mdl-list">
                      <?php
                      foreach ($comments as $value) {

                        echo '
                          <li class="mdl-list__item mdl-list__item--three-line">
                            <span class="mdl-list__item-primary-content">
                              <i class="material-icons mdl-list__item-avatar">person</i>
                              <span>'.$value->username.'</span>
                              <span class="mdl-list__item-text-body">
                                '.$value->comment.'
                              </span>
                            </span>
                          </li>
                          ';

                      }    
                      ?>  
                      </ul>
                  </div>    
              </div>
            </div>  


        </div>
      </div>

<script>

  var ajaxRes=2;

  function likeAjax(file){
    loadAjax(file);
      if(ajaxRes==1)
      {
         console.log("Nice");
      }
      else if(ajaxRes==0)
      {
        alert("Please login first");
      }
  }

  function loadAjax(file){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        ajaxRes = xhttp.responseText;
        btnlike();
      }
    };
    xhttp.open("GET",file, true);
    xhttp.send();
  }

  function btncomment(file){  
    var comm = document.getElementById("commentid").value;
    loadAjax(file);  
      if( ajaxRes==1 )
      {  
        if(comm!='') 
          document.getElementById("commentform").submit();
        else 
          alert("Enter Some Comment First");
      }  
      else if(ajaxRes==0) 
          alert('Please login first');  
  }

    function btnlike(){
      var a = document.getElementById("like").innerHTML;
      if(a=='LIKE')
      {
        document.getElementById("like").innerHTML='LIKED';
        document.getElementById('like').style.backgroundColor = "white";
        document.getElementById('like').style.color = "black";
      }
      else if(a=='LIKED')
      {
        document.getElementById("like").innerHTML='LIKE';
        document.getElementById('like').style.backgroundColor = "#3f51b5";
        document.getElementById('like').style.color = "white";
      }
    }

    function btnsign(){
      var b = document.getElementById("sign").innerHTML;
      if(b=='SIGN')
      {
        document.getElementById("sign").innerHTML='SIGNED';
        document.getElementById('sign').style.backgroundColor = "white";
        document.getElementById('sign').style.color = "black";
      }
      else if(b=='SIGNED')
      {
        document.getElementById("sign").innerHTML='SIGN';
        document.getElementById('sign').style.backgroundColor = "#3f51b5";
        document.getElementById('sign').style.color = "white";
      }
    }
</script>  
   