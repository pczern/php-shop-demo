<?php






  // Will der Nutzer sich einloggen? Sind die Daten gesendet?
  if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])){
    login($conn, $_POST['username'], $_POST['password']);
  }

  if(isset($_POST['admin']) && isset($_POST['username']) && isset($_POST['password'])){
    loginAsAdmin($_POST['username'], $_POST['password']);
  }

  include "html-head.php"

?>
