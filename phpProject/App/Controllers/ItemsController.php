<?php
// QuestionsController

class ItemsController extends Controller {


        private $model;

        function __construct(){
            parent::__construct();
    
            $this->model = new Auction($this->db);
        }




    function itemsRegistration($f){

        $f->set("title", "Items Registration form");
        $f->set("error", false);

        $results = $this->model->loginItems();
        $f->set("userData",$results);

        $view = new Template; //initialize my view
        echo $view -> render("addItems.html"); //output the view
    }

    function usersProfile($f){
        $modelBids = new Bids($this->db);

        $f->set("title", "users profile");
        $results = $this->model->loginItems();
        $f->set("userData",$results);

        $f->set("bidsData",$modelBids->loginBids());
       

        $view = new Template; //initialize my view
        echo $view -> render("profile.html"); 
    }



    function saveItems($f){

        
		
		if ( $f->get('POST.name') != ""  && $f->get('POST.description') != "" && $f->get('POST.startingbid') != ""&&$f->get('POST.bidenddate') != "")  {
			//insert answer into db
			
			$this->model->createItems();	// save to database
			
            $f->set("title", "Items Registration form");
            
    
            $results = $this->model->loginItems();
            $f->set("userData",$results);
            $view = new Template; //initialize my view
            echo $view -> render("profile.html");

		} else {
			//show error
			$f->set("error", "Your input are not valid.");


            $f->set("title", "Items Registration form");
           
    
            $view = new Template; //initialize my view
            echo $view -> render("addItems.html");
        }

    }
        function listAnItem($f, $params){

            $f->set('query', $this->model->fetch_by_item($params['qid']));
        
            //t1
            $modelAuction = new Auction($this->db);
            $f->set('items', $modelAuction->getByID($params['qid']));
            
            //t2
            $results_2 = $this->model->get_owner_by_item();
            $f->set("user", $results_2);
    
            // // t3
            // $result_3 = new Bids($this->db,"bidrecords");
            // $f->set('bid', $result_3->getAllBidsbyItem($params['qid']));
            $results_3 = $this->model->getAllBidsbyItem($params['qid']);
            $f->set("bid", $results_3);
    
            $template = new Template;
            echo $template->render("item.html");
        }



        // delete single items for user
        function deleteSingleItem( $f, $params ){
           
            $this->model->removeItem( $params['iid'] );
    
            // redirect
             $f->reroute('/profile/');
            
         

        }


	}



?>