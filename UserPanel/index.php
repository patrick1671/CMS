<?php

include "../DatabaseConnect/Db.php";
include "./GetData.php" ;

require_once('./component.php');

?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="movielist.css" />
    <link rel="stylesheet" href="../Include/navBar.css" />
    <title>Cinema online</title>
  </head>
  <body>
  <?php
    require_once("../Include/navbar.php");
  ?>
  <ul class='auto-grid'>
    <?php 
    if($_SESSION["lang"]=="pl"){
    $data=new GetData();
    $results=$data->getEnData();
    foreach($results as $r => $r_value){
      
      component($r_value["en_title"],$r_value["en_description"],$r_value["movie_photo"],$r_value["movie_premiere"]);
    }
    }else if($_SESSION["lang"]=="en"){
      $data=new GetData();
      $results=$data->getPlData();
      foreach($results as $r => $r_value){
        
        component($r_value["pl_title"],$r_value["pl_description"],$r_value["movie_photo"],$r_value["movie_premiere"]);
    
      }
    }
    
    
    
    ?>
    </ul>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../Include/nav.js"></script>
  </body>
  
</html>
