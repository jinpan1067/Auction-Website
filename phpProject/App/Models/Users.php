<?php // Users model

class Users extends DB\SQL\Mapper
{

    function __construct(DB\SQL $db)
    {
        parent::__construct($db, 'users');
    }

    	// insert a new row into db
	function createUsers(){

		
		
		$this->copyFrom('POST');
		$this->save(); // execute
	}


    function usernameExistes($f):bool
    {
        $exists = false;
       if(!empty( $this->load( array( "username=?", $f->get('POST.username') ) ))){
           $exists = true;
       }

       return $exists;
    }
    // function to check username input when login (Alex)
	function usernameExists($f): bool
    {
        $exists = false;
            if(!empty($this->load(array('username=?',$f->get('POST.login_username'))))){
                $exists = true;
        }
        return $exists;
    }


    // function to check email input when login (Alex)
    function emailExists($f): bool
    {
        $exists = false;
        if(!empty($this->load(array('email=?',$f->get('POST.login_email'))))){
            $exists = true;
        }
        return $exists;
    }


    // function to get user full name after login (Alex)
  function getFirstName($f)
  {
      $array = $this->load( array( "username=?", $f->get('POST.login_username') ));
      return $array['firstname']." ".$array['lastname'];
  }


  // pan 11:12

  function getUsersId($f)
  {
    $array = $this->load( array( "username=?", $_SESSION["username"]));
      return $array['id'];
  }



    function emailExistes($f):bool
    {

        $exists = false;
        if(!empty($this->load( array( "email=?", $f->get('POST.email') ) ))){

            $exists = true;
        }

		return $exists ;
    }

     // We add a get all here for t2 retrievsl - Raisa
     function get_all(){
        $this->load();
        return $this->query;
    }


    //get username by user id (Alex)
function getUsername($user_id){
    $this->load( array( "id=?", $user_id ));
    return $this->query[0];
 }
}
    ?>