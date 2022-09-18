<?php
session_start();

if(isset($_SESSION["userId"])){
include "./ManageMovies.php";
if($_SESSION["action"]==="CREATE"){
    $data=new ManageMovies($_POST['movieTitle'],$_POST['plMovieTitle'],$_POST['movieEditField'],$_POST['plMovieEditField'],$_POST['moviePremiere'],$_FILES["image"]["name"]);
    $data->createData($_POST['movieTitle'],$_POST['plMovieTitle'],$_POST['movieEditField'],$_POST['plMovieEditField'],$_POST['moviePremiere'],$_FILES["image"]["name"]);
    
}else{

$data=new ManageMovies($_SESSION["id"],$_POST['movieTitle'],$_POST['plMovieTitle'],$_POST['movieEditField'],$_POST['plMovieEditField'],$_POST['moviePremiere'],$_FILES["image"]["name"]);

$data->editData($_SESSION["id"],$_POST['movieTitle'],$_POST['plMovieTitle'],$_POST['movieEditField'],$_POST['plMovieEditField'],$_POST['moviePremiere'],$_FILES["image"]["name"]);
}
header("Location: ./adminPanel.php");
}