<?php

  include "init.php";
  include "header.php";


  $sql1 = "SELECT id,name,description,price,image,time FROM products";
  $result = mysqli_query($conn, $sql1);

  // wenn Nutzer sich nicht einloggen konnte
  if (isset($_POST['login']) && !$_SESSION["isLoggedIn"]) {

?>
      <h1>Login fehlgeschlagen</h1>
      <p>Deine Daten waren falsch.</p>
<?php

  } else {

?>

  <h1>Produkte</h1>
  <div class="product-item-list">

  <?php // Schleife über Produkte
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
  ?>
        <a href="product.php?id=<?php echo $row['id']; ?>" class="product-item">
          <img class="image" src="<?php echo IMAGE_PFAD . $row['image']; ?>" />
          <div class="details" >
            <h3 class="name" ><?php echo $row['name']; ?></h3>
            <span class="price" ><span class="price-euro">€</span> <span class="price-value"><?php echo $row['price']; ?></span></span>
            <p class="description" ><?php echo substr($row['description'], 0, 50); ?></p>
            <time class="time" ><?php echo $row['time']; ?></time>
          </div>
        </a>

  <?php
        }
    }
    else {
  ?>
      <p>Keine Produkte</p>

  <?php
    }
  }
?>

</div>

<?php include "footer.php" ?>
