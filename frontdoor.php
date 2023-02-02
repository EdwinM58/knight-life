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
			
			//echo "new user :o";
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
	<input name="username" required placeholder="username"><br><br>
	<input type="password" name="password" required placeholder="password"><br><br>
	<input type="submit">
</form>

<h1>Create Account</h1>
<form method="get">
	<input name="type" value="newacc" hidden>
	<input name = "username" placeholder="username" required><br><br>
	<input name = "email" placeholder="email" required><br><br>
	<input type="password" name="password" placeholder="password" required><br><br>
	<input type="submit">
</form>

<style>
	html{
			background-color:#1e1e1e;
			color:white;
			@font-face {
				font-family: "ITC Giovanni";
				src: url("//db.onlinewebfonts.com/t/0d568bbc9833f436d4f82654a8bfd823.eot");
			}
		}

		input{
			font-size:20;
			text-align:left;
			text-align:center;
			background-color:#1e1e1e;
			color: white;
		}
</style>