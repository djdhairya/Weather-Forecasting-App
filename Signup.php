<?php
    $Name=$_POST['name'];
    $Email=$_POST['email'];
    $Mobile=$_POST['mobile'];
    $Password=$_POST['password'];
    $conn = new mysqli('localhost','root','','weather');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into customer values (?,?,?,?)");
        $stmt->bind_param("ssis",$Name,$Email,$Mobile,$Password);
        $stmt->execute();
        header('location:http://localhost/Weather Prediction/Login.html');
        $stmt->close();
        $conn->close();
    }
?>