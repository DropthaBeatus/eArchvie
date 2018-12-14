# Group 12 eArchvie

Code Readme 
http://ec2-18-221-234-28.us-east-2.compute.amazonaws.com/SoftwareEngineering/

All scripts and webpages have all the following requirements to run: A successful login for the index.html page, a internet connection that does not restrict web access to the website and SQL database, and an up to date browser that can support javascript and HTML 5. 
1. index.html: Verifies a user of the account so they will have access to the websites features. This is necessary for the every other page of the website. To login use ---> username : user password: pass 
	a. Important Code: $('#form').submit(function(event){...} - Submits the users information to the login.php script where that page will store the user’s information so they have access to all the necessary functions. 
2. Warehouse.html : Gets the user’s personal warehouse information. This page will present a dynamic GUI that will present a model of the warehouse in a 10x10 ft squares. 
	a. Important Code: .get('getWarehouse.php', function(data){....} - Gets the user’s warehouse information including its size, its name, and ID. This information will pull it from the session page of Login.php eventually. 
	b. Important Code: testingclickingthing() - When the warehouse information is loaded this will create a dynamic map in which the user can clic each box in the map grid to add items.
	c. Important Code: sumbitToStore() - When the user click on a grid in the map layout of the warehouse a popup at the bottom left corner is displayed. We did not get a way to check user input here so a good input here should be: "itemCode1234", "Samsung Galaxy 7", 150.00, 15. This will add the item to the warehouse in that exact spot when the user reloads the webpage. This not only adds the item to Warehouse.html page but to SplashPage.html item list. 
	d. Corressponding Scripts written by same person: getWarehouse.php, getBoxItems.php, getMyStuff.php, getOrders.php and addItemsToWhole.php. These will be used by the webpage and not the user as they are server end.
3. Create.php : Will create users for the website. This is given to Admin accounts so they can assign different roles for their warehouse. This runs on its own from AddUser.html and AddUserPHP.php
	a. Important Code: $query = "INSERT INTO users (username, password, addDate, changeDate) VALUES ('$username', '$password', now(), '$DOB');";. - Submits user data to the SQL database. 
4. getItems.php : Gets all items from the item catalog (item database). This will mainly be used for customers for shopping they can then add items in a shopping cart where the items are stored in a php session. 
	a. Important Code: $query = “Select * FROM user;”; - gets all items from the database. 
5. dbcontroller.php : creates a session for user to login. We have no created a secure login session for this script so we will keep it offline until then.  
6. Search.php - used to create an instance of a shopping cart for the user. It does this by create a php session that stores each item that the user clicks on to order.  
	a. Important Code: case "remove": 
if(!empty($_SESSION["cart_item"])) { foreach($_SESSION["cart_item"] as $k => $v) { if($_GET["code"] == $k) unset($_SESSION["cart_item"][$k]); if(empty($_SESSION["cart_item"])) unset($_SESSION["cart_item"]); 
} break; 
case "empty": unset($_SESSION["cart_item"]); break; 
This removes items from the shopping cart. If the shopping cart becomes empty it will end the php session. 
if(!empty($_POST["quantity"])) { 
$productByCode = $db_handle->runQuery("SELECT * FROM Items"); This creates a list of all available items to be purchased. 
f(!empty($_SESSION["cart_item"])) { if(in_array($productByCode[0]["itemCode"],array_keys($_SESSION["ca t_item"]))) { foreach($_SESSION["cart_item"] as $k => $v) { if($productByCode[0]["itemCode"] == $k) { if(empty($_SESSION["cart_item"][$k]["quantity"])) { $_SESSION["cart_item"][$k]["quantity"] = 0; } $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"]; } } } else { $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray); } } else { $_SESSION["cart_item"] = $itemArray; } } 
This will create the shopping cart queue and add the selected item to the queue. 
	b. Corresponding Script: search.php and searchItems.php. These will be used by the webpage and not the user as they are server end.
7.SplashPage.php: This page is essentially just an echo if every item that is in the warehouse  
8.SearchItems.php: This page Holds the search bar and enables the user to search through the database and add the item they search for to their personal shopping cart  
9.AddUser.php: This page enables the user to add another user to the database and push that information through to be used as a login later.  
10.Unnecessary, unfinished, or retired pages: splashpage.html, getWarehouse.html, searchItems.php, test.php.  

Database Layout

create table StoreItems (
	id int primary key auto_increment,
    WarehouseID varchar(255) NOT NULL,
	itemCode varchar(255) NOT NULL,
    itemName varchar(255) NOT NULL,
    itemQuantity int,
    itemCost FLOAT,
    itemLocX int,
    itemLocY int
    );
    
    Used in Warehouse.html in the popup box when the user clicks a specific grid. Enter 
    
create table Orders(
	id int primary key auto_increment,
    orderID varchar(255) NOT NULL,
	itemCode varchar(255) NOT NULL,
    itemName varchar(255) NOT NULL,
    itemQuantity int
    );
    
    We did not get a way to check user input here so a good input here should be: "itemCode1234", "Samsung Galaxy 7", 150.00, 15. This will add the item to the warehouse in that exact spot when the user reloads the webpage. 
    This database will default not be used as orders can not be completed from the shopping via SplashPage.php and Search.php
    
create table Warehouse (
		WarehouseID varchar(255) primary key,
        warehouseName varchar(255),
        warehouseHeight int,
        warehouseLength int
    );
    
    This database will only be read in Warehouse.html and not created as we did not get enough time to add to this database.
        
create table Users (
	id int primary key auto_increment,
    user varchar(255) NOT NULL,
    Passworduser varchar(255) NOT NULL,
	adminCred varchar(255),
    WarehouseID varchar(255),
    warehouseName varchar(255)
    );
    
    In AddUser.html a you can add the following into the form: "TestingUser123", "Password123", "TemporaryWarehouse", "TempWarehouse",  Manager. This will add a default user into the database. Logout out by clicking the box at the bottom left and then log in with the created credentials. This then will add a user to a specified warehouse that is already created called TemporaryWarehouse.
    This database will be important in index.html, login.php, AddUser.html, and AddUser.php.  
    
    
create table Items (
	itemCode varchar(255) primary key NOT NULL,
    itemName varchar(255) NOT NULL,
    itemQuantity int,
    itemCost FLOAT
    );
    
 Example Insets into PHP scripts (Users do not see this):
insert into Items(itemCode, itemName, itemQuantity, itemCost) values("XYZ", "Motherboard - AMD4", 3, "55.72");
insert into Users( user, passwordUser, adminCred, WarehouseID, warehouseName) values ('user' , 'pass', 'ADMIN' ,'TemporaryWarehouse' , 'TempWareHouse');

insert into Warehouse(WarehouseID, warehouseName, warehouseHeight, warehouseLength) values ('TemporaryWarehouse' , 'TempWareHouse',  100, 100 );
insert into Orders(id, orderID, itemCode, itemName, itemQuantity) values(0, '123412341234', "CD134adfYIs", "Samsung USB 3.0 128GB",  12);
insert into StoreItems(	id, WarehouseID, itemCode, itemName, itemQuantity, itemCost, itemLocX, itemLocY) values(0, 'TemporaryWarehouse', "CD134adfYIs", "Samsung USB 3.0 128GB",  243, "43.79", 1, 1);
