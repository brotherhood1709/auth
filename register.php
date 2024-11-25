<?php

require_once __DIR__ . '/vendor/autoload.php';

if(isset($_POST['submit']))
{
$username=$_POST['username']; 
$password=$_POST['password'];

$m = new MongoDB\Driver\Manager('mongodb://localhost:27017');
  
$command= new MongoDB\Driver\Command(["create" => 'e1']);
 $cursor =$m->executeCommand("emp",$command);
echo "<br> database mydb is selected";
	$bulk = new MongoDB\Driver\BulkWrite;
	
    
   $doc=array("username"=>$username,"password"=>$password);
        
$bulk->insert($doc);

$result = $m->executeBulkWrite('emp.e1', $bulk);
   
 

echo "Insert Successfully";
header('Location:/auth/final.php');

}
?>
<html>
<body>
<br>
<center><h1> Registration form </h1></center>
<br>
<form action="" method="post">
<label>Username :</label>
<input type="text" Name="username">
<br>
<label>Password :</label>
<input type="password" Name="password">
<br>
<br>
<input type="submit" value="Register" name="submit">
<br>
</form>
</body>
</html>

