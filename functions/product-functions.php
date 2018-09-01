<?php

define('IMAGE_PFAD', 'images/');



function printImagePath($images){
  echo IMAGE_PFAD . $images;
}


function createProduct($conn, $data){
  // Escapen
  $name = $conn->real_escape_string($data['name']);
  $description = $conn->real_escape_string($data['description']);
  $price = $conn->real_escape_string($data['price']);
  $image = $conn->real_escape_string($data['image']['name']);

  $imageZiel = IMAGE_PFAD . $image;

  // Produkt einfuegen SQL
  $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";

  // Bild speichern
  if (move_uploaded_file($data['image']['tmp_name'], $imageZiel)) {
    $result = mysqli_query($conn, $sql);
    return $result; // boolean
  }
  return null;
}

function getProduct($conn, $id){
  $sql = "SELECT * FROM products WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  if($result)
    return mysqli_fetch_object($result);
  return false;
}

function editProduct($conn, $id, $data){
  $id = $conn->real_escape_string($id);
  $name = $conn->real_escape_string($data['name']);
  $description = $conn->real_escape_string($data['description']);
  $price = $conn->real_escape_string($data['price']);
  $image = $conn->real_escape_string($data['image']['name']);
  $imageZiel = IMAGE_PFAD . $image;

  if (move_uploaded_file($data['image']['tmp_name'], $imageZiel)) {
    $sql = "UPDATE products SET name = '$name', description = '$description', price = '$price', image = '$image' WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    return $result; // boolean
  }
  return null;
}

function deleteProduct($conn, $id){
  $sql = "DELETE FROM products WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  return $result; // boolean
}




?>
