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
  <link href="css/tourbuildpage.css" rel="stylesheet">

  <link href="css/bootstrap-select.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link href="css/bootstrap-multiselect.css" rel="stylesheet"> -->
  
  <style type="text/css">
    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }
    }

  </style>
</head>

<body style="background-color:white"> <!--rgba(255, 99, 71, 0.4)-->
    
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar bg-default">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="index.php">
        <strong id="topic" >TourBuddy</strong>
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
            <a class="menu nav-link" href="tourpage.php" >Find a tour</a>
          </li>
          <li class="nav-item">
            <a class="menu nav-link" href="guidepage.php">Find a guide</a>
          </li>
          <?php 
            if(isset($_SESSION['act'])){
              if($_SESSION['act'] === "Guider")
                echo "<li class='nav-item'>
                        <a class='menu nav-link' href='tourbuild.php'>Build a tour</a>
                      </li>";
            }
            
          ?>
        </ul>

        <!-- Right -->
        <?php if(!isset($_SESSION['user']))
                echo "<ul class='navbar-nav nav-flex-icons'>
                        <li class='nav-item'>
                        <a href='login.php?user=Traveler' class='nav-link border btn btn-outline-white rounded'>
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
                <a  class='menu nav-link' href='accountpage.php'><h3><strong>{$_SESSION['user']}</strong></h3></a>
              </li>
                        <li class='nav-item'>
                          <a href='dbManage/UserLogout.php' class='nav-link border btn btn-outline-white rounded'>
                            <span style='margin-right:5px'>Log out</span><i class='fas fa-sign-out-alt'></i>
                          </a>
                        </li>
                        
                      </ul>";

        ?>
        

      </div>

    </div>
  </nav>
  <!-- Navbar -->



  <!--Main layout-->

  <main style="padding-top:10%">
    <div class="container">
  
        <h1 class="text-center text-default mb-4"><strong id="title">MY ACCOUNT</strong></h1>
        <?php
          if(isset($_SESSION['id']))
            echo "<input id='userID' type='hidden' value='{$_SESSION['id']}'";
        ?>
        
            <!--Grid row-->
        <div class="row">

        <!--Grid column-->
        <div class="col-md-3 mb-4 ">

            <ul class="nav flex-column pr-5">
                <li class="nav-item mb-3">
                    <a class="leftmenu nav-link font-weight-bold text-center active" data-toggle="tab" href="#panel11" role="tab">MY ACCOUNT</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="leftmenu nav-link font-weight-bold text-center" data-toggle="tab" href="#panel12" role="tab">MESSAGES</a>
                </li>
                <?php
                  if($_SESSION['act'] === "Traveler")
                      echo '<li class="nav-item mb-3">
                                <a class="leftmenu nav-link font-weight-bold text-center" data-toggle="tab" href="#panel14" role="tab">OWN TOUR</a>
                            </li>';
                  else
                      echo '<li class="nav-item mb-3">
                              <a class="leftmenu nav-link font-weight-bold text-center" data-toggle="tab" href="#panel15" role="tab">Local Traveler\'s Tour</a>
                          </li>';
                ?>
             
                <li class="nav-item mb-3">
                    <a class="leftmenu nav-link font-weight-bold text-center " data-toggle="tab" href="#panel13" role="tab">UPDATE MY INFO</a>
                </li>
            </ul>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-9 mb-4">

            <!-- Tab panels -->
            <div class="tab-content pt-0">

                <!--Panel 1-->
                <div class="tab-pane fade in show active" id="panel11" role="tabpanel">
                   <h4 class="grey-text font-weight-bold">Upcoming Tour</h4>
                   <hr>
                  <div id="upcomingtour" class="mb-5">upcoming tour list part</div>
                  <h4 class="grey-text font-weight-bold">Tours waiting your raiting and comments</h4>
                  <hr>
                  <div id="waitingtour" class="mb-5">waiting tour list part</div>


                </div>
                <!--/.Panel 1-->

                <!--Panel 2-->
                <div class="tab-pane fade" id="panel12" role="tabpanel">
                
                <!-- View Message Modal -->
                <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-default" id="exampleModalLabel">VIEW MESSAGE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      
                      </div>
                    </div>
                  </div>
                </div>

                  <!-- /View Message Modal -->

                  <!-- Send Message Modal -->
                <div class="modal fade" id="sendMsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-default" id="exampleModalLabel">VIEW MESSAGE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="grey-text h6">Select person you want to send message to.</p>
                          <div class="md-form">
                            <i class="fas fa-user prefix text-default"></i> 
                              <select class="form-control custom-select toSelect" required>
                               
                                  <option value=""></option>
                                  
                              </select> 
                          </div>
                          <p class="grey-text h6 mt-5">Write message here...</p>
                          <div class="md-form">
                            <i class="fas fa-pencil-alt text-default prefix"></i>
                            <textarea class="form-control md-textarea toContent" rows="3" required></textarea>
                            <label for="content">Message</label>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button id="msgSendBtn" type="button" class="btn btn-default">Send message</button>
                        <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>
                      
                      </div>
                    </div>
                  </div>
                </div>

                  <!-- /Send Message Modal -->
                  <h4 class="grey-text font-weight-bold">INBOX<span class="text-danger h5" id="unreadcount"></span></h4>
                   <hr>
                  <div class="mb-5">
                    <button id="sendNewMsg" class="btn btn-warning">New Message</button>
                    <span class="h5 grey-text">(to 'TourBuddySupport' or 'Guide')</span>
                    <div id="inboxmsg">
                        Inbox Messag Table
                    </div>          
                  </div>
                  <h4 class="grey-text font-weight-bold">OUTBOX</h4>
                  <hr>
                  <div id="outboxmsg" class="mb-5">
                      Outbox Message Table
                  </div>

                </div>
                <!--/.Panel 2-->
                <!--Panel 4-->
                <div class="tab-pane fade" id="panel14" role="tabpanel">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <h4 class="grey-text font-weight-bold">Guides interesting on your own tour</h4>
                    </div>
                    <div class="col-md-5">
                      <select class="form-control custom-select" name="ownTourTitleSel" id="ownTourTitleSel">
                  
                      </select>
                    </div>
                  </div>
                  
                  <hr>
                  <h5 id="ownTourSelGuides" class=" text-default mb-5"></h5>
                  <div id = "ownTourGuides" class="card-deck"></div>
                  
                  <h4 class="grey-text font-weight-bold">Your own tour</h4>
                  <hr>
                  <button id="showowntourpart" class="btn btn-warning mb-5">Build New Tour</button>
                  <div id = "owntourcard" class="card-deck"></div>
                  
                  
                  <div id="owntourpart" class="mt-5">
                    <h4 id="buildorupdate" class="grey-text font-weight-bold">Build your own tour</h4>
                    <hr>
                    
                    <div class="row">
                      <div class="col-md-5">
                        <div class="md-form">
                            <i class="fas fa-bookmark text-default prefix"></i>
                            <input type="text" id="ownTitle" class="form-control" name="ownTitle" required>
                            <label for="ownTitle">Tour Title</label>
                            <p class="grey-text"><strong>Enter the title of tour.</strong></p>

                        </div>
                      </div>
                      <div class="col-md-5">
                      
                        <div class="md-form">
                          <i class="fas fa-globe text-default prefix"></i>
                            <select id="userCountry2" class="form-control custom-select"  required name="userCountry2">
                        
                          </select>
                          <p class="grey-text"><strong>Select country of tour.</strong></p>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="md-form">
                          <i class="fas fa-hotel text-default prefix"></i>
                            <select id="userState2" class="form-control custom-select"  required name="userState2">
                              <option value = "">-Select country first-</option>
                            </select>
                          <p class="grey-text"><strong>Select state of tour.</strong></p>
                        </div>
                      </div>
                    
                      <div class="col-md-5">
                        <div class="md-form">
                        <i class="fas fa-city text-default prefix"></i>
                      
                              <select id="userCity2" class="form-control custom-select" required name="userCity2">
                                <option value = "">-Select state first-</option>
                            </select>
                            <p class="grey-text"><strong>Select city of tour.</strong></p>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="md-form">
                            <i class="far fa-clock text-default prefix"></i>
                            <input type="number" id="tourDuration" class="form-control" name="tourDuration" required>
                            <label for="tourDuration">Tour Duration <i>(hours)</i></label>
                            <p class="grey-text"><strong>Enter the number of hours for tour.</strong></p>
                            
                        </div>      
                      </div>
                      <div class="col-md-5">
                        <div class="md-form">
                            <i class="fas fa-male text-default prefix"><i class="fas fa-male text-default prefix"></i></i>
                            <input type="number" id="tourPeopleNum" class="form-control" name="tourPeopleNum"  pattern(^[1-9]+[0-9]*$) required>
                            <label for="tourPeopleNum">Up To <i>(Number Of People)</i></label>
                            <p class="grey-text"><strong>Enter the maximum number of people you want to travel with.</strong></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="md-form">
                          <i class="fas fa-dollar-sign text-default prefix"></i>
                          <input type="number" id="tourPrice" class="form-control" name="tourPrice" required>
                          <label for="tourPrice">Tour Price <i>($)</i></label>
                          <p class="grey-text"><strong>Enter the price.</strong></p>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="md-form">
                          <i class="text-default far fa-calendar-check prefix"></i>
                          <input id = "expireDate" class="datepicker form-control" type="text" autocomplete="off" placeholder="Expire Date"/>
                          <p class="grey-text"><strong>Select the expire date.</strong></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-10 text-center">
                          <div id="invalidInput" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Invalid Input! </strong>You should input all fields.
                      
                          </div>
                          <button id="buildBtn" class="btn btn-default">Build</button>  
                          <button id="updateBtn" class="btn btn-default">update</button>  
                          
                      </div>
                    </div>
                  </div>
                  

                </div>
                <!--/.Panel 4-->
                <!--Panel 5-->
                <div class="tab-pane fade" id="panel15" role="tabpanel">
                 
                      <h4 class="grey-text font-weight-bold">Traveler's own tour on your local</h4>
                      <p>(You can't see the traveler's own tour list before you built your own tour...)</p>
                  
                  <hr>
                 
                  <div id = "localTours" class="card-deck"></div>
                </div>
                <!--/.Panel 5-->
                
                <!--Panel 3-->
                <div class="tab-pane fade" id="panel13" role="tabpanel">
                  <div class="row justify-content-center">
                    <div class="col-md-6">
                      <div class="md-form">
                        <i class="fas fa-user prefix text-default"></i>
                        <input type="text" id="userName" name="userName" value="Name" class="form-control"  required>
                        <label for="userName">NAME</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="md-form">
                            <i class="fas fa-male text-default prefix"><i class="fas fa-female text-default prefix"></i></i>
                            
                            <select id="userSex" class="form-control custom-select" required name="sex">
    
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select> 
                        </div>
                    </div>
                  </div>
                  <!-- <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="md-form">
                              <i class="fas fa-city text-default prefix"></i>
                              <input type="text" id="userCity" class="form-control" value="City" name="userCity" required>
                              <label for="userCity">City</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                      <div class="md-form">
                        <i class="fas fa-globe text-default prefix"></i>
                          <select id="userCountry" class="form-control custom-select" required name="country">
                          
                        </select>
                         
                        </div>
                    </div>
                   
                  </div> -->
                  <div class="row justify-content-center">
                    <div class="col-md-5">
                    <div class="md-form">
                        <i class="fas fa-globe text-default prefix"></i>
                          <select id="userCountry" class="form-control custom-select" required name="country">
                      
                        </select>
                         
                        </div>
                    </div>
                    <div class="col-md-5">
                    <div class="md-form">
                    <i class="fas fa-hotel text-default prefix"></i>
                          <select id="userState" class="form-control custom-select" required name="userState">
                          
                        </select>
                         
                        </div>
                    </div>
                    
                  </div>
                  <div class="row justify-content-center">
                    
                    <div class="col-md-10">
                      <div class="md-form">
                      <i class="fas fa-city text-default prefix"></i>
                    
                            <select id="userCity" class="form-control custom-select" required name="userCity">
              
                          </select>
                        
                      </div>
                    </div>
                    
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="md-form">
                          <i class="fas fa-address-book text-default prefix"></i>
                            <input type="text" id="userAddress" value="Address" class="form-control" name="userAddress" required>
                            <label for="userAddress">Address</label>
                          </div>
                    </div>
                    <div class="col-md-4">
                      <div class="md-form">
                            <i class="fab fa-amazon-pay text-default prefix"></i>
                            <input type="text" id="userZip" class="form-control" value="Zip/Postal" name="userZip" required>
                            <label for="userZip">ZIP/POSTAL(Code)</label>
                          </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-5">
                      <div class="md-form">
                            <i class="fas fa-phone text-default prefix"></i>
                            <input type="text" id="userHomePhone" class="form-control" value="HomePhone" name="userHomePhone" required>
                            <label for="userHomePhone">HomePhone(Include Country Code)</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                      <div class="md-form">
                            <i class="fas fa-mobile-alt text-default prefix"></i>
                            <input type="text" id="userCellPhone" class="form-control" value="CellPhone" name="userCellPhone" required>
                            <label for="userCellPhone">CellPhone(Include Country Code)</label>
                        </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-10">
                      <div class="md-form">
                          <i class="fas fa-envelope text-default prefix"></i>
                          <input type="email" id="userEmail" class="form-control" value="Email" required email name="userEmail">
                          <label for="userEmail">Email</label>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-3">
                    <button class="btn btn-default" id="updateInfo">update</button>
                    <h4 class="font-weight-bold text-success mt-3 successMsg"></h4>
                  </div>
                  
                </div>
                <!--/.Panel 3-->
            </div>


        </div>
        <!--Grid column-->

        </div>
        <hr class="mb-5">     

        <h1 class="md-4 text-center text-default" ><strong>...and even more</strong></h1>

        <!--First row-->
        <div class="row features-small mt-5 wow fadeIn">

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
             
                <i class="text-default far fa-hand-point-up fa-3x mb-1 indigo-text" aria-hidden="true"></i>
              </div>
              <div class="col-10 mb-2 pl-3">
                <h5 class="feature-title font-bold mb-1">HAND PICKED GUIDES</h5>
                <p class="grey-text mt-2">Chrome, Firefox, IE, Safari, Opera, Microsoft Edge - MDB loves all browsers;
                  all browsers love MDB.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
           
                <i class="text-default fab fa-jenkins fa-3x mb-1 indigo-text" aria-hidden="true"></i>
  
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">PERFECT CUSTOMER SUPPORT</h5>
                <p class="grey-text mt-2">MDB becomes better every month. We love the project and enhance as much as
                  possible.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="text-default far fa-lightbulb fa-3x mb-1 indigo-text" aria-hidden="true"></i>
                
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">EVERY TOUR PRIVATE AND CUSTOMIZABLE</h5>
                <p class="grey-text mt-2">Our society grows day by day. Visit our forum and check how it is to be a
                  part of our family.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-xl-3 col-lg-6">
            <!--Grid row-->
            <div class="row">
              <div class="col-2">
                <i class="text-default fas fa-medal fa-3x mb-1 indigo-text" aria-hidden="true"></i>
                
              </div>
              <div class="col-10 mb-2">
                <h5 class="feature-title font-bold mb-1">VERIFIED CUSTOMER REVIEWS</h5>
                <p class="grey-text mt-2">MDB is integrated with newest jQuery. Therefore you can use all the latest
                  features which come along with
                  it.
                </p>
              </div>
            </div>
            <!--/Grid row-->
          </div>
          <!--/Grid column-->

        </div>
        <!--/First row-->

        <hr class="mb-5">


      </section>
      <!--Section: More-->
      <div class="text-center">
              
              <h1 class="mb-4 text-warning">
                <strong>How can we help?</strong>
              </h1>

              <p class="mb-4 d-none d-md-block grey-text">
               <strong>We provide private tours specifically for you!<br>
                  Contact our guides today with your questions....</strong>
              </p>
              <a href="contactUsPage.php" class="btn btn-warning btn-rounded">Contact Us</a> 
    </div>
    <br>
  </main>
  <!--Main layout-->

  <!-- Footer -->
<footer class="page-footer font-small pt-4 bg-default">

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
  <!-- <script type="text/javascript" src="js/bootstrap-datepicker.js"></script> -->
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
  <!-- Tour List View -->
  <script type="text/javascript" src="js/accountpage.js"></script>
   <!-- Initializations -->

  <script type="text/javascript">
    // Animations initialization
  
    new WOW().init();
   
    
  </script>

</body>

</html>
