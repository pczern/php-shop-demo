<?php


// Logout Funktion
function logout() {
    $_SESSION["isLoggedIn"] = false;
    $_SESSION["username"] = "";
    $_SESSION["password"] = "";
    $_SESSION["cart"] = "";
}


function login($conn, $username, $password) {
  // Escape Nutzerdaten, falls sich Nutzer einloggen will.
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password);

  // Hole Nutzer aus Datenbank
  $result = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

  // Wenn Ergebnis, dann logge ein sonst, setze auf log out
  if (!(mysqli_fetch_assoc($result))) {
    $_SESSION["isLoggedIn"] = FALSE;
  }else{
    $_SESSION["isLoggedIn"] = TRUE;
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
  }
}



function loginAsAdmin($username, $password) {

  if($username === 'admin' AND $password === 'test'){
    $_SESSION['isAdmin'] = TRUE;
    $_SESSION["isLoggedIn"] = TRUE;
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
  }

}

function register($conn, $username, $password){

  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);

  $sql = "INSERT INTO users (username, password)
  VALUES ('$username', '$password')";

  if($conn->query($sql)){
    $_SESSION["isLoggedIn"] = TRUE;
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
  }else{
    $_SESSION["isLoggedIn"] = FALSE;
  }
}


?>
