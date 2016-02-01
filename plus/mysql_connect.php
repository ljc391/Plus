<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$mysqli = new mysqli("localhost","root", "root", "PlusCareer");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?> 

 