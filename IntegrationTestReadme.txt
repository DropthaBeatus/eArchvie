This is shortened version from The Code Readme.txt file.

Each intergration test is split by different webpage.

1.) Login Page at http://ec2-18-221-234-28.us-east-2.compute.amazonaws.com/SoftwareEngineering/
    Enter--> Username: user, Password: pass
  From here you will be redirected to splashpage.php
  
2.) splashpage.php this page displays all items avalable in all warehouses. 
  From here click the bars icon at the top left. This will display 5 options. List redirects to splashpage.html, Search redircts
  you to seach.php, Map redirects you to warehouse.html, add user redirects you to AddUser.html, and Logout redircts you to
  index.html where your login session will end and the user will have to login again.
  
3.) search.php this page will display items will similar or matching names to what the user types into the search bar. 
  Enter--> "apple" this should display 3 different items. From here you can add items by clicking the add item button that is ]
  adjacent to each item. After adding several items items a session will be created that stores each items added into the users
  shopping cart. Our group was not able to finish adding each item to our Orders database table so these items will not be able
  to be processed.
  
4.) Warehouse.html this page will display the warehouse data that corresponds to the user. This warehouse name is TempWarehouse
and already will have items added to a couple of gride boxes when loaded. This page dynamically loads the warehouse dimensions
and each item loades in there specified box. If you click on any box in the grid a pop up will appear at the bottom left of the
page where you can add an item to the box. We did not get a way to check user input here so a good input here should be: 
Enter--->"itemCode1234", "Samsung Galaxy 7", 150.00, 15. This will add the item to the warehouse in that exact spot when the user 
reloads the webpage. This will also add that specified item to the the website's general items database so it will appear in
splashpage.php and search.php

5.) AddUser.html. Enter-->(In order of the form)"TestingUser123", "Password123", "TemporaryWarehouse", "TempWarehouse",  
Manager. 
This will add a default user into the database. Logout out by clicking the box at the bottom left and then log in with the 
created credentials. This then will add a user to a specified warehouse that is already created called TemporaryWarehouse.
This database will be important in index.html, login.php, AddUser.html, and AddUser.php. 

These our all available functions on our website and with these exact inputs there should be no errors for the user/
