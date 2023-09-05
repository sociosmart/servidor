
<style>
  @font-face {
    font-family: SF-Pro-Display-Regular;
    src: url("admin/css/fonts/SF Pro/SF-Pro-Display-Regular.otf") format("opentype");
}

@font-face {
    font-family: SF-Pro-Display-Regular;
    font-weight: bold;
    src: url("admin/css/fonts/SF Pro/SF-Pro-Display-Bold.otf") format("opentype");
}
.titulo{
  font-family: SF-Pro-Display-Regular;
  color: #000000;
  font-weight: bold;
  font-size: 40px;
}
.textos{
   font-family: SF-Pro-Display-Regular;
  color: #FFFFFF;
  font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 17px;
}
input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  transform: scale(2);
  margin: 10px;
}
.botonamarillo{
   font-family: SF-Pro-Display-Regular;
  background: #FFD900;
  font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 21px;
border-radius: 30px !important;
width: 80% !important;
}
</style>




<br><br>
 <center><img width="300px" src="admin/img/logo.svg"></center>
<body  style="background:linear-gradient(180deg, #003099 0%, #002169 17.19%, #001033 100%);"><br><br><br>
  
     <div class="container-fluid">
            <div class="row" >  
    <div style="background-color: #ffffff; width: 100%;">
            <div class="container-fluid">
            <div class="row" >    


            <div class="col-3"></div>
              <div class="col-6 text-center"><br>
                  <label class="titulo " text-center style="line-height: 30px;">Descarga la App </label><br><br>
              </div>
            <div class="col-3"></div>



         <div class="col-md-12 text-center" >
          <?php 

$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false) { // && stripos($ua,'mobile') !== false) {
    ?><a href="https://play.google.com/store/apps/details?id=io.ionic.sociosmart"> <img src="admin/img/google.jpg" style="border-radius: 15px;"></a>
    <?php
}else if(stripos($ua,'iPhone') !== false){
?>
 <a href="https://apps.apple.com/mx/app/sociosmart/id1446960869"><img src="admin/img/apple.png" > </a>    
<?php
}else{
  ?>
  <a href="https://play.google.com/store/apps/details?id=io.ionic.sociosmart"> <img src="admin/img/google.jpg" style="border-radius: 15px;"></a>
   <a href="https://apps.apple.com/mx/app/sociosmart/id1446960869"><img src="img/apple.png" >   </a>  
  <?php
}
?>


           
          <br><br><br>
         </div>
       

</div>
</div>
</div>

              
             
              
        
      <div class="col-md-4"></div>        
      <div class="col-md-4"><center> <br><br><br>
       <br> <label class="textos">¿No estás registrado?</label>   
       <center>
        <button onclick="window.location.href='registro.php'" class="btn botone btn-block  botonamarillo" value="REGISTRATE">Registrate</button>  </center>
         
        </center>
      </div>

      
    </div>
  </div>

</body> 
</html>





