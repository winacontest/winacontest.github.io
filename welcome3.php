<html>
<head>
<title> Welcome Page </title>
</head>

<body>

<?php
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];

if ($firstname == 'Rach' && $lastname == 'gold')
{
	$count = 1;
while ($count <= 10) {
	
	echo "$count. How are you today, $firstname? <br />";

++$count;
}
	
	
} 
else
{
echo "Welcome to my Website, $firstname $lastname!";
}



if (mail ( 'i.am.golden@gmail.com'  , 'test e-mail'  , 'I am sening this to you ' . $firstname . ' ' . $lastname  ))
{ echo "Mail has been sent";
}
else
{
	echo "Mail has not been sent";
}
?>


</body>
</html>