<?php

  $servername = "localhost:8889";
  $username = "root";
  $password = "root"; // root on MAMP, leer on WAMP

  $sql_shop_db = "CREATE DATABASE IF NOT EXISTS shop";

  // Nutzer Produkt SQL
  $sql_product_table = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  description TEXT NOT NULL,
  price INTEGER NOT NULL,
  image TEXT NOT NULL,
  time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";


  // Nutzer Tabelle SQL
  $sql_users_table = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(80) UNIQUE NOT NULL,
  password VARCHAR(80) NOT NULL,
  time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // Verbindung mit der MySQL Datenbank herstellen
  $conn = new mysqli($servername, $username, $password);

  // Gab es einen Fehler beim Verbinden?
  if ($conn->connect_error) {
    include "redirect-404.php";
  }


  // Erstelle "shop" Datenbank
  if ($conn->query($sql_shop_db) === FALSE) {
      include "redirect-404.php";
  }


  // Select "shop" Datenbank
  mysqli_select_db($conn,"shop");


  // Erstelle "products" Tabelle
  if ($conn->query($sql_product_table) === FALSE) {
      include "redirect-404.php";
  }

  // Erstelle "users" Tabelle
  if ($conn->query($sql_users_table) === FALSE) {
      include "redirect-404.php";
  }

?>
