<?php
include("config.php");
$query   = "SELECT priorities,achievedlist,challengeslist,id,teamname FROM `todolist` WHERE archive=0";
$result  = mysqli_query($conn, $query); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024">
        <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage team objectives, escalations, posture, performance & more.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Main css -->
    <link rel="stylesheet" href="css/main.css">
    <link href="css/modals.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image:none; background-color:#f7f7f7">
    
    <div class="team-modal team-modal-hide">
        <div class="modal-dialog">
            <form method="POST" id="signup-form" class="signup-form" action="#">
                <div class="modal-body">
                    <fieldset>
                       <label class="question" data-toggle="tooltip" data-placement="bottom" title="Visit our site for tips">What was achieved last week with our targets?</label><br>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    <input type="text" name="team_outcome" id="team_outcome" class="question-input" hiddenholder="E.g. Level 1 Support" placeholder="E.g. Level 1 Support" />
                                    <span>This field is required.</span>
                                                                    </fieldset>
                                                            <fieldset>
                                    <label class="question" data-toggle="tooltip" data-placement="bottom" title="Visit our site for tips">Challenges faced last week in hitting our targets?</label><br>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    <input type="text" name="team_escalation" id="team_escalation" class="question-input" hiddenholder="Objectives must be 7-10 difficulty and have never been done in your team before." placeholder="Objectives must be 7-10 difficulty and have never been done in your team before." />
                                    <span>This field is required.</span>
                                                                  </fieldset>
                                                            <fieldset>
                                    <label class="question" data-toggle="tooltip" data-placement="bottom" title="Visit our site for tips">Next week's 3 priorities.</label><br>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    <input type="text" name="team_target_1" id="team_target_1" class="question-input" hiddenholder="These challenges could be feedback you've received about your team or from your team" placeholder="These challenges could be feedback you've received about your team or from your team" />

                            <input type="text" name="team_target_2" id="team_target_2" class="question-input" hiddenholder="These challenges could be feedback you've received about your team or from your team" placeholder="These challenges could be feedback you've received about your team or from your team" />
                            
                            <input type="text" name="team_target_3" id="team_target_3" class="question-input" hiddenholder="These challenges could be feedback you've received about your team or from your team" placeholder="These challenges could be feedback you've received about your team or from your team" />
							<input type="hidden" name="team_id" id="team_id">
                                                                <span>This field is required.</span>
                                                                    </fieldset>
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
                    <li class="nav-item"><a class="navbar-brand" href=""><img class="brand-logo" alt="stack admin logo" src="images/group-img.png" style="width:3%;">
                            <h3 class="brand-text">ManageTeam</h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"></a></li>
                </ul>
                <ul class="nav navbar-nav flex-row">
                </ul>


<input type="checkbox" id="modal">
        <label for="modal" class="example-label" style="font-size:14px;padding:10px;color:#008385;padding-right:50px;">Objective Ideas</label>
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
        
        <div class="back1">
            <div class="button_base b03_skewed_slide_in" id="add-team-btn">
                <div><b>+</b> Add a Team </div>
                <div></div>
                <div>Add Team</div>
            </div>
        </div>


<?php
    include ("topmenu.php");
    include("dropdown.php");
?>


        <div class="main-container">
                            <?php
			$i = 1;
while ($row = mysqli_fetch_array($result)) {
?>
                            <div class="team-group" style="width:80%;margin-left:200px;height:400px;">
                            <div class="group-avatar">
                                <img class="avatar-img" alt="Group Icon" src="images/group-img.png">
                            </div>
                            <div class="team-name"  style="text-align: left !important;">
                                <h4>This week'y priorities for <?php echo $row["teamname"];?></h4>
								<input type="hidden" id="team-id" value="<?php echo $row["id"];?>">
							
                            </div>
							
                            <br>

							
                            
                    		<div class="team-outcome" style="text-align: left !important;">
                                <h4><b>Achievements:</b><br/>
                                 <span><?php
										echo $row["achievedlist"];
									?>
                                 </span></h4>
                            </div>
                            <div class="team-escalation" style="text-align: left !important;">
                                <h4><b>Challenges:</b><br/>
                                <span> <?php
									    echo $row["challengeslist"];
										?>
                                </span></h4>
                            </div>
                            <div status="0" style="text-align: left !important;">
                                <h4><b>Next week's 3 priorities:</b> <br/>
                                <span><?php
										$text = trim($row["priorities"], "\n");
										$myArray = explode( ",", $text );
										if (!empty($myArray)) {
											echo '<ul>';
											$arrayCounter = 0;
											foreach ($myArray as $my_Array) {
												$arrayCounter++;
												$basicLabel = "team-target-";
												$team = $basicLabel.$arrayCounter;
												echo '<li class="'.$team.'">' . $my_Array . '</li>';
											}
											echo '</ul>';
										}
									?> 
                                 </span></h4>
                            </div>
                            <div class="card-button">
                                <i class="fa fa-edit edit-btn" data-toggle="tooltip" data-placement="bottom" title="Edit" 
                                idx= "<?php echo $i ?>" onclick="edit_card(this)"></i>
                                </div>                            
                        </div>
                         <?php
						 $i++;
}
?>
       </div>
    </div>

<?php
    include ("footer.php");
?>

