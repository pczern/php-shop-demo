<?php

include "init.php";
include "header.php";

?>

  <h1>Login</h1>
  <form action="index.php" method="post">
    <label>Nutzername
      <input name="username" type="text" />
    </label>
    <label>Passwort
      <input name="password" type="password" />
    </label>
    <input type="submit" name="login" value="Einloggen" />
  </form>

<?php

include "footer.php"

?>
