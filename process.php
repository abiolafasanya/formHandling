<!-- Pocessing page of registration form input -->

<?php

    // Starting Session
    session_start();
    if(isset($_POST['register'])){
   
        // define variables and set to empty values
        $name = $email = $address = $password = "";

        // validating the input form using function to avoid repetion
        
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        // assigning values to defined variable

        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);     
        $password = test_input($_POST["password"]);   

        // assigning session variable
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

        //array of user informations
        $_SESSION['userDetail']= array(
            "name" => $name, 
            "email" => $email,  
            "password" => $hashed_password
        );
      
        // session message
        $_SESSION['message'] = "Registration Successful!";
        $_SESSION['msg_type'] = "success";
        header(
            'location: index.php?login'
        );
    }
  
//  Login Authentication

        if(isset($_POST['login'])){

           echo $username = $_POST['user'];
           echo $hashed_password = $_POST['pass'];
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }

            // login form data
            $name = test_input($_POST['name']);
            $password = test_input($_POST['password']);
            
            if(password_verify($password, $hashed_password) && $username === $name){
            
            session_start();

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;                            
            
            // Redirect user to welcome page
            header("location: welcome.php");
            } 
            
            else{
                // Display an error message if password is not valid
              echo  $password_err = "The password you entered was not valid.";
            }  
        
        }
?>