<?php

  include "init.php";
  include "header.php";

  if(!($_SESSION['isAdmin'])){
    redirectTo404();
  }

  if(isset($_POST['submit']) && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image'])){
    $product = editProduct($conn, $_POST['id'], array(
      "name" => $_POST['name'],
      "description" => $_POST['description'],
      "price" => $_POST['price'],
      "image" => $_FILES['image']
    ));


    if(!$product){
     redirectTo404();
   }else{
     $product = getProduct($conn, $_POST['id']);

      ?>
      <p class="info">Produkt editiert</p>
      <?php
    }
  }else if(isset($_GET['id'])){


    $product = getProduct($conn, $_GET['id']);
  }else{
    redirectTo404();
  }

?>

<form enctype="multipart/form-data" method="post" action="edit-product.php">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>" />
    <label>
        Name
        <input name="name" type="text" maxlength="80" value="<?php echo $product->name; ?>"/>
    </label>

    <label>
        Description
        <textarea name="description" type="text" ><?php echo $product->description; ?></textarea>
    </label>
    <label>
       Preis
        <input name="price" type="number" value="<?php echo $product->price; ?>"/>
    </label>
    <label>
        Bild
        <input name="image" type="file"/>
    </label>
    <input name="submit" type="submit" />
</form>

<?php

  include "footer.php"

?>
