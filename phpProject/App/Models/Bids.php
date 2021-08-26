<?php // Bids model

class Bids extends DB\SQL\Mapper
{

    function __construct(DB\SQL $db)
    {
        parent::__construct($db, 'bidrecords');
    }


    function loginBids(){
        $ModelUsers = new Users($this->db);

        $this->load(array('bidder_id=?',$ModelUsers->getUsersId($f)));

        return $this->query;
    }

    function getBidsByItemId($item_id){
        $this->load( array("item_id=?" , $item_id));
        return $this->query;
    }


    function createNewBid(){

        $this->copyFrom('POST');
		$this->save();

    }

 //get max bid by item id (Alex)
 function getMaxBid($item_id){
    $this->load( array( "item_id=?", $item_id ), array("limit" => 1, "order" => "biddatetime DESC") );
    return $this->query[0];
}

}