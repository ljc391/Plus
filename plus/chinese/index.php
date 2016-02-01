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
            $userErr = "Your name is required!";
        } else {
            $username = $_POST["username"];
        }
        if (empty($_POST["phone"])) {
            $pErr = "Phone number is required!";
        } else {
            $phone = $_POST["phone"];
        }  
        if (empty($_POST["email"])) {
            $eErr = "Email is required!";
        } else {
            $email = $_POST["email"];
        }  
        if ((!empty($_POST["username"])) && (!empty($_POST["email"]))&& (!empty($_POST["phone"]))) {
            $query = "INSERT INTO customer VALUES ('$username','$phone','$email', NOW());";

            if (mysqli_query($mysqli, $query)) {   
                echo '<script type="text/javascript">
                confirm("We will contact you shortly."); 
                </script>';  
                $_POST["username"] = "";
             
                } else { 
                     

                $res = "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                echo '<script type="text/javascript">
                confirm("Please input another email"); 
                </script>'; 
                }
             
                $mysqli->close();
           
        }
    }
    ?>
 

    <div class ="title">
        <h1><a href = "index.php"><img src = "../plusicon.jpg" height = "100px">美國就業專業規劃公司，你的職業生涯從此開始 </a></h1>
        <p><a href="https://www.facebook.com/PLUSCareerInc/?fref=ts"><img src="../ficon.png" width = "35px" id= "icon"></a>&nbsp<a href="https://www.linkedin.com/company/9299443?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A9299443%2Cidx%3A1-1-1%2CtarId%3A1448896272608%2Ctas%3ACOED%20group"><img src="../linkicon.png" width = "35px" id= "icon"></a>&nbsp<a href="../wechet.html" target="_blank" width= "400px"><img src="../wechaticon.jpeg" width = "35px" id= "icon"></a></p>
        <p><a href="../english/index.php" id ="lan">English</a>|<a href="index.php" id ="lan">繁體中文</a>|<a href="../index.php" id ="lan">简体中文</a>|<a href="login.php" id ="lan">Login</a> </p>
    </div>
    <div class = "nav">
        <ul class="navigation" align = "center">
            <li><a href="index.php">首頁</a></li>
            <li>
                <a  >關於我們</a>
                <ul>
                    <li><a href="company.html">關於公司</a></li>
                    <li><a href="history.html">公司發展</a></li>
                </ul>
            </li>
            <li><a href="services.html">服務項目</a>
                <ul>
                    <li><a href="intern.html">實習</a></li>
                    <li><a href="travel.html">遊學打工</a></li>
                    <li><a href="fulltime.html">全職就業</a></li>
                    <li><a href="mba.html">MBA就業</a></li>
                </ul>


            </li> 
            <li><a >學生專區</a>
                <ul>
                    <li><a href="opportunities.html">就業機會</a></li>
                    <li><a href="apply.html">如何申請</a></li>
                </ul>
            </li>
            <li><a>合作夥伴</a>
                <ul>
                    <li><a href="partnerships.html">企業專區</a></li>
                    <li><a href="colleges.html">大專院校專區</a></li>
                </ul>
            </li> 
             <li><a href="vedio.html">相簿</a></li> 
            <li><a href="contact.html">聯繫我們</a></li> 
        </ul>
    </div>
 
    <div class="slider2">

      <div class="slide active-slide" id = "s1">
        <div class="container">
          <div class="row">
            <div class="slide-copy " >
             
               
               
            </div> 
          </div>

        </div>     
      </div>

      <div class="slide" id = "s2">
        <div class="container">
          <div class="row">
            <div class="col-xs-5"> 
                <h1> </h1>
              <p> </p>

            </div>
            
          </div>
        </div>      
      </div> 

      <div class="slide" id = "s3">
        <div class="container">
          <div class="row">
            <div class="col-xs-5"> 
                <h1> </h1>
              <p> </p>

            </div>
            
          </div>
        </div>      
      </div> 


      <div class="slide" id = "s4">
        <div class="container">
          <div class="row">
            <div class="col-xs-5"> 
                <h1> </h1>
              <p> </p>

            </div>
            
          </div>
        </div>      
      </div>

    </div>  
       <div class ="applyform" id = "af2">
         <div class = "container"> 
             
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal" role="form">
                        
                        <p>聯絡我們 姓名:<input type="text"  class="form-control" name="username"  value="">
                             
                            電話:<input type="text"  class="form-control" name="phone"  value="">
                           
                            Email:<input id = "em" type="text"  class="form-control" name="email"  value=""> 
                            <button type="submit" class="btn btn-default">送出</button></p>
                          </br>
                            <span class="error"><?php echo $userErr;?></span><span class="error"><?php echo $pErr;?></span><span class="error"><?php echo $eErr;?></span>
                            
                         
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