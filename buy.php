<?php

  include "init.php";
  include "header.php";

  if(!($_SESSION['isLoggedIn'])){
    redirectTo404();
  }

  cleanCart();

?>

  <h1>Einkauf</h1>
  <p>Du hast erfolgreich eingekauft</p>


<?php

  include "footer.php"

?>
