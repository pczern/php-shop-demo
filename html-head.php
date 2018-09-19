
<!DOCTYPE HTML>
<html>

<head>
    <title>Online Shop</title>
    <meta charset="utf-8" />
    <meta name="author" content="Philipp Czernitzki" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="./styles.css" type="text/css" rel="stylesheet">
</head>

<body class="index">

    <header>
        <nav id="header-inner">
            <a href="./index.php" id="logo">Online Shop</a>
            <ul>
               <?php
                if($_SESSION["isLoggedIn"]){
                    ?>
                     <li><a href="./index.php">Hallo, <?php echo $_SESSION["username"]; ?></a></li>
                     <?php if($_SESSION["isAdmin"]){ ?>
                       <li><a href="./create-product.php">Erstellen</a></li>
                       <li><a href="./list.php">Liste</a></li>
                     <?php } ?>
                     <li><a href="./cart.php">Warenkorb</a></li>
                     <li><a href="./logout.php">Abmelden</a></li>
                    <?php
                }else{
                    ?>

                    <li><a href="./register.php">Registrieren</a></li>
                    <li><a href="./login.php">Anmelden</a></li>
                    <?php
                }

               ?>
            </ul>
        </nav>
    </header>
    <main>
