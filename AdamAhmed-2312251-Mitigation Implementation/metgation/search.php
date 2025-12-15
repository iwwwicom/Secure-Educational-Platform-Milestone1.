<p align="center"/>
<?php


// Reflected XSS Attack prevention
if(isset($_GET["searchinput"])) // if button clicked get the text inside the text field field 
{

//htmlspecialchars is a function inside php that automattcly make any inputs as normal text that cant be a script
	$search = htmlspecialchars($_GET['searchinput']);
	echo "the resualt of your search is:".$search;
	echo "<br><i> have fun</i> <br>";


}


?>