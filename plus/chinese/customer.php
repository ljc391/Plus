<?php
$mysqli = new mysqli("localhost", "root", "root", "PlusCareer");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
session_start();
 
$user = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head> 
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0" oncoNtextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="document.selection.empty()" oncopy="document.selection.empty()" onbeforecopy="return false" onmouseup="document.selection.empty()">
</head>

<body>
	<div class ="title">
        <h1><a href = "index.php"><img src = "plusicon.jpg" height = "100px">美国就业专业规划公司，你的职业生涯从此开始 </a></h1>
        <p><a href="https://www.facebook.com/PLUSCareerInc/?fref=ts"><img src="ficon.png" width = "35px" id= "icon"></a>&nbsp<a href="https://www.linkedin.com/company/9299443?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A9299443%2Cidx%3A1-1-1%2CtarId%3A1448896272608%2Ctas%3ACOED%20group"><img src="linkicon.png" width = "35px" id= "icon"></a>&nbsp<a href=""><img src="wechaticon.jpeg" width = "35px" id= "icon"></a></p>
        <p><a href="" id ="lan">English</a>|<a href="" id ="lan">繁體中文</a>|<a href="" id ="lan">简体中文</a>|<a href="index.php" id ="lan">Logout</a> </p>
    </div>
    <div class = "nav">
        <ul class="navigation" align = "center">
            <li><a href="user_homepage.php">首页</a></li> 
            <li><a href="customer.php">customer</a></li> 
            <li><a href="ap.php">apply</a></li>
        </ul>
    </div> 
 
 

	<div class = "upage">
		<h1>Customer Information</h1>
			<div class = "container"> 

             <?php
                    $query1 = "SELECT * FROM customer ORDER BY inputdate DESC";
                    if ($stmt = $mysqli->prepare($query1)) {
                        $stmt->execute();
                        $stmt->bind_result($uname,$phone,$email,$inputdate);
                        echo "<table class=\"table table-striped table-bordered\">\n";
                        echo "<tr align = 'center'><td>Name</td><td>Phone</td><td>Email</td><td>Date</td></tr>";
                        while ($stmt->fetch()) { 
                            echo "<tr align = 'center'>";
                            echo "<td>$uname</td><td>$phone</td><td>$email</td><td>$inputdate</td>";
                            echo "</tr>\n";
                        }
                        echo "</table>\n";
                        $stmt->close();
                        $mysqli->close();
                    }else{
                    	echo "false";

                    }
                    ?> 

                    </div>
	</div>
</body>

</html>