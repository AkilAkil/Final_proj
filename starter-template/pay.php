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


<?php
$con=mysql_connect("localhost","root","asdf1234")||die("error");
mysql_select_db("onlinetoll")||die("error");
$ret = mysql_query("select email from user where name='".$_SESSION["name"]."'");
while($row = mysql_fetch_assoc($ret)) {
    $r1= $row["email"];
}
?>




        <div class="row">
            <form class="col s12" name="pay" method="POST" action="paymnt.php"><br><br><br>
                <h1 class="header center orange-text">Payment Info</h1>
                <div class="input-field col s3 offset-s3">
                    <input placeholder="First Name" name="first_name" type="text" class="validate" value=<?php echo $_SESSION["name"] ?>>
                    <input placeholder="E-mail ID" name="email" type="text" class="validate" value=<?php echo $r1 ?>>
                    <input placeholder="Vehicle number" name="vehno" type="text" class="validate">
                    <input type="date" placeholder="Select the date" class="calendar" name="dt">
                    
                    
                   
                    

                    <p>
                       <input name="g1" type="radio" id="test1" value="0">
                       <label for="test1">Single Entry</label>
                       </p>
                    <p>
                       <input name="g1" type="radio" id="test2"  value = "1">
                       <label for="test2">Multiple Entry</label>
                    </p> 
               
                </div>
                

                <!--  <div class="input-field col s9 offset-s1 ">
    <div class="input-fiels col s3 offset-s3">               
 <! <select class="browser-default">
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
                        <select class="browser-default" name="from_pl" id="from" onchange="toll()">
    <option value="" disabled selected>From</option>
    <option value="Dindigul">Dindigul</option>
    <option value="Kanyakumari">Kanyakumari</option>
</option>
    
  </select>
                    </div>
                    <div class="input-fiels col s3 offset-s3">
                        <select class="browser-default" name="to_pl" id="to" onchange="toll()">
    <option value="" disabled selected>To</option>
    <option value="Ariyalur"> Ariyalur</option>
    <option value="Karur">Karur</option>
    <option value="Nagapattinam">Nagapattinam</option>
    <option value="Perambalur">Perambalur</option>
    <option value="Puthukottai">Puthukottai</option>
    <option value="Tanjavur">Tanjavur</option>
    <option value="Thiruchirapalli">Thiruchirapalli</option>
    <option value="Tiruvarur">Tiruvarur</option>
	<option value="Dharmapuri">Dharmapuri</option>
    <option value="Coimbatore">Coimbatore</option>
    <option value="Erode">Erode</option>
    <option value="Krishnagiri">Krishnagiri</option>
    <option value="Namakkal">Namakkal</option>
    <option value="The Nilgiris">The Nilgiris</option>
    <option value="Salem">Salem</option>
    <option value="Tirupur">Tirupur</option>
    <option value="Kanyakumari">Kanyakumari</option>
    <option value="Dindigul">Dindigul</option>
    <option value="Madurai">Madurai</option>
    <option value="Ramanadhapuram">Ramanadhapuram</option>
    <option value="Sivaganaga">Sivaganaga</option>
    <option value="Theni">Theni</option>
    <option value="Thoothukudi">Thoothukudi</option>
    <option value="Tirunelveli">Tirunelveli</option>
    <option value="Virudhunagar">Virudhunagar</option>
    <option value="Chennai">Chennai</option>
    <option value="Cuddalore">Cuddalore</option>
    <option value="Kanchepuram">Kanchepuram</option>
    <option value="Thiruvallar">Thiruvallar</option>
    <option value="Tiruvannamalai">Tiruvannamalai</option>
    <option value="Vellore">Vellore</option>
    <option value="Villupuram">Villupuram</option>    
</option>
    
  </select>
                    </div>
                </div>



