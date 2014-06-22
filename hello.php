<html>
<body>

<?php
echo "Hello World";

//This is a comment

/*
This is
a comment
block
*/

$txt = "Hello World!"; // A String Variable
$text = "How are you?";
$number = 16; // a Number variable

echo $number;

echo $txt . " " . $text;

echo strlen($txt);

echo strpos($txt, "world"); //Finds the position of the first letter of the match

$d=date("D");

echo $d;

if ($d=="Fri")
  echo "Have a nice weekend!"; 
else
  echo "Have a nice day!"; 

?>

</body>
</html>