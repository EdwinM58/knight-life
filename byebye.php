<?php
	include "sql.php";
	session_destroy();
	header("location:index.php");
?>