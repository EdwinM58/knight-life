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
			}else 
			
			echo "login error, please verify your password"; /**/
			
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
					echo '<script>alert("there was an issue creating your account, try again.")</script>';
					echo "there was an issue creating your account, try again.";
				}
			}else 
			
			echo "username is taken, try a different one!";
			

		}
	}
	include("scene.html");
?>


<div class="box">
<h1>Login</h1>
<form method="get">
	<input name="type" value="login" hidden>
	<input name="username" id="lusername" required placeholder="username"><br><br>
	<input type="password" name="password" id="lpass" required placeholder="password"><br><br>
	<input class="button" type="submit">
</form>

<h1>Create Account</h1>
<form  method="get" >
	<input name="type" value="newacc" hidden>
	<input name = "username" id="cusername" placeholder="username" required><br><br>
	<input name = "email" id="email" placeholder="email" required><br><br>
	<input type="password" name="password" id="cpass" placeholder="password" required><br><br>
	<input class="button" type="submit">
</form>
</div>





<style>
	.box {
		/* width: 500px; */
		/* padding: 30px; */
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		margin-bottom: 0.01%;
		/* margin-left: -2.55%; */

		/*this aligns everything in the box*/
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		align-content: center;
		justify-content: center;

		flex: 1 0 120px;
		max-width: 220px;
	}

	/* .box #lusername:visited {
		text-decoration: none; 
		color: black;
	} */

	.box #lusername:hover, 
	.box #lpass:hover,
	.box #cusername:hover, 
	.box #cpass:hover,
	.box #email:hover {
	background: #1e1e1e;
  	box-shadow: 0 0 10px #ec0505, 0 0 40px #ff0d0d82
	}
.button{
	padding: 5px 10px;
	background-color: rgba(30, 30, 30, 0.7);
}
	.button:hover {
  color: #ffffff;
  background: #151414;
  box-shadow: 0 0 10px #ec0505, 0 0 20px #ff0d0d82;
}
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
			background-color: rgba(30, 30, 30, 0.6);
			/* background-color: #1e1e1e ; */
			color: white;

		}
</style>