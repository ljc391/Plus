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
 
  </head>

  <body>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $userErr = "Username is required!";
        } else {
            $user = $_POST["username"];
        }
        if (empty($_POST["password"])) {
            $pwdErr = "Password is required!";
        } else {
            $pwd = $_POST["password"];
        } 
        if ((!empty($_POST["username"])) && (!empty($_POST["password"]))) {
            if ($stmt = $mysqli->prepare("SELECT u_pwd FROM user WHERE u_id = ?")) {
                $stmt->bind_param("s", $user);
                $stmt->execute();
                $stmt->bind_result($u_pwd);
                $stmt->fetch();
                $stmt->close();
                //echo $count;
                if (!$u_pwd) {
                    $userErr = "User ID does not exist!";
                } else if ($u_pwd !== $pwd) {
                    $pwdErr = "Password is wrong!";       
                } else {
                    $_SESSION['user_id'] = $user;
                    
                     
                    mysqli_query ($mysqli, $query);
                    echo "<meta http-equiv=\"refresh\" content=\"0;url=../user_homepage.php\">";
                }

                
                $mysqli->close();
            }
        }
    }
    ?>
<div class ="title">
        <h1><a href = "index.php"><img src = "../plusicon.jpg" height = "100px">Professional Career Development </a></h1>
        <p><a href="https://www.facebook.com/PLUSCareerInc/?fref=ts"><img src="../ficon.png" width = "35px" id= "icon"></a>&nbsp<a href="https://www.linkedin.com/company/9299443?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A9299443%2Cidx%3A1-1-1%2CtarId%3A1448896272608%2Ctas%3ACOED%20group"><img src="../linkicon.png" width = "35px" id= "icon"></a>&nbsp<a href="../wechet.html" target="_blank" width= "400px"><img src="../wechaticon.jpeg" width = "35px" id= "icon"></a></p>
        <p><a href="index.php" id ="lan">English</a>|<a href="../chinese/index.php" id ="lan">繁體中文</a>|<a href="../index.php" id ="lan">简体中文</a>|<a href="login.php" id ="lan">Login</a> </p>
    </div>
  
<div class = "line"></div>


  <div class = "ulogin">
    <h1 align= "center">LOGIN</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal" role="form">
                  <br><br>
            <table align = "center">
          <tr> 
          <td><input type="text" class="form-control" name="username" placeholder="USERID" value="<?php echo $username; ?>">
                    <span class="error"><?php echo $userErr;?></span></td> 
          </tr>
        
          <tr> 
          <td><input type="password" class="form-control" name="password" placeholder="PASSWORD" value="<?php echo $password; ?>">
                    <span class="error"><?php echo $pwdErr;?></span></td> 
                <tr><td><button type="submit" class="btn btn-default">SIGN IN</button></td></tr>
                 
        </table>      

           
          <br><br>
        </form>


  </div>

  </body>
</html>