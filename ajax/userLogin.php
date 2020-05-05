<?php
session_start();
require("../config.php");

$email = $password = $confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
  $hashed_password = md5($password);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$sql = "SELECT * FROM user WHERE  email='".$email."' AND password='".$hashed_password."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_object($result);
if(mysqli_num_rows($result) > 0){    
    $_SESSION['user']['name'] = $row->first_name." ".$row->last_name;
    $_SESSION['user']['email'] = $row->email;
    echo json_encode(array("status" => "success"));
}else{
  echo json_encode(array("status" => "fail", "msg" => "Incorrect email or password", "sql" => $sql ));
}

?>