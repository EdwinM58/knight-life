<?php

	include "sql.php";

?>

<a href = "index.php">back home</a> |
<?php

	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		echo "<h1>Page of ";
	}elseif($_SESSION["login"]>-1){
		$id = $_SESSION["login"];
		echo "<h1> Hello ";
	}else{
		header("location:index.php");
	}
	$name = getUserNamebyId($id);

	echo "@".$name."</h1>";


	echo "All posts belonging to @".$name; 
	$result = getPostsByUserID($id);
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($rows as $row) {
		//print_r($row);
		echo "<br>\n";
		echo '<div class="user">@'.$name."</div>\n";
		print "\t".'<div class="postContent">' .$row['postContent']."</div>\n";
		print "\t".'<div class="date">' .$row['postTime']."</div>\n";
		echo "</div>\n";
	}

?>