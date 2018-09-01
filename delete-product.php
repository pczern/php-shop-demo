<?php

  include "init.php";
  include "header.php";


  if(!($_SESSION['isAdmin'])){
    redirectTo404();
  }

  if(isset($_GET['id'])){
    $isDeleted = deleteProduct($conn, $_GET['id']);
  }

  if(!$isDeleted){
    redirectTo404();
  }

?>

  <h1>Produkt gelöscht</h1>
  <p>Produkt erfolgreich gelöscht</p>

<?php

  include "footer.php"

?>
