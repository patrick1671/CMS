<?php
class GetData extends Db{
    public function getPlData(){
        $stmt=$this->connect()->prepare('SELECT pl_title,pl_description,movie_photo,movie_premiere FROM movies');
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getEnData(){
        $stmt=$this->connect()->prepare('SELECT en_title,en_description,movie_photo,movie_premiere FROM movies');
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAllData(){
        $stmt=$this->connect()->prepare('SELECT id,en_title,pl_title,en_description,pl_description,movie_photo,movie_premiere FROM movies');
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getDataById($id){
        $stmt=$this->connect()->prepare("SELECT id,en_title,pl_title,en_description,pl_description,movie_photo,movie_premiere FROM movies WHERE id='$id'");
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



}

?>