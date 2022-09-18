<?php
session_start();

class SigninHelper extends Db{
    
    public function checkUser($username,$password){
        
        
        $stmt=$this->connect()->prepare('SELECT adminId,adminPassword FROM admin WHERE adminName=?');
        
        
        if(!$stmt->execute([$username])){
            $stmt=null;
           
            header("Location: ./loginMain.php?error=database_error");
            
            exit();

        }
        
        if($stmt->rowCount()==0){
            $stmt=null;
            if($_SESSION["lang"]=="en"){
                header("Location: ./loginMain.php?error=usernotfound&lang=pl");
            }else{
                header("Location: ./loginMain.php?error=usernotfound&lang=en");
            }
            exit();
        }

        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $checkPwd=password_verify($password, $result[0]["adminPassword"]);
  

        if($checkPwd==false){
            $stmt=null;
            if($_SESSION["lang"]=="en"){
            header("Location: ./loginMain.php?error=invalid&lang=pl");
            }else{
                header("Location: ./loginMain.php?error=invalid&lang=en");
            }
            exit();
        }else{
           
            
            $_SESSION["userId"]=$result[0]["adminId"];
            header("location:../AdminPanel/adminPanel.php");
            
        }
        
        
    }

    

}