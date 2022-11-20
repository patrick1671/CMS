<?php
session_start();
include "../DatabaseConnect/Db.php";
require_once('./adminListComponent.php');
include "../UserPanel/GetData.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="adminPanel.css" />
    <title>Admin Panel</title>
</head>
<body>
  <div class="nav-container">


    <?php
        if(isset($_SESSION["userId"]))
        {
        

        
    ?>
      <div class="logout-button">
        <a href="../Signin/logout.php">Logout</a>
      </div>
    </div>

  <body>
    
    

    <div class="container">
      <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight"><h2>Movies</div>
        <div class="p-2 bd-highlight">
          <a href="movieEdit.php?name=create" class="btn btn-secondary" >Create</a>
        </div>
      </div>
      
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Photo</th>
              <th scope="col">English Title</th>
              <th scope="col">Polish Title</th>
              <th scope="col">English description</th>
              <th scope="col">Polish description</th>
              <th scope="col">Premiere Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="mytable">
            
                <?php
                $data=new GetData();
                
                $results=$data->getAllData();
                $i=0;
                foreach($results as $r => $r_value){
                    $i++;
                    adminListcomponent($r_value["id"],$r_value["en_title"],$r_value["pl_title"],$r_value["en_description"],$r_value["pl_description"],$r_value["movie_photo"],$r_value["movie_premiere"],$i);
            
               
                }
                
                ?>
                
            
          </tbody>
        </table>
      </div>
    </div>

<?php
        }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body> 
</html>
