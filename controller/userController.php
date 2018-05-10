<?php
 //require_once 'dashboardController.php';
   //require_once 'model/databaseConnection.php';

   require_once 'model/databaseConnection.php';
class UserController {
    
   private  $DatabaseConnection=NULL;
   public function __construct() {
       $this->DatabaseConnection= new databaseConnection();
     
    }
  
    
   public function handleRequest() {
       
       
     //   echo "user controller echo";die;
       if($_SERVER["REQUEST_METHOD"] == "GET"){
       $method = isset($_GET['method'])?$_GET['method']:NULL;
      
         if ( $method=='register' ) {
              $this->register();
         } 
           elseif ( $method == 'login' ) {
                $this->login();
           } else {
              $this->showError("Page not found", "Page for operation ".$method." was not found!");
            }
       }
         if($_SERVER["REQUEST_METHOD"] == "POST"){
         $postmethod = isset($_POST['method'])?$_POST['method']:NULL;
         
           // echo "raveen4";
            if ($postmethod=='doregister')
            {
             //   echo 'rave';
                $this->postregistraction();
            }
            elseif ($postmethod=='dologin') {
       
                 $this->login1();
            }
       
        
         }
   }
   public function register() {
      
          
      include 'view/register.php';
          
  //    echo "hello raveen";
      
   }
      public function login() {
      
      //    echo "blah die";die;
          // include 'view/register.php';
          
      
      
   }
   public function  postregistraction()
   {
     
     if ( isset($_POST['action']) ) {
         echo 'raveen';
            $username       = isset($_POST['username']) ?   $_POST['username']  :NULL;
            $password      = isset($_POST['password'])?   $_POST['password'] :NULL;
           ///$confirm_password      = isset($_POST['confirm_password'])?   $_POST['confirm_password'] :NULL;
            
           // echo $username;
          //  echo  $password;
          //  echo $confirm_password;
          echo 'raveen';
           
            
            try {
                echo 'raveen1in try';
                $this->DatabaseConnection->createNewContact($username, $password);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
   }
}
?>