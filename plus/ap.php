 
 
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
        echo '    <li><a href="user_homepage.php">首页</a></li> ';
        echo '    <li><a href="customer.php">customer</a></li> ';
        echo '    <li><a href="ap.php">apply</a></li>';
        echo '</ul>';
    echo '</div> ';
 
        echo ' <div class = "upage">';
        echo ' <h1>Apply Online</h1>';
            echo ' <div class = "container"> ';

              
                    $query1 = "SELECT * FROM apply ORDER BY inputdate DESC";
                    if ($stmt = $mysqli->prepare($query1)) {
                        $stmt->execute();
                        $stmt->bind_result($name,$email,$phone,$status,$tint,$fint,$inputdate,$edu,$school,$graddate,$major);
                        echo "<table class=\"table  table-hover table-bordered table-condensed\">\n";
                        echo "<tr class=\"success\"align = 'center'><td>Name</td><td>Phone</td><td>Email</td><td>Height Education</td><td>School</td><td>Graduation Date</td><td>Major</td><td>Current Status</td><td>Types of jobs</td><td>Fields of jobs</td><td>Date</td></tr>";
                        while ($stmt->fetch()) { 
                            echo "<tr align = 'center'>";
                            echo "<td>$name</td><td>$phone</td><td>$email</td><td>$edu</td><td>$school</td><td>$graddate</td><td>$major</td><td>$status</td><td>$tint</td><td>$fint</td><td>$inputdate</td>";
                            echo "</tr>\n";
                        }
                        echo "</table>\n";
                        $stmt->close();
                        $mysqli->close();
                    }else{
                        echo "false";

                    }
                     

                    echo ' </div>';
   echo '  </div>';


    }else{ 
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';

}
?>

<!DOCTYPE html>
<html>
<head> 
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
 
 
</body>

</html>