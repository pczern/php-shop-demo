<?php

include "init.php";
include "header.php";



  $isGet = isset($_GET['id']);
  $isPost = isset($_POST['id']);


  $id = $isGet ? $_GET['id'] : $_POST['id'];

  if(!$isGet && !$isPost){
    redirectTo404();
  }



  $isProductNewlyAdded = isset($_POST['shopping']) && isset($_POST['id']) && isset($_POST['amount']) && $_POST['amount'] > 0;






  $cartItem = isItemWithIdInCart($id);

  if($isGet && $cartItem){
    print "<p class='info'>Das Produkt ist bereits in deinem Warenkorb</p>";

  }


  if($isProductNewlyAdded){
    addToCart($id, $_POST['amount']);
    print "<p class='info'>Das Produkt wurde erfolgreich zum Warenkorb hinzugefügt.</p>";
  }

  if($isPost && !$isProductNewlyAdded){
    print "<p class='info'>Bitte gebe eine echte Produkt Menge an.</p>";
  }

  // set amount
  $amount;
  if($isProductNewlyAdded){
    $amount = $_POST['amount'];
  }else if(isset($cartItem->amount)){
    $amount = $cartItem->amount;
  }else{
    $amount = 1;
  }

  $item = getProduct($conn, $id);





?>
<div class="product-detail-page">
  <div class="product">
            <img src="<?php printImagePath($item->image);  ?>" />
            <div class="details">
            <h1><?php echo $item->name; ?></h1>
            <p><strong>Beschreibung</strong><br />$<?php echo $item->description; ?></p>
            <p><strong>Preis</strong><br /><?php echo $item->price; ?> €</p>
            <time><?php echo $item->time; ?></time>
          </div>
        </div>

            <?php if($_SESSION["isLoggedIn"]){
            ?>
                <form action="product.php" method="post">
                  <h2>Füge das Produkt hinzu</h2>
                  <input name="id" type="hidden" value="<?php echo $item->id; ?>" />
                  <input name="amount" type="number" value="<?php echo $amount; ?>" />

                <?php
                  if($cartItem){

                ?>
                  <input value="Produkt updaten" name="shopping" type="submit" />
                <?php
              }else{
                ?>
                  <input value="In den Warenkorb" name="shopping" type="submit" />
                <?php
              }
                ?>
                </form>
            <?php } ?>
</div>



<?php include 'footer.php' ?>
