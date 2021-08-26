<?php

// Loading of the all the requried composer libraries
require "vendor/autoload.php";

// initializing of the fatfree
$f3 = \Base::instance();

//configuration
$f3->set("AUTOLOAD", "App/Controllers/,App/Models/"); //tell f3 where to look for controllers and models
$f3->set("UI", "App/Views/"); // tell f3 where to look for views

$f3->set("DEBUG", 3);
//start new session (Alex)
session_start();

// creating variable to change code on the pages if the user is logged-in (Alex)
$f3->set("logged_in", $_SESSION["logged_in"]);
$f3->set("show_name", $_SESSION["name"]);


$f3->route("GET /", "InformationController->homepage");
$f3->route("GET /auction", "AuctionsController->listAllAuctions");
$f3->route("GET /items/@qid", "ItemsController->listAnItem");

//create the route for users registration 
$f3->route("GET /Registration", "UsersController->UsersRegistration");
$f3->route("POST /RegisterUser", "UsersController->saveUsers");

//create the route for login form (Alex)
//$f3 ->route("GET /login", "UsersController->userLogin");
$f3->route("POST /login", "UsersController->userLogin");


//create the route for logout form (Alex)
//$f3 ->route("GET /login", "UsersController->userLogin");
$f3->route("POST /logout", "UsersController->userLogout");
$f3->route("GET /items", "ItemsController->itemsRegistration");

$f3->route("POST /items", "ItemsController->saveItems");


$f3->route("GET /profile", "ItemsController->usersProfile");

$f3->route("GET /delete/@iid","ItemsController->deleteSingleItem");


//create the route to get and show list of ended items only on the auction page  
$f3 ->route("GET /ended_true", "AuctionsController->endedItems");
//create the route to get and show list of all items on the auction page 
$f3 ->route("GET /ended_false", "AuctionsController->listAllAuctions");


// execute fatfree
$f3->run(); 