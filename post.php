<?php
	include "sql.php";
	if(isset($_REQUEST["post"])){

		if(isset($_SESSION['login'])){
			$id=$_SESSION['login'];
			$post = $_REQUEST["post"];
			$result = newPost($id,$post);
			if($result){
				header("location:userinfo.php");
			}else{
				echo "system error, post failed.";
			}
		}
	}

	header("location:index.php");

	

?>