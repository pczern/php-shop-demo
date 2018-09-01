<?php

include "init.php";
include "header.php";

if(!($_SESSION["isLoggedIn"])){
  redirectTo404();
}

if(isset($_POST['id'])){
  updateCart($_POST['id'], 0);
}


?>

<h1>Warenkorb</h1>
<?php

$cart = getCart();
if($cart){
?>
<table>
  <thead>
  <tr>
    <th>Name</th>
    <th>Preis</th>
    <th>Menge</th>
    <th></th>
    <th></th>
  </tr>
</thead>
<tbody>
<?php
$costs = 0;
  foreach ($cart as $key => $item) {
    $product = getProduct($conn, $item->id);
    $costs += intval($product->price) * $item->amount;
?>
    <tr>
      <td><?php echo $product->name; ?></td>
      <td><?php echo $product->price ?> €</td>
      <td><?php echo $item->amount ?></td>
      <td><a href="product.php?id=<?php echo $item->id; ?>">Editieren</a></td>
      <td>
        <form id="delete-form-<?php echo $product->id; ?>" method="post" action="cart.php">
          <input type="hidden" name="id" value="<?php echo $product->id; ?>" />
          <a onclick="document.getElementById('delete-form-<?php echo $product->id; ?>').submit()">Löschen</a>
        </form>
      </td>
    </tr>


<?php
  }
?>
  <tr>
    <td>Endpreis</td>
    <td><?php echo $costs; ?> €</td>
    <td></td>
    <td></td>
    <td><a href="buy.php">Kaufen</a></td>
  </tr>
</tbody>
</table>
<?php

}else{
?>
<p class="info">Dein Warenkorb ist leer!</p>

<?php
}
include "footer.php";

?>
