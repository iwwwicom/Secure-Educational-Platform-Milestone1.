<?php
include_once 'dbConnection.php';

if(isset($_POST['Login'])){
     $email = mysqli_real_escape_string($connection, $_POST['email']); // save email and password from the text fields without any spical chratcer like - or \ it put ` infront of them
    $password = mysqli_real_escape_string($connection, $_POST['password']);
     $sql = "SELECT `password` FROM `alldata` WHERE `email`='$email'"; // query to search for the password that is right for the email
     $row = mysqli_query($connection,$sql); // connect the query
     $res = mysqli_num_rows($row); //search row by row and save the data in res valiable
     if($res > 0){
         $data = mysqli_fetch_assoc($row); //fetch the row
         if(password_verify($password, $data['password'])){ //if found the true hashed password for that spicific email go to index php
            
             header("Location: ../index.php");
         }else{
             echo "Please check inputs!"; //password is wrong
         }
     }else{
        echo "Please check your inputs!"; //something wrong with email or database since res was not >0
     }
}


?>