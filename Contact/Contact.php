<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Contact.css" />
    <link rel="stylesheet" href="../Include/navBar.css" />
    <title></title>
  </head>
  <body>
    <?php
    require_once("../Include/navbar.php");
    $langTab=["Skontaktuj się z nami","Wpisz email","Wpisz poprawny email","Wpisz wiadomość","Musisz wypełnić pole wiadomości","Akceptuję politykę prywatności","Musisz wyrazić zgodę","Wyślij","Dziękujemy za kontakt, wkrótce odezwiemy się na email podany w formularzu"];
    if(isset($_GET["lang"]) && $_GET["lang"]=="pl" ){
      
      $_SESSION["lang"]="en";
      $language="Angielski";
    }else if(isset($_GET["lang"]) && $_GET["lang"]=="en" ){
      $_SESSION["lang"]="pl";
      $language="Polish";
      $langTab=["Sign in to Admin Panel","Email","Email address is invalid","Enter your message","Message cannot be empty","Accept Privacy Policy","You must agree Privacy Policy","Submit","Thank you for contact"];
    }
    ?>
    <div class="container">
      <form id="contact" method="post" action="send.php">
        <h3><?php echo $langTab[0]?></h3>

        <fieldset>
          <input
            placeholder="<?php echo $langTab[1]?>"
            type="email"
            name="email"
            required
            id="email"
            data-error-text="<?php echo $langTab[2]?>"
            tabindex="2"
          />
        </fieldset>

        <fieldset>
          <textarea
            placeholder="<?php echo $langTab[3]?>"
            name="message"
            required
            data-error-text="<?php echo $langTab[4]?>"
            id="message"
            tabindex="5"
          ></textarea>
        </fieldset>
        <fieldset>
        <div class="form-row checkbox-container">
          <input
            type="checkbox"
            name="checkbox"
            required
            data-error-text="<?php echo $langTab[6]?>"
            id="checkbox"
          />
          <label for="checkbox" id="checkbox-span"
            ><?php echo $langTab[5]?></span
          >
        </div>
      </fieldset>
        <fieldset>
          <button
            name="submit"
            type="submit"
            id="contact-submit"
            data-submit="...Sending"
          >
          <?php echo $langTab[7]?>
          </button>
        </fieldset>
      <input type="hidden" id="alert-form" name="<?php echo $langTab[8]?>">
      </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="validation.js"></script>
    <script src="../Include/nav.js"></script>
  </body>
</html>
