
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/loginStyle.css" rel="stylesheet">
</head>

<body>
	
<header>

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

    <!--Intro Section-->
    <section class="view intro-2">
        
      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

              <!--Form with header-->
              <div class="card wow fadeIn" data-wow-delay="0.3s">

                <!-- Material form login -->
                <div class="card">

                  <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Sign in</strong>
                  </h5>

                  <!--Card content-->
                  <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="#!">

                      <!-- Email -->
                      <div class="md-form">
                        <input type="email" name="email" id="materialLoginFormEmail" class="form-control" required>
                        <label for="materialLoginFormEmail">E-mail</label>
                      </div>

                      <!-- Password -->
                      <div class="md-form">
                        <input type="password" name="password" id="materialLoginFormPassword" class="form-control" required>
                        <label for="materialLoginFormPassword">Password</label>
                      </div>

                      <div class="d-flex justify-content-around">
                        <div>
                          <!-- Remember me -->
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                            <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
                          </div>
                        </div>
                        <div>
                          <!-- Forgot password -->
                          <a href="">Forgot password?</a>
                        </div>
                      </div>

                      <!-- Sign in button -->
                      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>
                      <small id="status-msg" class="form-text text-muted mb-4 ">
                              
                      </small>
                      <!-- Register -->
                      <p>Not a member?
                        <a href="">Register</a>
                      </p>

                      <!-- Social login -->
                      <p>or sign in with:</p>
                      <a  class="btn-floating btn-fb btn-sm">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a  class="btn-floating btn-tw btn-sm">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a  class="btn-floating btn-li btn-sm">
                        <i class="fab fa-linkedin-in"></i>
                      </a>
                      <a  class="btn-floating btn-git btn-sm">
                        <i class="fab fa-github"></i>
                      </a>

                    </form>
                    <!-- Form -->

                  </div>

                </div>
                <!-- Material form login -->
              </div>
              <!--/Form with header-->

            </div>
          </div>
        </div>
      </div>
    </section>
    </header>
  <!--Main Navigation-->
  <!-- Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript">
          new WOW().init();
  </script>
  <script type="text/javascript">
          new WOW().init();
    $(document).ready(function(){
      $("form").submit(function (e) {
        e.preventDefault();
        $("#status-msg").html("");
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
          $.ajax({
            url : 'ajax/userLogin.php',
            type : 'post',
            data : {action:'register', email: email, password: password},
            success : function(response) {
                response = JSON.parse(response);                
                if(response.status == "success") {
                  location.replace('http://localhost/manageteam/main.php');
                } else {
                  $("#status-msg").html(response.msg);
                }
            }                
          });    
      });
    });
  </script>
</body>

</html>
