<?php


include "init.php";
include "header.php";

  if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])){

     register($conn, $_POST['username'], $_POST['password']);
   }
?>


  <h1>Registrieren</h1>
  <?php
    if(isset($_POST['submit'])){
      if ($_SESSION['isLoggedIn']) {
        ?>
        <p>Nutzer erfolgreich erstellt</p>
        <a href="./index.php">Klicke hier</a>
        <?php
      }
      else {
        ?>
        <p>Fehler beim erstellen des Nutzers</p>
        <?php
      }
    }else{
      ?>
      <form action="./register.php" method="post">
        <label>Nutzername
          <input maxlength="80" name="username" type="text" />
        </label>
        <label>Passwort
          <input maxlength="80" name="password" type="password" />
        </label>
        <input name="submit" type="submit" value="Registrieren" />
      </form>
      <?php
    }
    ?>

<?php

include "footer.php"

?>
