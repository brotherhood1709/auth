<?php
session_start();
?>
<html>
<head>
<title>User Login</title>
</head>
<body>

<?php
if(isset($_SESSION['username']))
{
	echo "Welcome:".$_SESSION['username'];
}
else
{
	header('Location:/auth/final.php');
}
?>
<h1>
Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout
</h1>
</body>
</html>