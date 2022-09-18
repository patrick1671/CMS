<?php


if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $lang=$_POST["name"];
    include "../DatabaseConnect/Db.php";
    include "./SigninHelper.php";
    

    $signin=new SigninHelper($username, $password);
    $signin->checkUser($username,$password);
}