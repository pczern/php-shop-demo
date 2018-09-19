# php-shop-demo
**an easy customizable php shop**

php-shop-demo allows you to **create**, **edit**, **delete products** as admin.  
Additionally it allows you as customer to put certain items in your **cart**, add more of them or remove them. 

It provides a register and login page, as well as a secret admin page.  

## Important
Change MySQL DB configuration to fit your setup, in db.php  
Settings are currently configured like:
```javascript
$servername = "localhost:8889";
$username = "root";
$password = "root"; // root on MAMP
```


## Pages
* /login.php - login
* /register.php - register a new account
* /index.php - homepage, showing list of items
* /404.php - error page
* /agb.php
* /versand.php
* /contact.php - see contact information
* /impressum.php
* /product.php?id=1 - product detail page
* /cart.php - shows all your added products
* /buy.php - buys everything in the cart
* /logout.php - logs you out

Requires login as admin under /admin (name: admin, pw: test)
* /create-product.php - creates a product
* /list.php - listing all products
* /edit-product.php?id=1 - edit a product
* /delete-product.php?id=1 - delete a product
