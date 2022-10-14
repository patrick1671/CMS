
<?php
include "../DatabaseConnect/Db.php";
class ManageMovies extends Db{
    public function editPhoto($photo){
        $fileName = basename($photo); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            return $imgContent = addslashes(file_get_contents($image));

        }
    }
    public function editData($movieId,$en_title,$pl_title,$en_description,$pl_description,$premiere_date,$image){
        $movieId= $this->connect()->quote($movieId);
        $en_title= $this->connect()->quote($en_title);
        $pl_title= $this->connect()->quote($pl_title);
        $en_description= $this->connect()->quote($en_description);
        $pl_description= $this->connect()->quote($pl_description);
        $premiere_date= $this->connect()->quote($premiere_date);

      
        $imgContent=$this->editPhoto($image);
       
        if($imgContent!=null){
        $stmt=$this->connect()->prepare("UPDATE movies SET en_title=$en_title,pl_title=$pl_title,en_description=$en_description,pl_description=$pl_description,movie_premiere=$premiere_date,movie_photo='$imgContent' WHERE id=$movieId");
        }else{
            $stmt=$this->connect()->prepare("UPDATE movies SET en_title=$en_title,pl_title=$pl_title,en_description=$en_description,pl_description=$pl_description,movie_premiere=$premiere_date WHERE id=$movieId");
        }
        $stmt->execute();
        
    }
    public function deleteData($movieId){
        
        $stmt=$this->connect()->prepare("DELETE FROM movies WHERE id='$movieId'");
        $stmt->execute();
    }
    public function createData($en_title,$pl_title,$en_description,$pl_description,$premiere_date,$image){
        
        $en_title= $this->connect()->quote($en_title);
        $pl_title= $this->connect()->quote($pl_title);
        $en_description= $this->connect()->quote($en_description);
        $pl_description= $this->connect()->quote($pl_description);
        $premiere_date= $this->connect()->quote($premiere_date);



        $imgContent=$this->editPhoto($image);
        
        $stmt=$this->connect()->prepare("INSERT INTO movies(en_title,en_description,pl_title,pl_description,movie_premiere,movie_photo) VALUES($en_title,$en_description,$pl_title,$pl_description,$premiere_date,'$imgContent')");
        $stmt->execute();
    }
}   
