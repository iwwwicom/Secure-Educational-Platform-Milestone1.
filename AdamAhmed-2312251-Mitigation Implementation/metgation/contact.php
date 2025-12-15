
<p align="center"/>

<?php
include_once 'dbConnection.php'; //connect to the database using th dbConnection.php file

//clear

if(isset($_POST['clear'])){ //button is called clear
    $sql = "TRUNCATE TABLE alldata"; //delete everything in the database which is the tabel called alldata
    if(mysqli_query($connection, $sql) == TRUE){ //if connection is valid echo table deleted
        echo "Table deleted";
    }else{
        echo "error"; //if connection faild echo error
    }
}


//Insertion stored Xss attack

if(isset($_POST['send'])){    $comm = filter_var($_POST['Message'], FILTER_SANITIZE_STRING); //this sentince make an error becouse its old method i think but this what you used so i will not change it
    if(strpos($comm, "https://")){ //filter the xss attack
        exit(); // exit if true
    }else{
        
    }
    $sql = "INSERT INTO `alldata`(`comment`) VALUES ('$comm')"; //the query
    if(mysqli_query($connection, $sql) == TRUE){ //start the query
        echo "Inserted";
    }else{
        echo "error"; //error in connection
    }
}


//Select to display 

$sql = "SELECT `id`, `comment` FROM `alldata`"; //from the data base click select to get this line
$result = mysqli_query($connection, $sql); //will run the command from the database and give me the result
$noChars = array('\'',"\"","\\"); // save those spical charcters
$repChars = array('&apos',"&quot","&bsol;");

if(mysqli_num_rows($result)>0){ //this runction will take the result and show number of rows if its larger than 0 it mean there are something we got from database
    while($row = mysqli_fetch_assoc($result)){ //will fetch the result row by row
        echo "<hr>Comment number".$row['id']."<br>".str_replace($noChars, $repChars, $row['comment'])."<br><hr>";//if any of those charcter is seen replace them
    }//its id and comment

}else {
}

 //cooke stealing previntion 
if(isset($_POST['new'])){ //the button is called new
    $cookie_name = "authKey";
    $cookie_value = md5(microtime());
    setcookie($cookie_name, $cookie_value, time()+86400*30,"/"); //valid to 30 second
    echo "<h2 align='center'>authKey Cookie Set</h2>";
}

if(isset($_POST['out'])){ //the button is called out
    if(isset($_COOKIE['authKey'])){ //get the created cooky
        echo "<h2 align='center'>authKey Cookie ".$_COOKIE['authKey']." Set</h2>"; //print the cookey
    }else{
        echo "<h2 align='center'>authKey Cookie is Not Set</h2>"; //if any error happen
    }

}

if(isset($_GET['name'])){
    echo "<h2 align='center'>Hi ".$_GET['name']." Welcome</h2>";

}



?>