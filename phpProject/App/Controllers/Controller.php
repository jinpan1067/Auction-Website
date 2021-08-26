<?php // Controller/Controller.php

class Controller{

  protected $db;

  function __construct(){

		//setting up db instance so we can use it
    $this->db = new DB\SQL(
      "mysql:host=localhost;port=3307;dbname=ipd25_project", //db conenction
			"ipd25", //db user
			"ipd25_pw" // db password
    );
	}
}