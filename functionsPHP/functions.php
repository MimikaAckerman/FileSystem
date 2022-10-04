<?php
    //--------------------------------show all elements


function listDirectory($directory){
    $list = scandir($directory);
    unset($list[array_search('.',$list,true)]);
    unset($list[array_search('.',$list,true)]);
    if(count($list) < 1){
      return;
    }
    foreach($list as $element){
      if(!is_dir($directory.'root/'.$element)){
        echo "<li>- <a href='$directory/$element'>$element</a></li>";
      }
      if(is_dir($directory.'root/'.$element)){
        echo '<li class="open-dropdown">+ '.$element.'</li>';
                  echo '<ul class="dropdown d-none">';
                      listDirectory($directory.'/'.$element);
                  echo '</ul>';
      }
    }
  }


  
  function buscarArchivos($directorio){

    $nameItem = $_POST['buscarText'];

    $listado = scandir($directorio);
    unset($listado[array_search('.',$listado,true)]);
    unset($listado[array_search('.',$listado,true)]);
    if(count($listado) < 1){
      return;
    }
    foreach($listado as $elemento){
     $elementoInfo= pathinfo($elemento);
      if(stripos($elementoInfo['filename'],$nameItem)!== false){
        if(!is_dir($directorio.'root/'.$elemento)){
          echo "<li>- <a href='$directorio/$elemento'>$elemento</a></li>";
        }
        if(is_dir($directorio.'root/'.$elemento)){
          echo '<li class="open-dropdown">+ '.$elemento.'</li>';
              echo '<ul class="dropdown d-none">';
                  buscarArchivos($directorio.'/'.$elemento);
              echo '</ul>';
        }
       }
    }

  }

function uploadFiles(){

  $file = $_FILES['file'];


  //file properties
  $file_name=$file['name'];
  $file_tmp= $file['tmp_name'];
  $file_size= $file['size'];
  $file_error = $file['error'];

  //work out the file extension
  $file_ext = explode('.',$file_name);
  $file_ext=strtolower(end($file_ext));

  $allowed = array('txt','jpg','png');


  if(in_array($file_ext,$allowed)){
    if($file_error === 0){
      if($file_size <= 2097152){
          $file_name_new = uniqid('',true).'.'.$file_ext;
          $file_destination = './root/uploads/'.$file_name_new;

          if(move_uploaded_file($file_tmp,$file_destination)){
            echo $file_destination;
          }
      }

    }
  }



}
  