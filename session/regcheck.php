<?php
include('db.php');
session_start(); 
$id=$fname= $lname= $email= $username= $password = $cpassword = $gender=  $DOB = " ";
$idError=$fnameError= $lnameError= $emailError=  $usernameError=  $passwordError =  $cpasswordError = $genderError=  $DOBError= " ";


function test_input($data) {$data = trim($data);$data = stripslashes($data);$data = htmlspecialchars($data);
return $data; }

if(isset($_POST["submit"])){
$id = test_input($_POST["id"]);
$fname = test_input($_POST["fname"]);
$lname = test_input($_POST["lname"]);
$email = test_input($_POST["email"]);
$username = test_input($_POST["username"]);
$password = test_input($_POST["password"]);
$cpassword = test_input($_POST["cpassword"]);
$gender = test_input($_POST["gender"]);
$DOB  = test_input($_POST["DOB"]);

if ((empty($_POST['fname'])) || (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['fname'])) || (empty($_POST['lname'])) || (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['lname'])) || 
(empty($_POST['email'])) || (!filter_var($email, FILTER_VALIDATE_EMAIL ,$_POST['email'] )) || (empty($_POST['username']))|| 
(empty($_POST['password'])) ||(empty($_POST['cpassword'])) ||(empty($_POST['gender'])) ||(empty($_POST['DOB']))
 )
 {
    $idError = "ID is required!";$fnameError = "First name is required!";$lnameError = "Last name is required!";
    $emailError = " Email is required"; $usernameError =  " UserName is required";
    $passwordError = " Password is required";$cpasswordError = " Password confirmation is required";
    $genderError = " Gender is required";$DOBError =  " Dateofbirth is required";
} else{

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$gender = $_POST['gender'];
$DOB  = $_POST['DOB'];

$connection = new db();
$conn=$connection->OpenCon();
$userQuery=$connection->insertUser($conn,$id,$fname, $lname, $email, $username, $password ,$cpassword , $gender, $DOB);

$_SESSION["id"]=$id;
$_SESSION["fname"]=$fname;
$_SESSION["lname"]=$lname;
$_SESSION["email"]=$email;
$_SESSION["username"]=$username;
$_SESSION["password"]=$password;
$_SESSION["cpassword"]=$cpassword;
$_SESSION["gender"]=$gender;
$_SESSION["DOB"] =$DOB ;

}
}

?>