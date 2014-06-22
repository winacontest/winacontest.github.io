

<html>
<head><title>Hello</title></head>
<body>

<?php

#include PHPMailer class and database connection
include("class.phpmailer.php");
include("db.php");

#remove slashes from content
$html = stripslashes($_POST["html"]);
$plain = stripslashes($_POST["plain"]);

?>

wowee</body>
</html>