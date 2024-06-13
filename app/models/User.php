<?php

class User {

    public $username;
    public $password;
    public $cooldown = 5;
    public $auth = false;

    public function __construct() {
       
    }

    

    // public function test () {
    //   $db = db_connect();
    //   $statement = $db->prepare("select * from users;");
    //   $statement->execute();
    //   $rows = $statement->fetch(PDO::FETCH_ASSOC);
    //   return $rows;
    // }

    public function authenticate($username, $password) {
        /*
         * if username and password good then
         * $this->auth = true;
         */
      
		  $username = strtolower($username);
		  $db = db_connect();
      $statement = $db->prepare("select * from users WHERE username = :name;");
      $statement->bindValue(':name', $username);
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
		
  		if (password_verify($password, $rows['password_hash'])) {
  			$_SESSION['auth'] = 1;
  			$_SESSION['username'] = ucwords($username);
  			unset($_SESSION['failedAuth']);
        unset($_SESSION['last_submit_time']);
  			header('Location: /home');
  			die;
  		} else {
  			if(isset($_SESSION['failedAuth'])) {
  				$_SESSION['failedAuth'] ++; //increment
  		} else {
  				$_SESSION['failedAuth'] = 1;
  		}
      if ($_SESSION['failedAuth'] == 3 ){
          // $lastSubmitTime = $_SESSION['last_submit_time'];
          // $timeSinceLastSubmit = time() - $lastSubmitTime;

          // if ($timeSinceLastSubmit < $cooldown) {
          //     $remainingTime = $cooldown - $timeSinceLastSubmit;
          //     $_SESSION['message'] = "You must wait 60 seconds before submitting again.";
          // }
          $_SESSION['message'] = "Too many failed attempts. Please try again in 60 seconds.";
          // unset($_SESSION['failedAuth']);
          header('Location: /login');
          //$_SESSION['last_submit_time'] = time();
      }
		  header('Location: /login');
		  die;
	   }
    }

  public function create($username, $password){
    
    $username = strtolower($username);
    $db = db_connect();
    // Check if username already exists
    $statement = $db->prepare("select * from users WHERE username = :name;");
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        // Username already exists
        $_SESSION['regError'] = 1; 
        $_SESSION['regMessage'] = "Username already exists";
        header('Location: /create');
      die;
    }else{
      // Check password security (minimum 8 characters, at least one uppercase letter, one lowercase       letter, and one number)
      if (preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password_hash) VALUES (?, ?)";
        $stmt = $db -> prepare($sql);
        if ($stmt->execute([$username, $password_hash])) {
            // Registration successful
            $_SESSION['regSuccess'] = 1;
            $_SESSION['regMessage']= "Registration successful";
            unset($_SESSION['regError']);
            header('Location: /login');
  
            die;
  
        }
      } else {
        // Password does not meet security requirements
        $_SESSION['regError'] = 2;
        $_SESSION['regMessage'] ="Password must be at least 8 characters long and contain at least           one uppercase letter, one lowercase letter, and one number";
        header('Location: /create');
        die;
      }
    }
    unset($_SESSION['regSuccess']);
    unset($_SESSION['regError']);
  }
}


