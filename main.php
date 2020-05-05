<?php
    include("config.php");
    session_start();
    if(!isset($_SESSION['user'])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024;">
		<meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage team objectives, escalations, posture, performance & more.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/main.css">
    <link href="css/modals.css" rel="stylesheet" type="text/css">
</head>
<body>
    
    <div class="team-modal team-modal-hide">
        <div class="modal-dialog">
            <form method="POST" id="signup-form" class="signup-form" action="#">
                <div class="modal-body">
                    <?php
                        $sql = "SELECT * FROM question";
                        $result = mysqli_query($conn, $sql);
                        $i = 0;
                        while ($row = mysqli_fetch_object($result)) {
                            ?>
                                <fieldset>
                                    <label class="question" data-toggle="tooltip" data-placement="bottom" title="Visit our site for tips"><?php echo $row->content;?></label><br>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    <input type="text" name="<?php echo $row->alias;?>" id="<?php echo $row->alias;?>" class="question-input" hiddenholder="<?php echo $row->placeholder;?>" placeholder="<?php echo $row->placeholder;?>" />
                                    <span>This field is required.</span>
                                    <?php
                                        if($i == 3){
                                            ?>
                                            <div class="status-result">
                                                <label class="status-label">Tick one of the below</label><br>
                                                <div>
                                                    <input id="question1" name="question" type="radio" class="with-font" value="smile" checked/>
                                                    <label for="question1">
                                                        <i class="fa fa-smile-o smile-icon"  for="status-smile"></i>
                                                    </label>
                                                </div>
                                                <div>
                                                    <input id="question2" name="question" type="radio" class="with-font" value="sad" />
                                                    <label for="question2">
                                                        <i class="fa fa-frown-o sad-icon"  for="status-sad"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <?php
                                        } else if($i == 1) {
                                            ?>
                                                <div class="target-status">
                                                    <input type="checkbox" id="fruit4" name="target" value="no-target">
                                                    <label for="fruit4">No objectives set with the team yet</label>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </fieldset>
                            <?php
                            $i++;
                        }
                    ?>
                </div>
                <div class="move_step">
                    <button type="button" class="btn btn-success pull-right form-confirm">Submit</button>
                    <button type="button" class="btn btn-success pull-right next-step">Next</button>
                    <button type="button" class="btn btn-success pull-right prev-step">Prev</button>                 
                </div>
            </form>
            <span class="close-modal">X</span>
        </div>               
    </div>




    <div class="main">

<nav class="main-side">
</nav>
        <nav class="main-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item"><a class="navbar-brand" href=""><img class="brand-logo" alt="stack admin logo" src="https://manageteam.online/images/group-img.png" style="width:3%;">
                            <h3 class="brand-text">ManageTeam</h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"></a></li>
                </ul>
                <ul class="nav navbar-nav flex-row">
                </ul>


<input type="checkbox" id="modal">
		<label for="modal" class="example-label" style="font-size:14px;padding:10px;color:#008385;margin-right:400px;width:200px;">Objective Ideas</label>
		<div class="modal">
			<div class="modal-header">
				<h3>These Objective Ideas have been automatically submitted by your integration</h3>
				<label for="modal">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAdVBMVEUAAABNTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU0N3NIOAAAAJnRSTlMAAQIDBAUGBwgRFRYZGiEjQ3l7hYaqtLm8vsDFx87a4uvv8fP1+bbY9ZEAAAB8SURBVBhXXY5LFoJAAMOCIP4VBRXEv5j7H9HFDOizu2TRFljedgCQHeocWHVaAWStXnKyl2oVWI+kd1XLvFV1D7Ng3qrWKYMZ+MdEhk3gbhw59KvlH0eTnf2mgiRwvQ7NW6aqNmncukKhnvo/zzlQ2PR/HgsAJkncH6XwAcr0FUY5BVeFAAAAAElFTkSuQmCC" width="16" height="16" alt="">
				</label>
			</div>
			<p><b>Ticket Analysis (automated entry)</b> Based on your ServiceNOW tickets you should consider automating Virtual Machine builds to reduce avg 48 requests per month <font color="blue">(1 Upvote)</font></p>
                        <p><b>Customer Feedback Analysis (automated entry)</b> Based on your SalesForce tickets you should consider improving help pages for "Creating finance reports" <font color="blue">(9 Upvotes)</font>
		</div>
</input>

        </nav>
        
	

<?php
    include ("topmenu.php");
    include("dropdown.php");
?>

<center><img src="https://manageteam.online/manageteam_getrich/images/companyobjective.png" style="margin-top:5px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);"></center>

        <div class="main-container" >
            <?php
                $sql = "SELECT * FROM team_list ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_object($result)) {
                    ?>
                        <div class="team-group">
                            <div class="group-avatar">
                                <img class="avatar-img" alt="Group Icon" src="images/group-img.png">
                            </div>
                            <div class="team-name">
                                <h4 style="font-weight: bold;text-transform: uppercase;"><?php echo $row->team_name;?></h4>
                            </div>
                            <br>
                            <div class="team-target" style="text-align:left !important;" status="<?php echo $row->object_status;?>">
                                <h4><b>Team Objectives:</b> <?php if($row->object_status == 1){echo "<span class='no-target'>No objectives set with the team</span>";} else{echo "<span>".$row->team_target."</span>";} ?></h4>
                            </div>

		                    <div class="team-metrics" style="text-align:left !important;">
                                <h4><b>Key Results:</b> <span><?php echo $row->team_metrics;?></span></h4>
                            </div>


                            <div class="team-outcome" style="text-align:left !important;" status="<?php echo $row->status_result;?>">
                                <h4><b>Outcomes:</b> <span class="<?php if($row->status_result == 'smile'){echo "green-answer";} else if($row->status_result == 'sad'){echo "red-answer";}?>"><?php echo $row->team_outcome;?></span></h4>
                            </div>
			

                            <div class="card-button">
                                <i class="fa fa-edit edit-btn" data-toggle="tooltip" data-placement="bottom" title="Edit" idx="<?php echo $row->id;?>" onclick="edit_card(this)"></i>
                                <i class="fa fa-remove remove-btn" data-toggle="tooltip" data-placement="bottom" title="Remove" idx="<?php echo $row->id;?>" onclick="remove_card(this)"></i>
                            </div>                            
                        </div>
                    <?php
                }
            ?>            
        </div>
    </div>

<?php
    include ("footer.php");
?>

<script src="js/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


