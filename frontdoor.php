<?php

	include "sql.php";


	if(isset($_REQUEST["type"])){
		$type = $_REQUEST["type"];
		if($type="login"){
			$username = $_REQUEST["username"];
			$password = $_REQUEST["password"];
			$result = userExist($username, $password);
			if(mysqli_num_rows($result)==1){
				$row = mysqli_fetch_assoc($result);
				$_SESSION['login']=$row["userID"];
				header("location:userpage.php");
			}else echo "login error, please verify your password";
			

		}
	}
	
?>

<h1>Login</h1>
<form method="get">
	<input name="type" value="login" hidden>
	username:<input name="username"><br>
	password:<input type="password" name="password"><br>
	<input type="submit">
</form>

<h1>Create Account</h1>
<form action="newacc.php" method="get">
	username:<input><br>
	email:<input><br>
	password:<input>
	<input type="submit">
</form>