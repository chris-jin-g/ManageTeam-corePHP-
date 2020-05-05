<?php
$connect = mysqli_connect("127.0.0.1", "root", "", "team_manage");
/* Check connection */
if ($connect->connect_error) {
     die("Connection to database failed: " . $connect->connect_error);
}

$team_id  = $_POST['team_id'];
$team_priorities  = $_POST['team_target'];
$team_challenges  = $_POST['team_escalation'];
$team_achievement  = $_POST['team_outcome'];
$timestamp  = $_POST['currentTimestamp'];
$formatedDate = date ("Y-m-d", strtotime($timestamp));

$sql = "UPDATE `todolist` 
	SET `priorities`='$team_priorities',
	`achievedlist`='$team_achievement',
	`challengeslist`='$team_challenges',
	`modifieddate`='$formatedDate'
	 WHERE id=$team_id";

header('Content-type: application/json');

/*
if(mysqli_query($connect, $sql)){
    $response_array['status'] = 'success'; 
} else {
    $response_array['status'] = 'error';  
}
*/
 echo json_encode($response_array);
 
// Close connection
mysqli_close($connect);
?>  
