<?php

	include "sql.php";


	if(isset($_REQUEST["type"])){
		$type = $_REQUEST["type"];
		if($type=="login"){
			$username = $_REQUEST["username"];
			$password = $_REQUEST["password"];
			$result = userExist($username, $password);
			if(mysqli_num_rows($result)==1){
				$row = mysqli_fetch_assoc($result);
				$_SESSION['login']=$row["userID"];
				header("location:userpage.php");
			}else echo "login error, please verify your password";/**/
			
			echo "new user :o";
		}elseif($type=="newacc"){
			$username = $_REQUEST["username"];
			$password = $_REQUEST["password"];
			$email = $_REQUEST["email"];
			if(checkUsernameExist($username)==0){
				$result = newUser($username, $password, $email);
				if($result==1){
					$result = userExist($username, $password);

					$row = mysqli_fetch_assoc($result);
					$_SESSION['login']=$row["userID"];
					header("location:userpage.php");
				}else{
					echo "there was an issue creating your account, try again.";
				}
			}else echo "username is taken, try a different one!";
			

		}
	}
	
?>

<h1>Login</h1>
<form method="get">
	<input name="type" value="login" hidden>
	username:<input name="username" required><br>
	password:<input type="password" name="password" required><br>
	<input type="submit">
</form>

<h1>Create Account</h1>
<form method="get">
	<input name="type" value="newacc" hidden>
	username:<input name = "username" required><br>
	email:<input name = "email" required><br>
	password:<input type="password" name="password" required><br>
	<input type="submit">
</form>