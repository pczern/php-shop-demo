<?php


define('CART', 'cart');


function toCartItem($id, $amount){
  $item = new stdClass();
  $item->id = $id;
  $item->amount = $amount;
  return $item;
}

function addToCart($id, $amount){
  updateCart($id, $amount);
}

function isItemWithIdInCart($id){
  foreach (getCart() as $key => $item) {
    if($item->id == $id){
      return $item;
    }
  }

  return false;
}

function getCart(){
  $newItems = array();
  if (isset($_SESSION[CART]) && strlen($_SESSION[CART])) {

    $itemsSplitted = explode(";", substr($_SESSION[CART], 0, -1));
    foreach ($itemsSplitted as $key => $value) {
      $data = explode(",", $value);
      $item = toCartItem($data[0], $data[1]);
      array_push($newItems, $item);
    }
  }

  return $newItems;
}

function updateCart($id, $amount){
  $newItem = toCartItem($id, $amount);
  $newCart = '';
  $cart = getCart();
  $itemWasAlreadyInCart = FALSE;
  foreach ($cart as $key => $item) {
    if(strcmp($item->id, $newItem->id) === 0){
      $itemWasAlreadyInCart = TRUE;
      if(intval($newItem->amount) < 1){ // delete item if amount 0 or less
        continue;
      }else{
        $newCart .= "$newItem->id,$newItem->amount;";
      }
    }else{
      $newCart .= "$item->id,$item->amount;";
    }

  }
  if($itemWasAlreadyInCart === FALSE && $amount > 0){

    $newCart .= "$newItem->id,$newItem->amount;";
  }

  $_SESSION[CART] = $newCart;
  return $cart;
}

function cleanCart(){
  $_SESSION[CART] = "";
  return true;
}

function removeFromCart($id){
  updateCart($id, 0);
}

function getCartItemFromId($id){
  foreach (getCart() as $key => $item) {
    if($item->id == $id){
      return $item;
    }
  }

  return false;
}



?>
