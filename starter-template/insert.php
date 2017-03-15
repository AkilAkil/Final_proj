
  
  <!DOCTYPE html>
<html lang="en">
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
    <div class="nav-wrapper container"><a id="logo-container" href="index.html" class="brand-logo">Home</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="directions.html">Get Directions</a></li>
        <li><a href="sign.html">SignUp/SignIn</a></li>
        <li><a href="pay.php">Payments</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <?php
mysql_connect("localhost","root","asdf1234")||die("error");
mysql_select_db("onlinetoll")||die("error");
	$name=$_POST["name"];
	$username=$_POST["username"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$address=$_POST["addrs"];
	$pincode=$_POST["pin"];
	$mob_no=$_POST["mbno"];
	mysql_query("insert into user values('".$name."','".$username."','".$email."','".$mob_no."','".$pincode."','".$address."','".$password."')")||die("There is an error in creating the account");
		


?>
<main>

<p class="indigo-text.text-lighten-4">Your Account Has been created     <a href=login.html>Click Here to login</a></p>
</main>
<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>


	<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>

	<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
	<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
<div class="row">
	</div>
	<div class="row">
	</div>
<div class="row">
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
        </div>
      </div>



    </div>
    
  </footer>
</body>
</html>