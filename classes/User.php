<?php
	include_once("Database.php");
	include_once ("Session.php");
	require_once ("Functions.php");
	class User{
        private $connection;
		public function __construct(){
            global $database;
            $this->connection = $database->getConnection();
            Session::startSession();
		}
		
		/*******************************************************
			* the below funct is used to log in the user
			* Automatically assigns session attributed
			* It is the resopnsibility of the CALLEE to start the session
			* return true if credentials were correct otherwise false
			
		********************************************************/
		
		public function processLogin($email, $password){
			
			/*
				$query = "SELECT * FROM members WHERE member_email = ' $email'";
				$select_user = mysqli_query($this->connection, $query)
				while($row = mysqli_fetch_assoc($select_user)){
					extract($row);
				}
			*/
			
			
			// preparedStatement is created to avoid sql injection
			
			$query = "SELECT * FROM members WHERE member_email = ?";
			$preparedStatement = $this->connection->prepare($query);
	
			$preparedStatement->bind_param("s", $email);
			/*
				bind_param("type", value) ; konsa type haivo lega and , se uska value
				s->string
				i->int
				d->double
				b->blob
				multiple rahega to bind_param("sid",v1,v2,v3)
			*/
			
			$preparedStatement->execute();
			
			//PHP 7 method ; db se pura table local layega 
			$preparedStatement->store_result();
			
			$count = $preparedStatement->num_rows;
			if($count == 1 ){
				$preparedStatement->bind_result($id, $member_name, $member_email, $member_password, $member_role, $created_at, $updated_at);
			
				$preparedStatement->fetch();
				
				if($password === $member_password){
					$_SESSION['login'] = true;
					$_SESSION['member_name'] = $member_name;
					$_SESSION['member_id']  = $id;
					$_SESSION['member_role'] = $member_role;
					return true;
				}else{
					return false;
				}
				
			}
		}
		
		public function get_session(){
			return $_SESSION['login'];
		}
	
		public function user_logout(){
			$_SESSION['login'] = false;
			$_SESSION['member_role'] = null;
			$_SESSION['member_id'] = null;
			$_SESSION['member_name'] = null;
			session_destroy();
		}

		public static function checkActiveSession(){
		    if(!Session::isSessionStart())
                Functions::redirect("login.php");
        }
	}
?>