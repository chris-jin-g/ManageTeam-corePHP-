<?php

require("../config.php");

$first_name = $last_name = $email = $password = $confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = test_input($_POST["firstname"]);
  $last_name = test_input($_POST["lastname"]);
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
  $confirmPassword = test_input($_POST["confirmPassword"]);
  $hashed_password = md5($password);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$sql = "SELECT * FROM user WHERE  email='".$email."'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){            
    echo json_encode(array("status" => "fail", "msg" =>"This email already exist. Please input another email." ));
}else{
  $insert_sql = "INSERT INTO user (first_name, last_name, email, password ) VALUES ('".$first_name."','".$last_name."','".$email."','".$hashed_password."')";
  $insert_result = mysqli_query($conn, $insert_sql);
  echo json_encode(array("status" => "success", "msg" => "Registered successfully." ));
}

?>