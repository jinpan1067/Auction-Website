<?php

class InformationController extends Controller{
	
	private $model; 

	
	function __construct(){
		parent::__construct(); 

		
		$this->model = new Auction( $this->db );
	}

	function homepage($f){ 

		$f->set("title", "Home page");
		$f->set("error", false);

		// call model for database information
		$results = $this->model->latestItems();
		$f->set( "data", $results );

		// fetch and output View
		$view = new Template;
		echo $view->render("index.html");
	}


}