<script>
var from=document.getElementById("from");
var to=document.getElementById("to");
function toll()
{
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Ariyalur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Samayapuram"/><label for="test6">Samayapuram</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Karur")
            {
                document.getElementById("toll_lst").innerHTML="No tolls  present in this route";
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Nagapattinam")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Valavanthankottai"/><label for="test6">Valavanthankottai</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Perambalur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Samayapuram"/><label for="test6">Samayapuram</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Puthukottai")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Tanjavur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Valavanthankottai"/><label for="test6">Valavanthankottai</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Thiruchirapalli")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
             if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Tiruvarur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Valavanthankottai"/><label for="test6">Valavanthankottai</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Dharmapuri")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Rasampalayan"/><label for="test5">Rasampalayan</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Omallur"/><label for="test6">Omallur</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Palayam (Dharmapuri)"/><label for="test6">Palayam (Dharmapuri)</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Coimbatore")
            {
                document.getElementById("toll_lst").innerHTML="No tolls  present in this route";
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Erode")
            {
                document.getElementById("toll_lst").innerHTML="No tolls  present in this route";
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Krishnagiri")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Rasampalayan"/><label for="test5">Rasampalayan</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Omallur"/><label for="test6">Omallur</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Palayam (Dharmapuri)"/><label for="test6">Palayam (Dharmapuri)</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Namakkal")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Rasampalayan"/><label for="test5">Rasampalayan</label></p>';
                 document.getElementById("toll_lst").innerHTML=t;
            }
             if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="The Nilgiris")
            {
                document.getElementById("toll_lst").innerHTML="No tolls  present in this route";
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Salem")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Rasampalayan"/><label for="test5">Rasampalayan</label></p>';
                 document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Tirupur")
            {
                document.getElementById("toll_lst").innerHTML="No tolls  present in this route";
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Kanyakumari")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Kodai Road"/><label for="test5">Kodai Road</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Valanchettiyur"/><label for="test6">Valanchettiyur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Salaipudhur"/><label for="test9">Salaipudhur</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Nanguneri"/><label for="test10">Nanguneri</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Madurai")
            {

            var t='<p><input type="checkbox" id="test5" name="t1[]" value="Kodai Road"/><label for="test5">Kodai Road</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Valanchettiyur"/><label for="test6">Valanchettiyur</label></p>';
            document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Ramanadhapuram")
            {

            var t='<p><input type="checkbox" id="test5" name="t1[]" value="Kodai Road"/><label for="test5">Kodai Road</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Valanchettiyur"/><label for="test6">Valanchettiyur</label></p>';
            document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Thoothukudi")
            {

            var t='<p><input type="checkbox" id="test5" name="t1[]" value="Kodai Road"/><label for="test5">Kodai Road</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Valanchettiyur"/><label for="test6">Valanchettiyur</label></p><p><input type="checkbox" id="test5" name="t1[]" value="Eliyarpathi"/><label for="test5">Eliyarpathi</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Pudurpandiyapuram"/><label for="test6">Pudurpandiyapuram</label></p>';
            document.getElementById("toll_lst").innerHTML=t;
            }

            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Sivaganaga")
            {
                document.getElementById("toll_lst").innerHTML="No tolls  present in this route";
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Theni")
            {
                document.getElementById("toll_lst").innerHTML="No tolls  present in this route";
            }
             if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Tirunelveli")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Kodai Road"/><label for="test5">Kodai Road</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Valanchettiyur"/><label for="test6">Valanchettiyur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Salaipudhur"/><label for="test9">Salaipudhur</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
             if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Virudhunagar")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Kodai Road"/><label for="test5">Kodai Road</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Valanchettiyur"/><label for="test6">Valanchettiyur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p>';
             document.getElementById("toll_lst").innerHTML=t;
            }

            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Chennai")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Samayapuram"/><label for="test6">Samayapuram</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Thirumandurai"/><label for="test7">Thirumandurai</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Sengurichi"/><label for="test8">Sengurichi</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Vikravandi(Villupuram) "/><label for="test9">Vikravandi(Villupuram) </label></p><p><input type="checkbox" id="test10" name="t1[]" value="Athur (Tindivanam)"/><label for="test10">Athur (Tindivanam)</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Paranur (Chengalpet)"/><label for="test11">Paranur (Chengalpet)</label></p><p><input type="checkbox" id="test5" name="t1[]" value="Vanagaram (Chennai Bypass)"/><label for="test5">Vanagaram (Chennai Bypass)</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Cuddalore")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Samayapuram"/><label for="test6">Samayapuram</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Thirumandurai"/><label for="test7">Thirumandurai</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Sengurichi"/><label for="test8">Sengurichi</label></p>';
                 document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Kanchepuram")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Samayapuram"/><label for="test6">Samayapuram</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Thirumandurai"/><label for="test7">Thirumandurai</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Sengurichi"/><label for="test8">Sengurichi</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Vikravandi(Villupuram) "/><label for="test9">Vikravandi(Villupuram) </label></p><p><input type="checkbox" id="test10" name="t1[]" value="Athur (Tindivanam)"/><label for="test10">Athur (Tindivanam)</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Thiruvallar")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Samayapuram"/><label for="test6">Samayapuram</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Thirumandurai"/><label for="test7">Thirumandurai</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Sengurichi"/><label for="test8">Sengurichi</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Vikravandi(Villupuram) "/><label for="test9">Vikravandi(Villupuram) </label></p><p><input type="checkbox" id="test10" name="t1[]" value="Athur (Tindivanam)"/><label for="test10">Athur (Tindivanam)</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Paranur (Chengalpet)"/><label for="test11">Paranur (Chengalpet)</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Tiruvannamalai")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Samayapuram"/><label for="test6">Samayapuram</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Thirumandurai"/><label for="test7">Thirumandurai</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Vellore")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Rasampalayan"/><label for="test5">Rasampalayan</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Omallur"/><label for="test6">Omallur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Palayam (Dharmapuri)"/><label for="test7">Palayam (Dharmapuri)</label></p><p><input type="checkbox" id="test5" name="t1[]" value="Vaniyambadi"/><label for="test5">Vaniyambadi</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Pallikonda"/><label for="test6">Pallikonda</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Dindigul" && to.options[to.selectedIndex].value=="Villupuram")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Samayapuram"/><label for="test6">Samayapuram</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Thirumandurai"/><label for="test7">Thirumandurai</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Sengurichi"/><label for="test8">Sengurichi</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Ariyalur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Samayapuram"/><label for="test11">Samayapuram</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Karur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Kodai Road"/><label for="test9">Kodai Road</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10>Valanchettiyur</label></p>';
                document.getElementById("toll_lst").innerHTML=t;
            }
            if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Nagapattinam")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Ponnambalapatti"/><label for="test5">Ponnambalapatti</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Pudukottai (Vagaikulam)"/><label for="test6">Pudukottai (Vagaikulam)</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Pudurpandiyapuram"/><label for="test7">Pudurpandiyapuram</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Perambalur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Samayapuram"/><label for="test11">Samayapuram</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Puthukottai")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Lembalakudi"/><label for="test10">Lembalakudi</label></p>';
                 document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Tanjavur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Valavanthankottai"/><label for="test11">Valavanthankottai</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Thiruchirapalli")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
            if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Tiruvarur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="pudhukottai"/><label for="test6">pudukottai</label></p><p><input type="checkbox" id="test7" name="t1[]" value="pudurpandiyapuram"/></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			 if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Dharmapuri")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="KodaiRoad"/><label for="test9">KodaiRoad</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10">Valanchettiyur</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Rasampalayam"/><label for="test11">Rasampalayam</label></p><p><input type="checkbox" id="test12" name="t1[]" value="Omallur"/><label for="test12">Omallur</label></p><p><input type="checkbox" id="test13" name="t1[]" value="Palyam"/><label for="test13">Palyam</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Coimbatore")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="KodaiRoad"/><label for="test9">KodaiRoad</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10">Valanchettiyur</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Erode")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="KodaiRoad"/><label for="test9">KodaiRoad</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10">Valanchettiyur</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Krishnagiri")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="KodaiRoad"/><label for="test9">KodaiRoad</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10">Valanchettiyur</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Rasampalayam"/><label for="test11">Rasampalayam</label></p><p><input type="checkbox" id="test12" name="t1[]" value="Omallur"/><label for="test12">Omallur</label></p><p><input type="checkbox" id="test13" name="t1[]" value="Palyam"/><label for="test13">Palyam</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Namakkal")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="KodaiRoad"/><label for="test9">KodaiRoad</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10">Valanchettiyur</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Rasampalayam"/><label for="test11">Rasampalayam</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="The Nilgiris")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="KodaiRoad"/><label for="test9">KodaiRoad</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10">Valanchettiyur</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Tirupur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="KodaiRoad"/><label for="test9">KodaiRoad</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10">Valanchettiyur</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Dindigul")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="KodaiRoad"/><label for="test9">KodaiRoad</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10">Valanchettiyur</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Madurai")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Ramanadhapuram")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Pudukkottai"/><label for="test6">Pudukkottai</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Pudhurpandiyapuram"/><label for="test7">Pudhurpandiyapuram</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Sivaganaga")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Theni")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Thoothukudi")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Pudukkottai"/><label for="test6">Pudukkottai</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Tirunelveli")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Virudhunagar")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			 if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Chennai")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Samayapuram"/><label for="test11">Samayapuram</label></p><p><input type="checkbox" id="test12" name="t1[]" value="Thirumandurai"/><label for="test12">Thirumandurai</label></p><p><input type="checkbox" id="test13" name="t1[]" value="Sengurichi"/><label for="test13">Sengurichi</label></p><p><input type="checkbox" id="test14" name="t1[]" value="Vikravandi"/><label for="test14">Vikravandi</label></p><p><input type="checkbox" id="test15" name="t1[]" value="Athur"/><label for="test14">Athur</label></p><p><input type="checkbox" id="test15" name="t1[]" value="Paranur"/><label for="test15">Paranur</label></p><p><input type="checkbox" id="test16" name="t1[]" value="vanagaram"/><label for="test16">vanagaram</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Cuddalore")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Samayapuram"/><label for="test11">Samayapuram</label></p><p><input type="checkbox" id="test12" name="t1[]" value="Thirumandurai"/><label for="test12">Thirumandurai</label></p><p><input type="checkbox" id="test13" name="t1[]" value="Sengurichi"/><label for="test13">Sengurichi</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Kanchepuram")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Samayapuram"/><label for="test11">Samayapuram</label></p><p><input type="checkbox" id="test12" name="t1[]" value="Thirumandurai"/><label for="test12">Thirumandurai</label></p><p><input type="checkbox" id="test13" name="t1[]" value="Sengurichi"/><label for="test13">Sengurichi</label></p><p><input type="checkbox" id="test14" name="t1[]" value="Vikravandi"/><label for="test14">Vikravandi</label></p><p><input type="checkbox" id="test15" name="t1[]" value="Athur"/><label for="test14">Athur</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Tiruvallur")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Samayapuram"/><label for="test11">Samayapuram</label></p><p><input type="checkbox" id="test12" name="t1[]" value="Thirumandurai"/><label for="test12">Thirumandurai</label></p><p><input type="checkbox" id="test13" name="t1[]" value="Sengurichi"/><label for="test13">Sengurichi</label></p><p><input type="checkbox" id="test14" name="t1[]" value="Vikravandi"/><label for="test14">Vikravandi</label></p><p><input type="checkbox" id="test15" name="t1[]" value="Athur"/><label for="test14">Athur</label></p><p><input type="checkbox" id="test15" name="t1[]" value="Paranur"/><label for="test15">Paranur</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Tiruvannamalai")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Samayapuram"/><label for="test11">Samayapuram</label></p><p><input type="checkbox" id="test12" name="t1[]" value="Thirumandurai"/><label for="test12">Thirumandurai</label></p>';
				document.getElementById("toll_lst").innerHTML=t;            
            }
			if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Vellore")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="KodaiRoad"/><label for="test9">KodaiRoad</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Valanchettiyur"/><label for="test10">Valanchettiyur</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Rasampalayam"/><label for="test11">Rasampalayam</label></p><p><input type="checkbox" id="test12" name="t1[]" value="Omallur"/><label for="test12">Omallur</label></p><p><input type="checkbox" id="test13" name="t1[]" value="Palyam"/><label for="test13">Palyam</label></p><p><input type="checkbox" id="test14" name="t1[]" value="Vaniyambadi"/><label for="test14">Vaniyambadi</label></p><p><input type="checkbox" id="test15" name="t1[]" value="Pallikonda"/><label for="test15">Pallikonda</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
			  if(from.options[from.selectedIndex].value=="Kanyakumari" && to.options[to.selectedIndex].value=="Villupuram")
            {
                var t='<p><input type="checkbox" id="test5" name="t1[]" value="Nanguneri"/><label for="test5">Nanguneri</label></p><p><input type="checkbox" id="test6" name="t1[]" value="Salaipudhur"/><label for="test6">Salaipudhur</label></p><p><input type="checkbox" id="test7" name="t1[]" value="Etturvattam"/><label for="test7">Etturvattam</label></p><p><input type="checkbox" id="test8" name="t1[]" value="Kappalur"/><label for="test8">Kappalur</label></p><p><input type="checkbox" id="test9" name="t1[]" value="Chittampatti"/><label for="test9">Chittampatti</label></p><p><input type="checkbox" id="test10" name="t1[]" value="Boothakudi"/><label for="test10">Boothakudi</label></p><p><input type="checkbox" id="test11" name="t1[]" value="Samayapuram"/><label for="test11">Samayapuram</label></p><p><input type="checkbox" id="test12" name="t1[]" value="Thirumandurai"/><label for="test12">Thirumandurai</label></p><p><input type="checkbox" id="test13" name="t1[]" value="Sengurichi"/><label for="test13">Sengurichi</label></p>';
                document.getElementById("toll_lst").innerHTML=t;            
            }
}
</script>
<div class="input-field col s9 offset-s1 ">
<div class="input-fields col s3 offset-s3">
<p id="toll_lst">
Intermediate tolls will be displayed here
</p>
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
                        <input type="submit" class="waves-effect waves-light btn" value="Proceed "><br>
                         
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