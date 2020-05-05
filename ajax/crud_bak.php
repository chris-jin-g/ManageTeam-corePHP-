<?php
    include('../config.php');
    if($_REQUEST['action'] == 'create') {
        $team_name = $_REQUEST['team_name'];
        $team_target = $_REQUEST['team_target'];
	    $team_metrics = $_REQUEST['team_metrics'];
        $team_escalation =$_REQUEST['team_escalation'];
        $team_outcome = $_REQUEST['team_outcome'];
        $status_result = $_REQUEST['status_result'];
        $object_status = $_REQUEST['noObjectStatus'];
        $note_text = $_REQUEST['note_text'];
        $sql = "INSERT INTO team_list (team_name,team_target, team_escalation, team_metrics, team_outcome, status_result, object_status, note_text) VALUES ('".$team_name."','".$team_target."','".$team_escalation."','".$team_escalation."','".$team_outcome."','".$status_result."','".$object_status."','".$note_text."')";
        mysqli_query($conn, $sql);
        $select_sql = "SELECT * FROM team_list WHERE team_name='".$team_name."' AND team_escalation='".$team_escalation."' ";
        $result = mysqli_query($conn, $select_sql);
        $row = mysqli_fetch_object($result);
        echo json_encode(array("status" => "success", "team_id" => $row->id));
    }
    else if($_REQUEST['action'] == 'edit') {
        $team_id = $_REQUEST['team_id'];
        $team_name = $_REQUEST['team_name'];
        $team_target = $_REQUEST['team_target'];
        $team_escalation =$_REQUEST['team_escalation'];
	    $team_metrics =$_REQUEST['team_metrics'];
        $team_outcome = $_REQUEST['team_outcome'];
        $status_result = $_REQUEST['status_result'];
        $object_status = $_REQUEST['noObjectStatus'];
        $note_text = $_REQUEST['note_text'];
        $sql = "UPDATE team_list
                SET team_name='".$team_name."',team_target='".$team_target."', team_escalation='".$team_escalation."', team_metrics='".$team_metrics."', team_outcome='".$team_outcome."', status_result='".$status_result."', object_status='".$object_status."', note_text='".$note_text."'
                WHERE id='".$team_id."';";
        mysqli_query($conn, $sql);
        echo json_encode(array("status" => "success"));
    }
    else if($_REQUEST['action'] == 'delete') {
        $sql = "DELETE FROM team_list WHERE id='".$_REQUEST['team_id']."'";
        mysqli_query($conn, $sql);
        echo json_encode(array("status" => "success",));
    }    
//Uncomment comments to allow write
?>
