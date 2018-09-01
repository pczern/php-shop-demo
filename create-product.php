<?php


  include 'init.php';


  if(!($_SESSION['isAdmin'])){
    redirectTo404();
  }

  include 'header.php';


  // Wenn Produkt abgesendet
  if (
    isset($_POST['submit']) &&
    isset($_POST['name']) &&
    isset($_POST['description']) &&
    isset($_POST['price']) &&
    isset($_FILES['image'])) {

      $product = createProduct($conn, array(
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "price" => $_POST['price'],
        "image" => $_FILES['image']
      ));
      
      if(!$product){
        //redirectTo404();
      }
    }
?>
  <?php if(isset($product)){ ?>
    <p class="info">Produkt erfolgreich erstellt</p>
  <?php } ?>

        <form enctype="multipart/form-data" method="post" action="create-product.php">
            <label>
                Name
                <input name="name" type="text" maxlength="80"/>
            </label>

            <label>
                Description
                <textarea name="description" type="text"></textarea>
            </label>
            <label>
               Preis
                <input name="price" type="number" />
            </label>
            <label>
                Bild
                <input name="image" type="file" />
            </label>
            <input name="submit" type="submit" />
        </form>



<?php include 'footer.php' ?>
