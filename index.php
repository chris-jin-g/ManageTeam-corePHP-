<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TourBuddySite</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <!-- <link href="css/style.css" rel="stylesheet"> -->
  <link href="css/home.css" rel="stylesheet">
  <style type="text/css">
    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }
    }

  </style>
</head>

<body>
    
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="index.php">
        <strong id="topic" >ManageTeam</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="menu nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="menu nav-link" href="main.php" >Add a Team</a>
          </li>
          <li class="nav-item">
            <a class="menu nav-link" href="main.php">Quick a Overview</a>
          </li>
          <li class="nav-item">
            <a class="menu nav-link" href="main.php">Reports</a>
          </li>
        </ul>

        <!-- Right -->
        <?php if(!isset($_SESSION['user']))
                echo "<ul class='navbar-nav nav-flex-icons'>
                        <li class='nav-item'>
                          <a href='login.php' class='nav-link border btn btn-outline-white rounded'>
                          <i class='fas fa-sign-in-alt'></i> <span style='margin-right:5px'>Sign In</span>
                          </a>
                        </li>
                      </ul>
                      <ul class='navbar-nav nav-flex-icons'>
                        <li class='nav-item'>
                          <a href='regist.php' class='nav-link border btn btn-outline-white rounded'>
                          <i class='fas fa-file-import'></i> <span style='margin-right:5px'>Regist</span>
                          </a>
                        </li>
                      </ul>";
              else
                echo "<ul class='navbar-nav ml-auto'>
                        
                        <li class='nav-item'>
                          <a  class='menu nav-link' href='#'><h6><strong><i class='fas fa-user'></i>{$_SESSION['user']['name']}</strong></h6></a>
                        </li>
                        <li class='nav-item'>
                          <a href='logout.php' class='nav-link border btn btn-outline-white rounded'>
                            <span style='margin-right:5px'>Log out</span><i class='fas fa-sign-out-alt'></i>
                          </a>
                        </li>
                        
                      </ul>";

        ?>
        

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
  
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('./images/carousel/78.jpg'); background-repeat: no-repeat; background-size: cover">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              
              <h1 class="mb-4">
                <strong>Why automate your objectives?</strong>
              </h1>

              <p class="mb-4 d-none d-md-block">
               <strong>Wouldn't it be nice if there was a system that told you what you team's next objectives should be? <br>Using AI ManageTeam analyses all your tickets (serviceNOW, Sales Force, Google feedback etc) and suggests what your next 3 objectives should be. </strong>
              </p>
              <div style="margin-top:50px;">
                <a  href="main.php" class="btn btn-secondary btn-lg">Add a Team
                  <i class="fas fa-plus"></i>
                </a>
                <a  href="main.php" class="btn btn-primary btn-lg">Quick a Overview
                  <i class="fas fa-book"></i>
                </a>
                <a  href="main.php" class="btn btn-primary btn-lg">Report
                  <i class="fas fa-file"></i>
                </a>
              </div>
             
        
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('./images/carousel/3.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              
              <h1 class="mb-4">
                <strong>Why automate your objectives?</strong>
              </h1>

            

              <p class="mb-4 d-none d-md-block">
                <strong>Wouldn't it be nice if there was a system that told you what you team's next objectives should be?<br> Using AI ManageTeam analyses all your tickets (serviceNOW, Sales Force, Google feedback etc) and suggests what your next 3 objectives should be.</strong>
              </p>

              <div style="margin-top:50px;">
                <a  href="main.php" class="btn btn-secondary btn-lg">Add a Team
                  <i class="fas fa-plus"></i>
                </a>
                <a  href="main.php" class="btn btn-primary btn-lg">Quick a Overview
                  <i class="fas fa-book"></i>
                </a>
                <a  href="main.php" class="btn btn-primary btn-lg">Report
                  <i class="fas fa-file"></i>
                </a>
              </div>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('./images/carousel/4.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Why automate your objectives?</strong>
              </h1>

            

              <p class="mb-4 d-none d-md-block">
                <strong>Wouldn't it be nice if there was a system that told you what you team's next objectives should be? <br>Using AI ManageTeam analyses all your tickets (serviceNOW, Sales Force, Google feedback etc) and suggests what your next 3 objectives should be.</strong>
              </p>

              <div style="margin-top:50px;">
                <a  href="main.php" class="btn btn-secondary btn-lg">Add a Team
                  <i class="fas fa-plus"></i>
                </a>
                <a  href="main.php" class="btn btn-primary btn-lg">Quick a Overview
                  <i class="fas fa-book"></i>
                </a>
                <a  href="main.php" class="btn btn-primary btn-lg">Report
                  <i class="fas fa-file"></i>
                </a>
              </div>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->

  <!--Main layout-->
  <main>
  <div mc:template_section="Body" class="templateSection templateBody" data-template-container="" style="background:#FAFAFA none no-repeat center/cover;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;position: relative;display: flex;flex-shrink: 0;justify-content: center;padding-right: 0px;padding-left: 0px;background-color: #FAFAFA;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 162px;padding-bottom: 162px;box-sizing: border-box !important;">
        <div class="bodyContainer contentContainer" style="background:transparent none no-repeat center/cover;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;max-width: 960px;width: 100%;flex: 0 0 auto;background-color: transparent;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0;padding-bottom: 0;box-sizing: border-box !important;"><div width="100%" class="mcnTextBlock" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
    <div class="mcnTextBlockInner" style="display: flex;padding: 9px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
        
        <div style="width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
            <div class="mcnTextContent" style="padding-top: 0;padding-right: 9px;padding-bottom: 9px;padding-left: 9px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;word-break: break-word;flex-flow: column;color: #686868;font-family: Raleway;font-size: 22px;line-height: 150%;text-align: left;box-sizing: border-box !important;">
                <h2 style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;display: block;margin: 0;padding: 0;color: #2A2A2A;font-family: Raleway;font-size: 72px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;text-align: center;box-sizing: border-box !important;">Why automate Objectives using OKRs?&nbsp;</h2>

<h1 style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;display: block;margin: 0;padding: 0;color: #FFFFFF;font-family: Raleway;font-size: 72px;font-style: normal;font-weight: bold;line-height: 100%;letter-spacing: normal;text-align: left;box-sizing: border-box !important;">Why use OKRs?</h1>

<p style="text-align: center;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;margin: 10px 0;padding: 0;color: #686868;font-family: Raleway;font-size: 22px;line-height: 150%;box-sizing: border-box !important;"><a id="header" name="header" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;color: #686868;font-weight: normal;text-decoration: underline;box-sizing: border-box !important;"></a>Objective, Key, Results is an&nbsp;essential component&nbsp;when looking to align your team/s to the companies objectives so that all parties involved can contribute to the bigger picture with absolute clarity.<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
However implementing and managing&nbsp;OKRs &nbsp;isn't always easy, that is until ManageTeam. ManageTeam makes it clearer and easier to set, track and&nbsp;achieve inspirational objectives with just a few steps. Setup OKRs for success with ManageTeam. You'll wonder how you ever manged without ManageTeam.&nbsp;<a name="header" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;color: #686868;font-weight: normal;text-decoration: underline;box-sizing: border-box !important;"></a></p>

<div style="text-align: center;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">&nbsp;</div>

            </div>
        </div>
        
    </div>
</div><div class="mcnCaptionBlock" style="display: flex;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
    
    <div class="mcnCaptionBlockInner" style="padding: 9px;width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
        <div class="mcnCaptionColumn" style="display: flex;flex-direction: row-reverse;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
            <div style="display: flex;flex: 0 0 50%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                <div class="mcnCaptionLeftContentInner" style="padding: 0 9px;justify-content: center;display: flex;flex: 1 1 100%;align-self: flex-start;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                    
                    

                        <img alt="" src="https://eep.io/mc-gallery/2aa89f31f651d210f559b2a9d/images/95ccb9e8-543e-4815-a06f-6c177e62723c.png" width="820" style="align-self: center;max-width: 100%;border-radius: 1%;box-shadow: none;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;border: 0;height: auto;outline: none;text-decoration: none;vertical-align: bottom;box-sizing: border-box !important;" class="mcnImage">
                        
                    
                </div>
            </div>
            <div style="display: flex;flex: 0 0 50%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                <div class="mcnTextContent" style="flex: 1 1 100%;padding: 0px 9px;font-size: 16px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;word-break: break-word;flex-flow: column;color: #686868;font-family: Raleway;line-height: 150%;text-align: left;box-sizing: border-box !important;">
                    <br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
&nbsp;
<h3 style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;display: block;margin: 0;padding: 0;color: #2A2A2A;font-family: Raleway;font-size: 36px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;text-align: left;box-sizing: border-box !important;">AUTOMATED OUTCOME REPORTING</h3>

<p style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;margin: 10px 0;padding: 0;color: #686868;font-family: Raleway;font-size: 22px;line-height: 150%;text-align: left;box-sizing: border-box !important;">We will automate outcome reporting , so you can see customers and staff are happier about the objectives you are&nbsp;focused on in real time.</p>

                </div>
            </div>
        </div>
    </div>
    
</div><div class="mcnDividerBlock" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;table-layout: fixed !important;">
    <div class="mcnDividerBlockInner" style="padding: 30px 18px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
        <div class="mcnDividerContent" style="border-top: 2px none #EAEAEA;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;"></div>
    </div>
</div><div class="mcnShareBlockInner" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
    <div style="display: flex;padding: 9px 18px;justify-content: center;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
        <div class="mcnShareContent" style="display: flex;flex: 1 1 auto;flex-wrap: wrap;flex-direction: row;justify-content: center;padding: 9px 0 0 9px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
            
            <div style="display: flex;padding-right: 9px;padding-bottom: 9px;justify-content: center;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                <div class="mcnShareContentItem" style="display: flex;align-items: center;padding: 5px 9px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                    <div class="mcnShareIconContent" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                        <a href="https://mc.us12.list-manage.com/pages/track/click?u=2aa89f31f651d210f559b2a9d&amp;id=b9156ab7a9" target="_blank" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                            <img src="https://eep.io/mc-cdn-images/icons/social-block-v2/outline-dark-linkedin-48.png" alt="Share" class="mcnShareBlockIcon" width="100%" style="max-width: 24px;height: auto;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;border: 0;outline: none;text-decoration: none;box-sizing: border-box !important;">
                        </a>
                    </div>
                    <div class="mcnShareTextContent" style="padding-left: 5px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                        <a href="https://mc.us12.list-manage.com/pages/track/click?u=2aa89f31f651d210f559b2a9d&amp;id=b9156ab7a9" target="_blank" style="color: #202020;font-family: Arial;font-size: 12px;font-weight: normal;line-height: normal;text-align: center;text-decoration: none;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">Share</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div><div class="mcnCaptionBlock" style="display: flex;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
    
    <div class="mcnCaptionBlockInner" style="padding: 9px;width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
        <div class="mcnCaptionColumn" style="display: flex;flex-direction: row;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
            <div style="display: flex;flex: 0 0 50%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                <div class="mcnCaptionRightContentInner" style="padding: 0 9px;justify-content: center;display: flex;flex: 1 1 100%;align-self: flex-start;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                    
                    

                        <img alt="" src="https://eep.io/mc-gallery/2aa89f31f651d210f559b2a9d/images/b7dab154-0e2b-4e2e-b0c6-f8b0ca0e9ef1.png" width="920" style="align-self: center;max-width: 100%;border-radius: 1%;box-shadow: none;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;border: 0;height: auto;outline: none;text-decoration: none;vertical-align: bottom;box-sizing: border-box !important;" class="mcnImage">
                        
                    
                </div>
            </div>
            <div style="display: flex;flex: 0 0 50%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                <div class="mcnTextContent" style="flex: 1 1 100%;padding: 0px 9px;font-size: 16px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;word-break: break-word;flex-flow: column;color: #686868;font-family: Raleway;line-height: 150%;text-align: left;box-sizing: border-box !important;">
                    <br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
<br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
&nbsp;
<h3 style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;display: block;margin: 0;padding: 0;color: #2A2A2A;font-family: Raleway;font-size: 36px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;text-align: left;box-sizing: border-box !important;">A.I Recommended Objectives</h3>

<p style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;margin: 10px 0;padding: 0;color: #686868;font-family: Raleway;font-size: 22px;line-height: 150%;text-align: left;box-sizing: border-box !important;">Integrate into ServiceNOW, JIRA or SalesForce to perform automated A.I recommendations. ManageTeam will look through your customer feedback and tickets and suggest&nbsp;objectives.</p>

                </div>
            </div>
        </div>
    </div>
    
</div><div class="mcnCaptionBlock" style="display: flex;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
    
    <div class="mcnCaptionBlockInner" style="padding: 9px;width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
        <div class="mcnCaptionColumn" style="display: flex;flex-direction: row-reverse;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
            <div style="display: flex;flex: 0 0 50%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                <div class="mcnCaptionLeftContentInner" style="padding: 0 9px;justify-content: center;display: flex;flex: 1 1 100%;align-self: flex-start;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                    
                    

                        <img alt="" src="https://eep.io/mc-gallery/2aa89f31f651d210f559b2a9d/images/eb079986-fb52-405f-ab5f-8da06bf7929c.png" width="820" style="align-self: center;max-width: 100%;border-radius: 1%;box-shadow: none;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;border: 0;height: auto;outline: none;text-decoration: none;vertical-align: bottom;box-sizing: border-box !important;" class="mcnImage">
                        
                    
                </div>
            </div>
            <div style="display: flex;flex: 0 0 50%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
                <div class="mcnTextContent" style="flex: 1 1 100%;padding: 0px 9px;font-size: 16px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;word-break: break-word;flex-flow: column;color: #686868;font-family: Raleway;line-height: 150%;text-align: left;box-sizing: border-box !important;">
                    <br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box !important;">
&nbsp;
<h3 style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;display: block;margin: 0;padding: 0;color: #2A2A2A;font-family: Raleway;font-size: 36px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;text-align: left;box-sizing: border-box !important;">WHY LEAVE SUCCESS TO CHANCE?</h3>

<p style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;margin: 10px 0;padding: 0;color: #686868;font-family: Raleway;font-size: 22px;line-height: 150%;text-align: left;box-sizing: border-box !important;">ManageTeam's state of the art AI will learn from high performance individuals and recommend priorities automatically to the rest of the team. This means managers will spend less time&nbsp;staying on top of their team manually.</p>

                </div>
            </div>
        </div>
    </div>
    
</div>
</main>
  <!--Main layout-->

  <!-- Footer -->
<footer class="page-footer font-small pt-4">

<!-- Footer Links -->
<div class="container text-center text-md-left">

  <!-- Footer links -->
  <div class="row text-center text-md-left mt-3 pb-3">

    <!-- Grid column -->
    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
      <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
        consectetur
        adipisicing elit.</p>
    </div>
    <!-- Grid column -->

    <hr class="w-100 clearfix d-md-none">

    <!-- Grid column -->
    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
      <p>
        <a href="#!">MDBootstrap</a>
      </p>
      <p>
        <a href="#!">MDWordPress</a>
      </p>
      <p>
        <a href="#!">BrandFlow</a>
      </p>
      <p>
        <a href="#!">Bootstrap Angular</a>
      </p>
    </div>
    <!-- Grid column -->

    <hr class="w-100 clearfix d-md-none">

    <!-- Grid column -->
    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
      <p>
        <a href="#!">Your Account</a>
      </p>
      <p>
        <a href="#!">Become an Affiliate</a>
      </p>
      <p>
        <a href="#!">Shipping Rates</a>
      </p>
      <p>
        <a href="#!">Help</a>
      </p>
    </div>

    <!-- Grid column -->
    <hr class="w-100 clearfix d-md-none">

    <!-- Grid column -->
    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
      <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
      <p>
        <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
      <p>
        <i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
      <p>
        <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
      <p>
        <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
    </div>
    <!-- Grid column -->

  </div>
  <!-- Footer links -->

  <hr>

  <!-- Grid row -->
  <div class="row d-flex align-items-center">

    <!-- Grid column -->
    <div class="col-md-7 col-lg-8">

      <!--Copyright-->
      <p class="text-center text-md-left">© 2019 Copyright:
        <a href="#">
          <strong> bookmytourbuddy.com</strong>
        </a>
      </p>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-5 col-lg-4 ml-lg-0">

      <!-- Social buttons -->
      <div class="text-center text-md-right">
        <ul class="list-unstyled list-inline">
          <li class="list-inline-item">
            <a class="btn-floating btn-sm rgba-white-slight mx-1">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-sm rgba-white-slight mx-1">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-sm rgba-white-slight mx-1">
              <i class="fab fa-google-plus-g"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn-floating btn-sm rgba-white-slight mx-1">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </li>
        </ul>
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

</footer>
<!-- Footer -->
  

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="js/addons/rating.js"></script>
  
  <script type="text/javascript" src="js/indexpage.js"></script>
  <!-- Initializations -->

  <script type="text/javascript">
    // Animations initialization
  
    new WOW().init();
    // $('#rateMe1').mdbRate();

  </script>
</body>

</html>
