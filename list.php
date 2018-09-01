<?php

  include "init.php";

  include "header.php";

  if(!($_SESSION['isAdmin'])){
    redirectTo404();
  }

  $sql = "SELECT id,name,description,price,image,time FROM products";
  $result = mysqli_query($conn, $sql);


?>

    <table>
      <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Preis</th>
        <th>Image Path</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php // Schleife über Produkte
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td><?php echo $row['price']; ?>€</td>
      <td><?php echo $row['image']; ?></td>
      <td><a href="edit-product.php?id=<?php echo $row['id']; ?>">Editieren</a></td>
      <td><a href="delete-product.php?id=<?php echo $row['id']; ?>">Löschen</a></td>
    </tr>
    <?php
        }
      }
    ?>
  </tbody>
  </table>


<?php

  include "footer.php";

?>
