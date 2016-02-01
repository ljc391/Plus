<?php
$mysqli = new mysqli("localhost", "root", "root", "PlusCareer");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
session_start();
?>
<!DOCTYPE html>
<html>

  <head>
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>PLUSCareer</title>
    <script type="text/javascript">
        $(function(){
            $("ul.navigation > li:has(ul) > a").append('<div class="arrow-bottom"></div>');
            $("ul.navigation > li ul li:has(ul) > a").append('<div class="arrow-right"></div>');
     
        }); 

    </script>
    <script>
        function myFunctiont() {   
        document.getElementById('showpic').style.visibility = "hidden"; 
            }
        function myFunctiontv() {   
        document.getElementById('showved').style.visibility = "hidden"; 
        document.getElementById('bved').src = "http://www.youtube.com/embed/XGSy3_Czz8k";
            }
        function myFunction(loc) {   
             document.getElementById('showpic').style.visibility = "visible";
            document.getElementById('bimg').src = loc;  
            }
        function myFunctionv(loc) {   
             document.getElementById('showved').style.visibility = "visible";
             document.getElementById('bved').src = loc;  

            }
         function myFunctionx() { 
             document.getElementById("af").style.display = "none"; 
             document.getElementById("af2").style.display = "none"; 
        }
    </script>
 <body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0" oncoNtextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="document.selection.empty()" oncopy="document.selection.empty()" onbeforecopy="return false" onmouseup="document.selection.empty()">
  </head>

  <body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $aErr =  "Username is required!";
        } else {
            $user = $_POST["username"];
        }
        if (empty($_POST["email"])) {
            $aErr .= "Email is required!";
        } else {
            $email = $_POST["email"];
        } 
        if (empty($_POST["phone"])) {
            $aErr .= "Phone is required!";
        } else {
            $phone = $_POST["phone"];
        } 
        $status = $_POST["status"];
        $edu = $_POST["edu"];
        $school = $_POST["school"];
        $graddate = $_POST["graddate"];
        $major = $_POST["major"];
        $tint = "";
        for ($i=0; $i < sizeof($_POST["tint"]); $i++) { 
            $tint = $tint.' '.$_POST["tint"][$i]; 
        }
        $fint = "";
        for ($i=0; $i < sizeof($_POST["fint"]); $i++) { 
            $fint = $fint.' '.$_POST["fint"][$i]; 
        }

        if ((!empty($_POST["username"])) && (!empty($_POST["email"]))&& (!empty($_POST["phone"]))) {
           $sql = "INSERT INTO apply (name, email, phone, status, tint, fint,inputdate, edu, school, graddate, major) VALUES ('$user', '$email','$phone', '$status','$tint','$fint', NOW(), '$edu', '$school', '$graddate', '$major')";

    if (mysqli_query($mysqli, $sql)) {  
      echo '<script type="text/javascript">
          confirm("We will contact you shortly."); 
        </script>';  
      echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
       
    } else { 
      echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
       
    }  
        }
    }
    ?>
 

   <div class ="title">
        <h1><a href = "index.php"><img src = "../plusicon.jpg" height = "100px">Professional Career Development </a></h1>
        <p><a href="https://www.facebook.com/PLUSCareerInc/?fref=ts"><img src="../ficon.png" width = "35px" id= "icon"></a>&nbsp<a href="https://www.linkedin.com/company/9299443?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A9299443%2Cidx%3A1-1-1%2CtarId%3A1448896272608%2Ctas%3ACOED%20group"><img src="../linkicon.png" width = "35px" id= "icon"></a>&nbsp<a href="../wechet.html" target="_blank" width= "400px"><img src="../wechaticon.jpeg" width = "35px" id= "icon"></a></p>
        <p><a href="index.php" id ="lan">English</a>|<a href="../chinese/index.php" id ="lan">繁體中文</a>|<a href="../index.php" id ="lan">简体中文</a>|<a href="login.php" id ="lan">Login</a> </p>
    </div>
    <div class = "nav">
        <ul class="navigation" align = "center">
            <li><a href="index.php">Home</a></li>
            <li>
                <a  >About Us</a>
                <ul>
                    <li><a href="company.html">Company</a></li>
                    <li><a href="history.html">History</a></li>
                </ul>
            </li>
            <li><a href="services.html">Service</a>
                <ul>
                    <li><a href="intern.html">Intership</a></li>
                    <li><a href="travel.html">Work & Travel</a></li>
                    <li><a href="fulltime.html">Full-Time</a></li>
                    <li><a href="mba.html">MBA Career</a></li>
                </ul>


            </li> 
            <li><a >Students</a>
                <ul>
                    <li><a href="opportunities.html">Opportunities</a></li>
                    <li><a href="apply.html">How to Apply</a></li>
                </ul>
            </li>
            <li><a>Partnerships</a>
                <ul>
                    <li><a href="partnerships.html">Corporations/</br>Employers</a></li>
                    <li><a href="colleges.html">Colleges/</br>Universities</a></li>
                </ul>
            </li> 
             <li><a href="vedio.html">Gallery</a></li> 
            <li><a href="contact.html">Contact Us</a></li> 
        </ul>
    </div>
 
  
       <div class ="applyonline"  >
         <div class = "container"> 
             
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal" role="form" align = "center">
                          
              <h2>PLUS Career Clients Background Survey</h2>
              <table align = "center" id = "t1">
              <tr>
              <td>Name</td> 
              <td><input type="text" class="form-control" name="username" placeholder="" value="<?php echo $username; ?>">
              </td> 
              </tr>
              <tr> 
              <td>Email</td>
              <td><input type="text" class="form-control" name="email" placeholder="" value="<?php echo $email; ?>">
              </td> 
              </tr>
              <tr> 
              <td>Phone</td>
              <td><input type="text" class="form-control" name="phone" placeholder=" " value="<?php echo $phone; ?>">
              </td> 
              </tr> 
              <tr> 
                <td>Height Education</td><td><input type="text" class="form-control" name="edu"  value=" "></td> 
                </tr>
                <tr> 
                <td>School</td><td><input type="text" class="form-control" name="school"   value=" "></td> 
                </tr>
                <tr> 
                <td>Graduation Date</td><td><input type="text" class="form-control" name="graddate"   value=" "></td> 
                </tr>
                <tr> 
                <td>Major</td><td><input type="text" class="form-control" name="major"   value=" "></td> 
                </tr>
                <tr> 
              <tr> 
              <td>Current Status</td>
              <td><table id = "t2">
                <tr><td><input type="radio" name="status" value="Freshman/Sophomore/Junior" id = "cb"></td><td>Freshman/Sophomore/Junior</td> 
              </tr>
              <tr> 
              <td ><input type="radio" name="status" value="Senior" id = "cb"></td><td>Senior</td> 
              </tr>
              <tr> 
              <td ><input type="radio" name="status" value="Graduate" id = "cb"></td><td>Graduate</td> 
              </tr>
              <tr> 
              <td><input type="radio" name="status" value="Recent Graduate/OPT" id = "cb"></td><td>Recent Graduate/OPT</td> 
              </tr></table></td> </tr>
              <td>Types of jobs that you are interested in</td>
              <td><table id = "t2">
                <tr><td><input type="checkbox" name="tint[]" value="Internship" id = "cb"></td><td>Internship</td> 
              </tr>
              <tr> 
              <td><input type="checkbox" name="tint[]" value="Part time" id = "cb"></td><td>Part time</td> 
              </tr>
              <tr> 
              <td><input type="checkbox" name="tint[]" value="Full time" id = "cb"></td><td>Full time</td> 
              </tr></table></td> </tr>
              </tr>
              <td>Fields of jobs that you are interested in</td>
              <td><table id = "t2">
                <tr><td><input type="checkbox" name="fint[]" value="Finance/Accounting/Risk" id = "cb"></td><td>Finance/Accounting/Risk</td> 
              </tr>
              <tr> 
              <td><input type="checkbox" name="fint[]" value="Marketing/Advertising" id = "cb"></td><td> Marketing/Advertising</td> 
              </tr>
              <tr> 
              <td><input type="checkbox" name="fint[]" value="Data Analyst/IT/Technology" id = "cb"></td><td>Data Analyst/IT/Technology</td> 
              </tr>
              <tr> 
              <td><input type="checkbox" name="fint[]" value="Supply Chain/Operation Management" id = "cb"></td><td>Supply Chain/Operation Management</td> 
              </tr>
              <tr> 
              <td><input type="checkbox" name="fint[]" value="Art/Design" id = "cb"></td><td>Art/Design</td> 
              </tr>
              <tr> 
              <td><input type="checkbox" name="fint[]" value="Others" id = "cb"></td><td>Others</td> 
              </tr></table></td> </tr>
 
              <tr><td></td><td><button type="submit" class="btn btn-default" >SUBMIT</button></td></tr>
              <span class="error"><?php echo $aErr;?></span>
        </table>
                         
           </form> 
          
      
    </div> 
  </div> 
    <div class = "footer">
    <div class="container"> 
    <p>&copy; 2015 PlusCareer. All rights reserved.</p>
  </div> 
  </div>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script src="index.js"></script><!-- Resource jQuery -->

  </body>
</html>