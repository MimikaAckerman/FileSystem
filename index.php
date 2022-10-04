<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./assets/style.scss" rel="stylesheet">


<?php
require('functionsPHP/functions.php');
?>

</head>
<body>

<div class="app-container">
  <div class="left-area">
   

      


      <form method="post" action="">
      
      <div class="app-name">ACTIONS
      <br><br>
      <input type="submit" value="delete files" name="deleteFiles">
      </div>
      <br><br>
      </form>



     <!--upload files -->
     <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <br>
      <input type="submit" value="upload">
</form>
  



       
  
  </div>

<div class="main-area">
  <div class="main-area-header">
<form action="" method="post">
<!--navegar entre directorios -->
<input type="submit" name="buscar" value="buscar">
<input type="text" name="buscarText" placeholder="escribe la ruta">
    
    </form>
  </div>

  <!-- CENTRAL AREA -->
  <ul>
		<?php listDirectory('root'); ?>
	</ul>
  <?php
    
  ?>
 
</div>


<!-- RIGHT AREA -->
<div class="right-area">
    <div class="right-area-header-wrapper">
      <p class="right-area-header">upload files</p>

      


      <?php
  if(isset($_POST['buscar'])){
    buscarArchivos('root');
  }


  if(isset($_FILES['file'])){
   uploadFiles();
  }

?>
    </div>
    <br><br>
    <p class="right-area-header">Delete folders and files</p>
      </div>




</div>










    <script url="./assets/app.js"></script>
</body>
</html>