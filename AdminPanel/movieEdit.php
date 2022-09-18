<!DOCTYPE html>


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="./adminPanel.css" />
<?php
session_start();
include "../DatabaseConnect/Db.php";
include "../UserPanel/GetData.php";

if(isset($_SESSION["userId"])){
    
($_GET['name']=='create')? $_SESSION['action']="CREATE": $_SESSION['action']="EDIT";

$en_title="";
$pl_title="";
$en_description="";
$pl_description="";
$movie_premiere="";
$_SESSION["id"]=$_GET["name"];

if($_SESSION['action']=="EDIT"){
    $data=new GetData();
    $result=$data->getDataById($_SESSION["id"]);
    $en_title=$result[0]["en_title"];
    $pl_title=$result[0]["pl_title"];
    $en_description=$result[0]["en_description"];
    $pl_description=$result[0]["pl_description"];
    $movie_premiere=$result[0]["movie_premiere"];
}








?>
<form method="post" action="applyMovieChanges.php" enctype="multipart/form-data">
    <label for="movieTitle">English movie title</label>  <br/> <br/>
    <input type="text" name="movieTitle" value="<?php  echo $en_title  ?>"  >
    
    <br/><br/><br/>
    <label for="plMovieTitle">Polish movie title</label>  <br/> <br/>
    <input type="text" name="plMovieTitle" class="movieTitle"  value="<?php echo $pl_title; ?>">
    <br/> 
    <br/> 
    <br/> 
    <label for="movieEditField">English description</label>  <br/> <br/>
    <textarea name="movieEditField" id="movieEditField" ><?php echo $en_description; ?></textarea>
    <br/>
    <label for="plMovieEditField">Polish description</label>  <br/> <br/>
    <textarea name="plMovieEditField" id="movieEditField" ><?php echo $pl_description; ?></textarea>
    <br/> 
    <label for="image">Movie photo</label>  <br/> <br/>
    <label class="btn btn-secondary">
    <i class="fa fa-image"></i> Add movie photo<input type="file" style="display: none;" name="image">
    </label><br/><br/>
    <label for="moviePremiere">Movie Premiere</label>  <br/> <br/>
   
    <input type="date" name="moviePremiere" class="movieTitle" value="<?php echo $movie_premiere; ?>">
    <input type="submit" class="button-34" value="Save">

</form>
<?php
}
?>
<script src='../tinymce/js/tinymce/tinymce.min.js'></script>
<script>
    tinymce.init({
    selector: '#movieEditField',
    width: 600,
    height: 300,
    
    
    
});
</script>