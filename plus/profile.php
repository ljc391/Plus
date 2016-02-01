 
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php"); 
session_start();
 
$user = $_SESSION['user_id'];
    if($user != null){
         echo '<div class ="title">';
         echo '<h1><a href = "index.php"><img src = "plusicon.jpg" height = "100px">美国就业专业规划公司，你的职业生涯从此开始 </a></h1>';
         echo '<p><a href="https://www.facebook.com/PLUSCareerInc/?fref=ts"><img src="ficon.png" width = "35px" id= "icon"></a>&nbsp<a href="https://www.linkedin.com/company/9299443?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A9299443%2Cidx%3A1-1-1%2CtarId%3A1448896272608%2Ctas%3ACOED%20group"><img src="linkicon.png" width = "35px" id= "icon"></a>&nbsp<a href="wechet.html" target="_blank" width= "400px"><img src="wechaticon.jpeg" width = "35px" id= "icon"></a></p>';
         echo '<p><a href="english/index.php" id ="lan">English</a>|<a href="chinese/index.php" id ="lan">繁體中文</a>|<a href="index.php" id ="lan">简体中文</a>|<a href="logout.php" id ="lan">LogOut</a> </p>';
         echo '</div>';
         echo "</br>";
         echo '<div class = "nav">';
         echo '<ul class="navigation" align = "center">';
        echo '    <li><a href="user_homepage.php">Homepage</a></li> ';
        echo '    <li><a href="customer.php">Customer</a></li> ';
        echo '    <li><a href="ap.php">Apply</a></li>';
        echo '    <li><a href="profile.php">Profile</a></li>';
        echo '</ul>';
    echo '</div> ';
 

    echo '
 <div class = "upage"> ';
      echo '  <h1>Profile</h1>';  

    echo '</div> ';
     echo '<form action="';  echo htmlspecialchars($_SERVER["PHP_SELF"]); echo ' " method="post" class="form-horizontal" role="form">';  
       echo '              <br><br>';  
       echo '      <table align = "center">';  
        echo '         <tr> ';  
        echo '         <td width = "500px"><input type="text" class="form-control" name="u_text"   value=" ">';  
         echo '            <span class="error"><?php echo $utErr;?></span></td> ';  
           echo '      <td><button type="submit" class="btn btn-default">POST</button></td>';  
           echo '      </tr> ';  
               
           echo '      </table> ';  
 


           
         echo '    <br><br>';  
    echo ' </form>';  


        $query = "SELECT u_id, u_text,t_date FROM context  ORDER BY t_date DESC";
        if ($stmt = $mysqli->prepare($query)) { 
            $stmt->execute();
            $stmt->bind_result($user, $utext, $udate);
            $NowTime=$udate;
            if (!$stmt->fetch()) {
                echo "<p>no recently posts</p>";
            } else {
                echo '<div class="panel-group ">';
                echo '<div class="panel panel-primary  " style="width: 600px;" >';
                echo '<div class="panel-heading"><p class="text-left">';
                echo "$user";
                echo'</p> <span class="pull-right">';
                echo "$udate";
                echo '</span></div>';

                echo '<div class="panel-body">';
                echo "$utext";
                echo "</div>";
                echo '</div> ';
  
                
                while ($stmt->fetch()) { 
                    echo "</br>";
                    echo '<div class="panel-group ">';
                echo '<div class="panel panel-primary  " style="width: 600px;" >';
                echo '<div class="panel-heading"><p class="text-left">';
                echo "$user";
                echo'</p> <span class="pull-right">';
                echo "$udate";
                echo '</span></div>';

                echo '<div class="panel-body">';
                echo "$utext";
                echo "</div>";
                echo '</div> ';
                } 
                echo '</div> ';
            } 
              
            $stmt->close();

            //$mysqli->close();
        }
      




    }else{         echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';

}



?>

<!DOCTYPE html>
<html>
<head> 
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
    <body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0" oncoNtextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="document.selection.empty()" oncopy="document.selection.empty()" onbeforecopy="return false" onmouseup="document.selection.empty()">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["u_text"])) {
            $utErr = "Message is required!";
        } else {
            $u_text = $_POST["u_text"];
        }
        



        if (!empty($_POST["u_text"])) { 
            $query = "INSERT INTO context VALUES ('$user','$u_text', NOW());";
            if (mysqli_query($mysqli, $query)) {   
                 echo "<meta http-equiv=\"refresh\" content=\"0;url=user_homepage.php\">";
                } else { 
                     

                $res = "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                echo $res; 
                }
              
        }


    }
       $mysqli->close();
    ?>

  
         
     
    </div>
    <div>

    </div>

     
</body>

</html>