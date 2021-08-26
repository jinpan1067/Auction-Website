<?php
// AuctionsController

class AuctionsController extends Controller
{

    private $model;

    function __construct()
    {
        parent::__construct();

		$this->model = new Auction($this->db);
    }

    function listAllAuctions($f){
        // we load table 1 here into data
        $results = $this->model->allActions();
        $f->set("data", $results);

        // we load table two here into user
        $results_2 = $this->model->get_owner_by_item();
        $f->set("user", $results_2);

        // t3
        // $results_3 = $this->model->getAllBids();
        // $f->set("bid", $results_3);

        $f->set("title", "Auction");
		$f->set("error", false);

        $view = new Template;
        echo $view->render("auction.html");
    }



    // new stuff
    function endedItems($f){
        $results = $this->model->getEndedItems();
        $f->set( "endedItems", $results );
        $view = new Template;
        echo $view->render("auction.html");
    }
}
?>