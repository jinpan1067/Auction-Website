<?php
// UsersController

class UsersController extends Controller
{

    private $model;

    function __construct()
    {
        parent::__construct();

        $this->model = new Users($this->db);
    }

    function UsersRegistration($f){

        $f->set("title", "Users Registration");
        $f->set("error", false);
        

        $view = new Template; //initialize my view
        echo $view -> render("usersRegistration.html"); //output the view
    }


    function saveUsers($f){

        
		if ( empty($f->get('POST.username')) || empty($f->get('POST.lastname') )|| empty($f->get('POST.firstname') )||empty($f->get('POST.email')))  {
			
			//show error
			$f->set("error", "Your input can not be empty.");

            $view = new Template; //initialize my view
            echo $view -> render("usersRegistration.html");
        } else if(!preg_match("/^[a-z0-9]+$/", $f->get('POST.username')) ){

            $f->set("error", "Your input must be letters and numbers.");

            $view = new Template; //initialize my view
            echo $view -> render("usersRegistration.html");
        }
        
        
        
        else if( $this->model->usernameExistes($f)&& $this->model->emailExistes($f))
        {
            $f->set("error", "The userName or email is be used.");

            $view = new Template; //initialize my view
            echo $view -> render("usersRegistration.html"); }
        else {
            	
			$this->model->createUsers();	// save to database
			
            $view = new Template; //initialize my view
            echo $view -> render("index.html"); //output the view
        }


	}

	// Check login form and start login session if the input data exists in the database and input fields are not empty (Alex)
	function userLogin($f){

        $modelItems = new Auction($this->db);

        $f->set("error_login", false);

        if ( $f->get('POST.login_username') == ""
            && $f->get('POST.login_email') == ""){
        $f->set("error_login", "Please enter Username and Email.");
        $view = new Template;
        echo $view -> render("index.html");
        }

        elseif ( $f->get('POST.login_username') == "" && $f->get('POST.login_email') != ""){
            $f->set("error_login", "Please enter the Username.");
            $view = new Template; //initialize my view
            echo $view -> render("index.html"); //output the view
        }

        elseif ($f->get('POST.login_email') == "" && $f->get('POST.login_username') != ""){
            $f->set("error_login", "Please enter the Email.");
            $view = new Template; //initialize my view
            echo $view -> render("index.html"); //output the view
        }

        elseif ( $f->get('POST.login_username') != ""
            && $f->get('POST.login_email') != ""
            && $this->model->usernameExists($f) == false
            && $this->model->emailExists($f) == false){
            $f->set("error_login", "Username and Email you provided is not registered.");
            $view = new Template; //initialize my view
            echo $view -> render("index.html"); //output the view
        }

        elseif ( $f->get('POST.login_username') != ""
            && $this->model->usernameExists($f) == false){
            $f->set("error_login", "Username you provided is not registered.");
            $view = new Template; //initialize my view
            echo $view -> render("index.html"); //output the view
        }

        elseif ( $f->get('POST.login_email') != ""
            && $this->model->emailExists($f) == false){
            $f->set("error_login", "Email you provided is not registered.");
            $view = new Template; //initialize my view
            echo $view -> render("index.html"); //output the view
        }

        else {

            $modelItems-> checkIfItemEnded();
           // session_start();
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $f->get('POST.login_username');
            $_SESSION["email"] = $f->get('POST.login_email');
            $_SESSION["name"] = $this->model->getFirstName($f);
            $f->set("logged_in", $_SESSION["logged_in"]);
            $f->set("show_name", $_SESSION["name"]);

           //pan (07/08 10:45) to display homepage
            $ModelAuction = new Auction($this->db);
            $results = $ModelAuction->latestItems();
		    $f->set( "data", $results );

            $view = new Template;
           echo $view -> render("index.html");
        }

    }

    function userLogout($f){

        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        $f->set("logged_in", $_SESSION["logged_in"]);
        $f->set("show_name", $_SESSION["name"]);

        $auctionModel = new Auction($this->db);
        $results = $auctionModel->latestItems();
		$f->set( "data", $results );

        $view = new Template;
        echo $view -> render("index.html");
    }

}