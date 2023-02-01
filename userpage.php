<?php

	include "sql.php";
	if($_SESSION["login"]>-1){

	}elseif(isset($_REQUEST['id'])){

	}else{
		header("location:index.php");
	}
?>