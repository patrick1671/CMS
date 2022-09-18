<?php


class Db{
    protected function connect(){
        try{
           $db=new PDO('mysql:host=localhost;dbname=zadanie',"root","");
           $db -> query ('SET NAMES utf8');
          
           return $db;
            
        }catch(PDOException $e){
            print "Error";
            die();
        }
    }
}