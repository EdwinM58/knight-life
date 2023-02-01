<?php

	include "sql.php";
	if($_SESSION["login"]>-1){
		$id = $_SESSION["login"];
	}elseif(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
	}else{
		header("location:index.php");
	}
	$name = getUserNamebyId($id);
	echo "<h1>hello @".$name."</h1>";


	echo "All posts belonging to @".$name; 
	$result = getPostsByUserID($id);
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($rows as $row) {
		//print_r($row);
		echo "<br>";
		echo '<div class="user">@'.$name.'</div>';
		print '<div class="postContent">' .$row['postContent'].'</div>';
		print '<div class="date">' .$row['postTime'].'</div>';
		echo '</div>';
	}

?>