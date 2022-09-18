
<?php
include "./ManageMovies.php";
session_start();
if(isset($_SESSION["userId"])){


    $_SESSION["id"]=$_GET["name"];
    $data=new ManageMovies($_SESSION["id"]);
    $data->deleteData($_SESSION["id"]);
    header("Location: ./adminPanel.php");
}
?>