<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
session_start();
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Online Toll Processing System</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="js/materialize.js" type="text/javascript"></script>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Home</a>
      <ul class="right hide-on-med-and-down">
        <li class="right hide-on-med-and-down"><a href="directions.html">Get Directions</a></li>
        <?php
        if(isset($_SESSION["name"]))
        {
        echo '<li class="right hide-on-med-and-down"><a href="logout.php" >Logout</a></li>';
        }
        else
        {
        echo '<li class="right hide-on-med-and-down"><a href="sign.html">SignUp/SignIn</a></li>';
        }
        ?>
        <li class="right hide-on-med-and-down"><a href="pay.php">Payments</a></li>
        <li><?php 
        echo $_SESSION["name"];
      ?>
      </li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Online Toll Processing System</h1>
      <div class="row center">
        <h5 class="header col s12 light">A Automated System to reduce the waiting time in Toll Gate</h5>
      </div>
    
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">No Waiting Time</h5>

            <p class="light">No more Waiting in Toll,Pay the Toll amount Online and Free to Go..<br>Have a Safe Journey</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">Highly Secured,So no need to worry about your Personal Data,Fell free to use</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Flexible Interface</h5>

            <p class="light">We have provided detailed documentation to help new users get started. We are also always open to feedback and can answer any questions a user may have about this process.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col s6">
                        <h5 class="white-text">About Us</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job</p>


                    </div>

        <div class="col l3 s12">
          <h5 class="white-text" class="left-align">Connect Us</h5>
          <ul>
            <li><a class="white-text" href="https://www.facebook.com/onlinetoll"><i class="material-icons prefix">facebook</i>Facebook</a></li>
            <li><a class="white-text" href="https://www.gmail.com"><i class="material-icons prefix">email</i>onlinetoll24@gmail.com</a></li>
            <li><a class="white-text" ><i class="material-icons prefix">chat</i>9444423926</a></li>
            
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contact</h5>
          <ul>
                            <li class="white-text"><b>Akilan </b></li>
                            <li class="white-text"><i class="material-icons prefix">phone</i>9698074174</li>
                            <li class="white-text"><b>Dharaneesh</b> </li>
                            <li class="white-text"><i class="material-icons prefix">phone</i>7598455773</li>
                            <li class="white-text"><b>Gopi</b> </li>
                            <li class="white-text"><i class="material-icons prefix">phone</i>7845286448</li>
          </ul>
        </div> <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col s6">
                        <h5 class="white-text">About Us</h5>
                        <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job</p>


                    </div>

        <div class="col l3 s12">
          <h5 class="white-text" class="left-align">Connect Us</h5>
          <ul>
            <li><a class="white-text" href="https://www.facebook.com/onlinetoll"><i class="material-icons prefix">facebook</i>Facebook</a></li>
            <li><a class="white-text" href="https://www.gmail.com"><i class="material-icons prefix">email</i>onlinetoll24@gmail.com</a></li>
            <li><a class="white-text" ><i class="material-icons prefix">chat</i>9444423926</a></li>
            
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contact</h5>
          <ul>
                            <li class="white-text"><b>Akilan </b></li>
                            <li class="white-text"><i class="material-icons prefix">phone</i>9698074174</li>
                            <li class="white-text"><b>Dharaneesh</b> </li>
                            <li class="white-text"><i class="material-icons prefix">phone</i>7598455773</li>
                            <li class="white-text"><b>Gopi</b> </li>
                            <li class="white-text"><i class="material-icons prefix">phone</i>7845286448</li>
          </ul>
        </div>
      </div>



    </div>
    
  </footer>

      </div>



    </div>
    
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
