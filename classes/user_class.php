<?php
/*
coded by:
¦¦¦¦¦¦¦¦_   _¦     _¦¦¦¦¦¦_     _¦¦¦¦¦¦_   _¦          _¦¦¦¦¦¦¦¦ 
¦¦¦   ¯¦¦¦ ¦¦¦    ¦¦¦    ¦¦¦   ¦¦¦    ¦¦¦ ¦¦¦         ¦¦¦    ¦¦¦ 
¦¦¦    ¦¦¦ ¦¦¦¦   ¦¦¦    ¦¯    ¦¦¦    ¦¯  ¦¦¦         ¦¦¦    ¦¦¦ 
¦¦¦    ¦¦¦ ¦¦¦¦  _¦¦¦         _¦¦¦        ¦¦¦        _¦¦¦____¦¦¯ 
¦¦¦    ¦¦¦ ¦¦¦¦ ¯¯¦¦¦ ¦¦¦¦_  ¯¯¦¦¦ ¦¦¦¦_  ¦¦¦       ¯¯¦¦¦¯¯¯¯¯   
¦¦¦    ¦¦¦ ¦¦¦    ¦¦¦    ¦¦¦   ¦¦¦    ¦¦¦ ¦¦¦       ¯¦¦¦¦¦¦¦¦¦¦¦ 
¦¦¦   _¦¦¦ ¦¦¦    ¦¦¦    ¦¦¦   ¦¦¦    ¦¦¦ ¦¦¦¦    _   ¦¦¦    ¦¦¦ 
¦¦¦¦¦¦¦¦¯  ¦¯     ¦¦¦¦¦¦¦¦¯    ¦¦¦¦¦¦¦¦¯  ¦¦¦¦¦__¦¦   ¦¦¦    ¦¦¦ 
User Class
+----------------------------------+
+Version: 			0.0.4
+Author: 			Trevor Nolan
+----------------------------------+
*/

class User {	

	function __construct() {
		//just constructing this will reset all its variables

	}	

	public function reset(){
		foreach ($this as $key => $value) {
            unset($this->$key);
        }
	}

	public function logout(){
		$this->reset();
		$_SESSION['session']->user = $this;
		return true;
	}

	public function login($email,$pass) {
		$db = new db();
		$sql = 'SELECT * FROM users WHERE email = ? and active = "1";';		
		$results = $db->query($sql, $email);
		if(count($results) == 1 && password_verify($pass, $results[0]->password) ):
			//user is valid, lets log them in
			$this->id = $results[0]->id;


			$_SESSION['session']->user = $this;
			return true;
		else:
			//clear out the user
			$this->reset();
			$_SESSION['session']->user = $this;
			return false;
		endif;
	}

	/*
	 * check if the user is an admin
	 */
	public function isUserAdmin($user_id){
		$db = new db();
		$sql = 'select access_level from employees where id = ?';
		$adminuser = $db->fetch($sql, $user_id);
		if($adminuser):
			if( $adminuser->access_level == 5 || $adminuser->access_level == 6 ):
				return true;
			endif;
		endif;
		return false;
	}
}


?>