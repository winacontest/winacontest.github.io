<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Multipurpose Page Outline</title>
<meta http-equiv="content-type"
content="text/html; charset=iso-8859-1" />
</head>

<body>

<?php if (!isset($_GET['name'])) { ?>
<!-- HTML content to display if condition is true -->

<!-- No name has been provided, so we
prompt the user for one. -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<label>Please enter your name:
<input type="text" name="name" /></label>
<input type="submit" value="GO" />
</form>

<?php } else { ?>
<!-- HTML content to display if condition is false -->

<p>Your name: <?php echo $_GET['name']; ?></p>
<p>This paragraph contains a
<a href="hmm.php?name=<?php echo urlencode($_GET['name']);
?>">link</a> that passes the name variable on to the next
document.</p>


<?php } ?>
</body>

</html>