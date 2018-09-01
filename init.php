<?php





  // Starte Session
  session_start();


  // wenn der Nutzer nicht eingeloggt ist
  // setze isLoggedIn auf false
  if(isset($_SESSION["isLoggedIn"]) === FALSE){
    $_SESSION["isLoggedIn"] = false;
  }

  if(isset($_SESSION["isAdmin"]) === FALSE){
    $_SESSION["isAdmin"] = false;
  }

  include "db.php";
  include "functions/index.php";



?>
