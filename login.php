<?php


//database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "voting";

$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
echo "connected successfully";

if(isset($_POST['login'])){
	$name = $_POST['name'];
	$password =$_POST['password'];
    
    
	// Check if email and password exist in the database
	$sql = "SELECT * FROM user WHERE name='$name' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0 ) {
		echo "Login successful";
        
	} else {
		echo "Invalid email or password";
	}
    mysqli_close($conn);
}

?>
