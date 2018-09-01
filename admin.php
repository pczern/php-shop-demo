<?php

  include "init.php";
  include "header.php";

?>

  <h1>Diese Seite ist unter Konstruktion</h1>
  <form action="index.php" method="post">
    <label>Nutzername
      <input name="username" type="text" />
    </label>
    <label>Passwort
      <input name="password" type="password" />
    </label>
    <input type="submit" name="admin" value="Einloggen" />
  </form>


<?php

  include "footer.php"

?>
