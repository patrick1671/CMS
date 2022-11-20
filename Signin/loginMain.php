<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css" />
  <title>Login</title>
</head>
<body>
<?php 
require_once("../Include/navBar.php");
$langTab=["Zaloguj się","Login","Hasło","Wyślij","Złe dane"];

if(isset($_GET["lang"]) && $_GET["lang"]=="pl" ){
  

  $_SESSION["lang"]="en";
  $language="Angielski";
}else if(isset($_GET["lang"]) && $_GET["lang"]=="en" ){
  
  $_SESSION["lang"]="pl";
  $language="Polish";
  $langTab=["Sign in to Admin Panel","Login","Password","Submit","Invalid"];
}


?>
      </section>
      
     
  </div>
  <div class="container">
<form id="admin-signin" method="post" action="signin.php">
  <h3><?php echo $langTab[0]?></h3>

  <fieldset>
    <input
      placeholder="<?php echo $langTab[1]?>"
      type="text"
      name="username"
      required
    />
  </fieldset>

  <fieldset>
    <input placeholder="<?php echo $langTab[2]?>" name="password" type="password" required />
   
  </fieldset>
  
  <fieldset>
    <button name="submit" type="submit" id="signin-submit"><?php echo $langTab[3]?></button>
  </fieldset>
</form>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../Include/nav.js"></script>
<?php
if(isset($_GET["error"])){
  ?>
<script type='text/javascript'>alert('<?php echo $langTab[4] ?>')</script>
<?php }?>
</html>





