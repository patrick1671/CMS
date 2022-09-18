<?php
session_start();
$_SESSION["lang"]="pl";
$language="Angielski";
$URL=parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$langTab=["Strona główna","Zaloguj się","Kontakt"];

if(isset($_GET["lang"]) && $_GET["lang"]=="pl" ){
  
  $_SESSION["lang"]="en";
  $language="Angielski";
}else if(isset($_GET["lang"]) && $_GET["lang"]=="en" ){
  $_SESSION["lang"]="pl";
  $language="Polish";
  $langTab=["Home","Signin","Contact"];
}

?>
<div class="nav-container">
    <section class="navigation">
      <div class="nav-container">
       
        <nav>
          <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
          <ul class="nav-list">
            <li>
              <a href="../UserPanel/index.php?lang=pl"><?php echo $langTab[0];?></a>
            </li>
            <li>
              <a href="../Signin/loginMain.php?lang=pl"><?php echo $langTab[1];?></a>
            </li>
            <li>
              <a href="../Contact/Contact.php?lang=pl"><?php echo $langTab[2];?></a>
            </li>
            <li>  
              <a href="<?php echo $URL."?lang=".$_SESSION["lang"]?>"><?php echo $language ?> </a>
            </li>
          </ul>
         
        </nav>
      </div>
    </section>
    
   
</div>
