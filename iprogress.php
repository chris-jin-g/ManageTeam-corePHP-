<?php
    include("config.php");
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
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/main.css">
    <link href="css/modals.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image:none !important;">
    



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
		<label for="modal" class="example-label" style="font-size:14px;padding:10px;color:#008385;padding-right:50px;">Objective Ideas</label>
		<div class="modal">
			<div class="modal-header">
				<h3>These Objective Ideas have been submitted by the team for the Next Quarter</h3>
				<label for="modal">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAdVBMVEUAAABNTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU1NTU0N3NIOAAAAJnRSTlMAAQIDBAUGBwgRFRYZGiEjQ3l7hYaqtLm8vsDFx87a4uvv8fP1+bbY9ZEAAAB8SURBVBhXXY5LFoJAAMOCIP4VBRXEv5j7H9HFDOizu2TRFljedgCQHeocWHVaAWStXnKyl2oVWI+kd1XLvFV1D7Ng3qrWKYMZ+MdEhk3gbhw59KvlH0eTnf2mgiRwvQ7NW6aqNmncukKhnvo/zzlQ2PR/HgsAJkncH6XwAcr0FUY5BVeFAAAAAElFTkSuQmCC" width="16" height="16" alt="">
				</label>
			</div>
			<p><b>Product Team</b> Build Customer Success Capability <font color="blue">(4 Upvotes)</font></p>
			<p><b>Sales Team</b> Become a leader in data integration prof services <font color="blue">(6 Upvotes)</font></p>
			<p><b>Ticket Analysis (automated entry)</b> Based on your ServiceNOW tickets you should consider automating Virtual Machine builds to reduce avg 48 requests per month <font color="blue">(1 Upvote)</font></p>
                        <p><b>Customer Feedback Analysis (automated entry)</b> Based on your SalesForce tickets you should consider improving help pages for "Creating finance reports" <font color="blue">(9 Upvotes)</font>
		</div>
</input>

        </nav>
        

<?php
    include ("topmenu.php");
    include("dropdown.php");
?>


<div style="padding:50px;margin-left:200px;padding-right:200px;">
<h2 style="color:grey;">Realtime Outcome Progress</h2>
<h3>Product Team (example)</h3>
<p>Insights: Progress this quarter for focusing on the "Make customers love profiles" feature has shown <font color="#4CC552"><b>20%</b></font> increase in customer happiness seen in tickets (HubSspot) and feedback forms (SalesForce). <font color="#4CC552"><b>30% reduction</b></font> in tickets logged and average of <font color="#4CC552"><b>14 hours a month</b></font> saved that was normally spent on ticket resolution.
<br/><img src="https://manageteam.online/images/charts1.jpg" style="position:relative;padding-top:0px; width:50%;max-width:100%;opacity: 0.95;padding:60px;"/>

<h3>Level 2 Support (example)</h3>
<p>Insights: Progress this quarter for focusing on the "Make customers love profiles" feature has shown <font color="#4CC552"><b>20%</b></font> increase in customer happiness seen in tickets (HubSspot) and feedback forms (SalesForce). <font color="#4CC552"><b>30% reduction</b></font> in tickets logged and average of <font color="#4CC552"><b>14 hours a month</b></font> saved that was normally spent on ticket resolution.

<br/><img src="https://manageteam.online/images/charts1.jpg" style="position:relative;padding-top:0px; width:50%;max-width:100%;opacity: 0.95;padding:60px;"/>


    </div>

<?php
    include ("footer.php");
?>

