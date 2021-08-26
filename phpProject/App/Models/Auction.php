<?php // Items model

class Auction extends DB\SQL\Mapper
{

    function __construct(DB\SQL $db)
    {
        parent::__construct($db, 'items');
    }

    function latestItems(){
		
		$this->load(array(),array("limit" => 10, "order" => "id DESC"));
		
		return $this->query;
		// [0] because I know I'm only getting 1 row i return index 0
	}

    function createItems(){

		

		$this->user_id = 1;
		$this->copyFrom('POST');
		$this->save(); // execute
	}

	function allItems(){
		$this->load();

		return $this->query;
    }


    //pan 11.23
    function loginItems(){
        $ModelUsers = new Users($this->db);

        $this->load(array('user_id=?',$ModelUsers->getUsersId($f)));

        return $this->query;
    }

    function removeItem( $id ){
		
		$this->load( array( "id = ?", $id ), array( "limit" => 1 ) );
		
		$this->erase();
		
	}



	//required to display info for chosen item - Raisa
	function getByID(){
        $this->load( array("id=?" , $id));
        return $this->query[0];
    }

	function fetch_by_item($qid){
		$this->load( array( "id=?",$qid ) );
		
		return $this->query;
	}

	// this is t2 two retrival
	function get_owner_by_item(){
		$temp_map = new Users($this->db,"users");
		return $temp_map->get_all();
	}

	function getAllBidsbyItem($qid){
		$temp_map = new Bids($this->db,"bidrecords");
		return $temp_map->getBidsByItemId($qid);
	}

	// t1 retrieval
	function allActions(){
		$this->load();
		return $this->query;
	}


	function getEndedItems(){
		$modelBids = new Bids($this->db);
		$modelUsers = new Users($this->db);
		$this->load( array( "ended=?", 1 ) );
		$items = $this->query;
		foreach ($items as $item){
			$item['maxBid'] = $modelBids->getMaxBid($item['id'])['bidamount'];
			$item['uname'] = $modelUsers->getUsername($modelBids->getMaxBid($item['id'])['bidder_id'])['username'];
		}
		return $items;
	}
	
	// check if an item bid-end-date is less than current date, and if yes, then change value in "ended" column from 0 to 1 (Alex)
	function checkIfItemEnded(){
		$this->load();
		$items = $this->query;
		foreach ($items as $item){
			if($item['bidenddate'] < time()){
				$this->load( array( "bidenddate=?", $item['bidenddate'] ) );
			//	$this->ended = 1;
			    $item['ended'] = 1;
				$this->save();
			}
		}
	}


}


?>