<?php

class BidsController extends Controller
{

    private $model;

    function __construct()
    {
        parent::__construct();

		$this->model = new Bids($this->db);
    }


    function listAllBids($f){
        $results = $this->model->allBids();
        $f->set( "data", $results );

        $view = new Template;
        echo $view->render("items.html");
    }




    
    function addNewBid($f){
        if (empty($f->get('POST.bidamount'))) {
            $f->set("error", "The bid field is empty");
        } else if(!preg_match("/^[0-9]+$/", $f->get('POST.bidamount'))){
            $f->set("error", "The bid must be a number");
        }else if($this->model->evaluateBid(f3)){
            $this->model->createNewBid();
            $view = new Template; //initialize my view
            echo $view -> render("item.html");
        }

    }
    
}

?>