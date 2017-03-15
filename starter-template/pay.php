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

                        <?php 
        echo $_SESSION["name"];
      ?>
                        </li>
                </ul>



            </div>
        </nav>





        <div class="row">
            <form class="col s12" method="POST" action="paymnt.php"><br><br><br>
                <h1 class="header center orange-text">Payment Info</h1>
                <div class="input-field col s3 offset-s3">
                    <input placeholder="First Name" name="first_name" type="text" class="validate">
                    <input placeholder="E-mail ID" name="email" type="text" class="validate">
                    <input placeholder="Vehicle number" name="vehno" type="text" class="validate">
                    <input type="date" placeholder="Select the date" class="calendar" name="dt">
                </div>
                <!--  <div class="input-field col s9 offset-s1 ">
    <div class="input-fiels col s3 offset-s3">               
 <!-- <select class="browser-default">
    <option value="" disabled selected>Source</option>
    <option value="1">Chennai</option>
    <option value="2">Madurai</option>
    <option value="3">Ariyalur</option>
    <option value="4">Karur</option>
    <option value="5">Nagapattinam</option>
    <option value="6">Perambalur</option>
    <option value="7">Pudukkottai</option>
    <option value="8">Thanjavur</option>
    <option value="9">Tiruchirappalli</option>
    <option value="10">Tiruvarur</option>
</option>
  </select>              
            </div>
  </div>

  <div class="input-field col s9 offset-s1 ">
    <div class="input-fiels col s3 offset-s3">               
  <select class="browser-default">
    <option value="" disabled selected>Destination</option>
    <option value="1"> Dharmapuri</option>
    <option value="2"> Coimbatore</option>
    <option value="3"> Erode</option>
    <option value="4"> Krishnagiri</option>
    <option value="5"> Namakkal</option>
    <option value="6"> The Nilgiris</option>
    <option value="7"> salem</option>
    <option value="8"> Tiruppur</option>
     <option value="9">Tiruchirappalli</option>
<option value="10">Tiruvarur</option>
  </select>
</div>
  </div>
-->
                <div class="input-field col s9 offset-s1 ">
                    <div class="input-fiels col s3 offset-s3">
                        <select class="browser-default" name="toll">
    <option value="" disabled selected>Toll Road</option>
    <option value="East Coast Road (ECR) from Chennai to Pondicherry"> East Coast Road (ECR) from Chennai to Pondicherry</option>
    <option value="Chennai Bye Pass Road from Irumbuliyur, Chennai to NH4 Madhavaram, Chennai">Chennai Bye Pass Road from Irumbuliyur, Chennai to NH4 Madhavaram, Chennai</option>
    <option value="Chennai ECR - Sholinganallur Road from ECR, Chennai to Sholinganallur, Chennai">Chennai ECR - Sholinganallur Road from ECR, Chennai to Sholinganallur, Chennai</option>
    <option value="Chennai OMR - Medavakkam Road from Sholinganallur, Chennai to Medavakkam, Chennai">Chennai OMR - Medavakkam Road from Sholinganallur, Chennai to Medavakkam, Chennai</option>
    <option value="NH 47 Salem to Coimbatore Expressway / Industrial Corridor">NH 47 Salem to Coimbatore Expressway / Industrial Corridor</option>
    <option value="NH 67 Coimbatore to Trichy">NH 67 Coimbatore to Trichy</option>
    <option value="NH 7 Hosur to Krishnagiri">NH 7 Hosur to Krishnagiri</option>
    <option value="NH 4 Krishnagiri to Chennai">NH 4 Krishnagiri to Chennai</option>
    <option value="NH 45 Chennai to Villupuram">NH 45 Chennai to Villupuram</option>
    <option value="NH 7 Krishnagiri to Salem">NH 7 Krishnagiri to Salem</option>
    <option value="NH 45B Madurai to Tuticorin">NH 45B Madurai to Tuticorin</option>
    <option value="NH 45 Dindigul to Trichy">NH 45 Dindigul to Trichy</option>
    <option value="NH 45 Villupuram to Trichy">NH 45 Villupuram to Trichy</option>
    <option value="NH 7 Salem to Madurai">NH 7 Salem to Madurai</option>
    <option value="NH 7A Tirunelveli to Tuticorin">NH 7A Tirunelveli to Tuticorin</option>
    <option value="Chennai to Ennore Express Way">Chennai to Ennore Express Way (Inner Ring Road & Manali Oil Refinery Rd.)</option>
    <option value="NH 45B Madurai to Trichy">NH 45B Madurai to Trichy</option>
</option>
    
  </select>
                    </div>
                </div>





                <div class="input-field col s9 offset-s1 ">
                    <div class="input-fields col s3 offset-s3">
                        <select class="browser-default" name="vehtyp" onchange="disp()" id="veh_ty">
    <option value="" disabled selected>Vehicle</option>
    <option value="Motorised Three Wheelers"> Motorised Three Wheelers</option>
    <option value="Car"> Car</option>
    <option value="Light Commercial Vehicles"> Light Commercial Vehicles</option>
    <option value="Truck"> Truck</option>
    <option value="Bus"> Bus</option>
    <option value="Multi Axle Vehicles"> Multi Axle Vehicles</option>
    </option>
</select>
                        <script>
                            function disp() {
                                var x = document.getElementById("veh_ty").value;
                                if (x == "Motorised Three Wheelers") {
                                    document.getElementById("amt").value = "50";
                                }
                                if (x == "Car") {
                                    document.getElementById("amt").value = "50";
                                }
                                if (x == "Light Commercial Vehicles") {
                                    document.getElementById("amt").value = "85";
                                }
                                if (x == "Truck") {
                                    document.getElementById("amt").value = "170";
                                }
                                if (x == "Bus") {
                                    document.getElementById("amt").value = "170";
                                }
                                if (x == "Multi Axle Vehicles") {
                                    document.getElementById("amt").value = "275";
                                }
                            }
                        </script>
                    </div>
                </div>
                <div class="input-field col s9 offset-s1 ">
                    <div class="input-fields col s3 offset-s3">

                        <p>You need to pay<input type="label" name="amt1" value="" id="amt" readonly="readonly"></p>
                        <!-- <a class="waves-effect waves-light btn" href="web/index1.html" type="submit"><i class="material-icons left" >cloud</i>Proceed To Pay</a>-->
                        <input type="submit" class="waves-effect waves-light btn" value="Proceed ">
            </form>
            </div>
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