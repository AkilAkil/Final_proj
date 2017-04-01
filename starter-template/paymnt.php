<html>
<?php
ob_start();
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <script src="js/materialize.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>

    <script src="js/jquery-ui.js">
        $(function() {
            $(".calendar").datepicker();
        });

        $(document).ready(function() {
            $('select').material_select();
        });

        $('select').material_select('destroy');
    </script>

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
        <li class="right hide-on-med-and-down"><a href="pay.html">Payments</a></li>
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

<?php
mysql_connect("localhost","root","asdf1234")||die("error");
mysql_select_db("onlinetoll")||die("error");
@$na=$_POST["first_name"];
@$id=$_POST["email"];
@$veh =$_POST["vehno"];
@$date=$_POST["dt"];
@$from_pl=$_POST["from_pl"];
@$to_pl=$_POST["to_pl"];
@$ent=$_POST["g1"];
$tl='';
foreach($_POST['t1'] as $te)
{
    $tl=$tl.$te.',';
}
@$vehty=$_POST["vehtyp"];
@$amt=$_POST["amt1"];
mysql_query("insert into numplate values('".$veh."','".$vehty."','".$na."','".$id."','".$date."','".$from_pl."','".$to_pl."','".$tl."','".$amt."','".$ent."')")||die("There is an error in creating the account");
?>
  <div class="row"></div>
    <div class="row"></div>
      <div class="row"></div>
        
 <h3 class="header center orange-text">Your Vehicle's toll amount has been paid</h3>




<div class="row"></div>
          <div class="row"></div>
            <div class="row"></div>
              <div class="row"></div>
              <div class="row"></div>
          <div class="row"></div>
            <div class="row"></div>
              <div class="row"></div>
              <div class="row"></div>
          <div class="row"></div>
            <div class="row"></div>
              <div class="row"></div>
              <div class="row"></div>
            <div class="row"></div>
              <div class="row"></div>
               <div class="row"></div>
              <div class="row"></div>
            <div class="row"></div>
              <div class="row"></div>
              



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
                        <li><a class="white-text"><i class="material-icons prefix">chat</i>9444423926</a></li>

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