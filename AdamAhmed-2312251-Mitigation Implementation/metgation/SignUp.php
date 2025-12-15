<?php
error_reporting(0);
include_once 'dbConnection.php';
//database connection
?>
<p align="center"/>

<?php

//hashed password 
if(isset($_POST['submit'])){ //when click submit do as follow
    $name = mysqli_real_escape_string($connection,$_POST['Name']); //save datat into values name email password and cpassword from the text field
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $Cpassword = mysqli_real_escape_string($connection,$_POST['cpassword']);

    if($password!=$Cpassword){ //if confirmation password is not true echo try again
        echo "Please Try Again!";
    }
    else{
        $hash = password_hash($password,PASSWORD_BCRYPT); //hash the password ---> prevent stealing the password as plain text from database
        $sql = "INSERT INTO `alldata`(`name`, `email`, `password`) VALUES ('$name','$email','$hash')"; //insert into database the data
        mysqli_query($connection,$sql); //give the query to the database connection
        header("Location: ../login.php"); //go to login page if scuusful
    
    }
    


}



?>