<?php

$servername="localhost";
$username="root";
$password="";
$database="voting";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("connection failed".$mysqli_connect_error);

}
if(isset($_POST['regist'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword=$_POST['cpassword'];
    $address=$_POST['address'];
    $role=$_POST['role'];
    
    // Check if the username or email already exists
    $sql = "SELECT * FROM user  WHERE name = '$name' OR mobile=$mobile ";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      echo "Username or email already exists.";
    } else {
        if ($password === $cpassword) { // add this condition
            $sql = "INSERT INTO user(name,mobile,password,address,role) VALUES('$name','$mobile','$password','$address','$role')";
            mysqli_query($conn,$sql);
            echo "register successfully";
            
            
        } else {
            echo "Password and confirm password do not match.";
        }
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>
