<?php
    session_start();
    $Mobile=$_POST['mobile'];
    $Password=$_POST['password'];
    $conn = new mysqli('localhost','root','','weather');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $query = "SELECT * FROM customer WHERE Mobile_No = '$Mobile' AND Password = '$Password'";
        $result = $conn->query($query);

        // Check if a row is returned
        if ($result->num_rows == 1) {
            // User is authenticated, set session variables
            $query1 = "SELECT Name FROM customer WHERE Mobile_No = ? AND Password = ?";
            $stmt = $conn->prepare($query1);
            $stmt->bind_param('ss', $Mobile, $Password);
            $stmt->execute();
            $stmt->bind_result($Name);
            $stmt->fetch();
            $stmt->close();
            if ($Name) {
                $_SESSION['name']=$Name;
                header('location:http://localhost/Weather Prediction/index.php');
            } 

            
            //echo "Welcome ".$_SESSION['mobile'];
        } else {
            // Invalid login credentials
            echo "Invalid username or password.";
        }
        
        // Close the database connection
        $conn->close();
    }
?>