<?php
  //require_once 'config.php';
  require_once 'model/databaseGateway.php';
  // require_once 'controller/userController.php';
//  $username = $password = $confirm_password =$alertdata= "";
//  $username_err = $password_err = $confirm_password_err = "";
  
class databaseConnection{
    
     private $DatabaseGateway = NULL;
    
   private function openDb() {
        if (!mysql_connect("127.0.0.1:3307", "root", "")) {
            throw new Exception("Connection to the database server failed!");
        }
        
        if (!mysql_select_db("login")) {
            throw new Exception("No mvc-crud database found on database server.");
        }
    }
    
    private function closeDb() {
        mysql_close();
    }
    
     public function __construct() {
        $this->DatabaseGateway = new databaseGateway();
    }
       private function validateContactParams( $username, $password) {
           
        $errors = array();
        if ( !isset($username) || empty($username) ) {
            $errors[] = 'Name is required';
        }
        if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
    }
    
       public function createNewContact( $username, $password) {
           
        try {
            $this->openDb();
            $this->validateContactParams($username, $password);
            //echo "raveenfffff";
            $res = $this->DatabaseGateway->insert($username, $password);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    
    
}






?>

