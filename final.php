<?php
session_start();
?>
<html>
<body>
<br>
<center><h1> Welcome to Login Page </h1></center>
<br>
<form name="form1" method="post"action="<?=$_SERVER["PHP_SELF"]; ?>">
<label>Username :</label>
<input type="text" Name="username">
<br>
<label>Password :</label>
<input type="password" Name="password">
<br>
<br>
<input type="submit" value="Login" name="submit">
<br>
<a href="register.php">Register</a>
</FORM>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
        $username = $_POST["username"];
        $password = $_POST["password"];

  $conn =  new MongoDB\Driver\Manager('mongodb://localhost:27017');
if($conn)    
 {    
   
    $filter = [];
    $option = [];

$read = new MongoDB\Driver\Query($filter, $option);

$all_users = $conn->executeQuery("emp.e1", $read);
    
   $doc=array("username"=>$username,"password"=>$password);
		     
	  $user = $doc->find(array('username'=> $username, 'password'=> $password));
	foreach ($user as $obj) 
	  {
            $user= $obj['username'];
            $pass= $obj['password'];
		}
            if($username == $user && $password == $pass)
			{
           
				$_SESSION['username']=$user;
				header('Location:/auth/page2.php');           
            }
            else
			{
                echo 'not found'   ;         
            } 
	}
} 
?>