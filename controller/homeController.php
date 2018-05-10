<?php
 require_once 'dashboardController.php';
 require_once 'UserController.php';
 
 require_once 'config.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

class HomeController {
      
     private $dashboardController = NULL;
     private $userController = NULL;
    
    public function __construct() {
        $this->dashboardController = new dashboardController();
         $this->userController = new UserController();
    }
    
   public function handleRequest() {
       
       if($_SERVER["REQUEST_METHOD"] == "GET"){
        
     $action = isset($_GET['action'])?$_GET['action']:NULL;
        try {
            if ( !$action ) {
                $this->dashboardController->index();
            } elseif ( $action == 'login' ) {
              
                $this->userController->handleRequest();
            } elseif ( $action == 'delete' ) {
                $this->deleteContact();
            } elseif ( $action == 'show' ) {
                $this->showContact();
            } else {
                $this->showError("Page not found", "Page for operation ".$action." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
   }
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    
     
     
     $postaction = isset($_POST['action'])?$_POST['action']:NULL;
     try{
      ///   echo 'raveen';
         if($postaction == 'registraction')
         {
            
              $this->userController->handleRequest();
            
         }
          elseif ($postaction=='login') {
              
              $this->userController->handleRequest();
         }
         
     } catch (Exception $ex) {

     }
     
    // Validate usernamek
//    echo 'check';
//    echo DB_NAME;
//  // $link= mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//  global $link;
//    if(empty(trim($_POST["username"]))){
//        $username_err = "Please enter a username.";
//    } else{
//        // Prepare a select statement
//        $sql = "SELECT id FROM users WHERE username = ?";
//        
//        if($stmt = mysqli_prepare($link, $sql)){
//            // Bind variables to the prepared statement as parameters
//            mysqli_stmt_bind_param($stmt, "s", $param_username);
//            
//            // Set parameters
//            $param_username = trim($_POST["username"]);
//            
//            // Attempt to execute the prepared statement
//            if(mysqli_stmt_execute($stmt)){
//                /* store result */
//                mysqli_stmt_store_result($stmt);
//                
//                if(mysqli_stmt_num_rows($stmt) == 1){
//                    $username_err = "This username is already taken.";
//                } else{
//                    $username = trim($_POST["username"]);
//                }
//            } else{
//                echo "Oops! Something went wrong. Please try again later.";
//            }
//        }
//         
//        // Close statement
//        mysqli_stmt_close($stmt);
//    }
//    
//    // Validate password
//    if(empty(trim($_POST['password']))){
//        $password_err = "Please enter a password.";     
//    } elseif(strlen(trim($_POST['password'])) < 6){
//        $password_err = "Password must have atleast 6 characters.";
//    } else{
//        $password = trim($_POST['password']);
//    }
//    
//    // Validate confirm password
//    if(empty(trim($_POST["confirm_password"]))){
//        $confirm_password_err = 'Please confirm password.';     
//    } else{
//        $confirm_password = trim($_POST['confirm_password']);
//        if($password != $confirm_password){
//            $confirm_password_err = 'Password did not match.';
//        }
//    }
//    
//    // Check input errors before inserting in database
//    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
//        
//        // Prepare an insert statement
//        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
//         
//        if($stmt = mysqli_prepare($link, $sql)){
//            // Bind variables to the prepared statement as parameters
//            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
//            
//            // Set parameters
//            $param_username = $username;
//            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
//            
//            // Attempt to execute the prepared statement
//            if(mysqli_stmt_execute($stmt)){
//                // Redirect to login page
//                header("location: login.php");
//            } else{
//                echo "Something went wrong. Please try again later.";
//            }
//        }
//         
//        // Close statement
//        mysqli_stmt_close($stmt);
//    }
//    
//    // Close connection
//    mysqli_close($link);
//
//     
//   }
//}
 }
 }
}
?>