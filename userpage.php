<?php

	include "sql.php";

?>

<a href = "index.php">back home</a> |
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
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
		//echo "<br>\n";
		//echo '<div class="user">@'.$name."</div>\n";
		//print "\t".'<div class="postContent">' .$row['postContent']."</div>\n";
		//print "\t".'<div class="date">' .$row['postTime']."</div>\n";
		//echo "</div>\n";

		print '<div class="posts">';
		print '<div class="post__body">';
		print '<div class="post__header">';
		echo '<div class="post__user"><a href="userpage.php?id='.$row['userID'].'">@'.$name.'</a></div>';
		print '<div class="post__content">' .$row['postContent'].'</div>';
		print '<div class="postTime">' .$row['postTime'].'</div>';
		print '<div class="post__Footer">
					<button class="material-symbols-outlined"> &#xE87D;  
					</button>
					'.$row['likes'].'
				</div>';
		print '<div class="post__line"></div>';
	}

?>

<style>
	html{
			background-color:#1e1e1e;
			color:white;
			@font-face {
				font-family: "ITC Giovanni";
				src: url("//db.onlinewebfonts.com/t/0d568bbc9833f436d4f82654a8bfd823.eot");
			}
		}
	
	a { color: white }
	a:visited { text-decoration: none; color: white; }
	a:hover { text-decoration: none; color:blue; }
	a:focus { text-decoration: none; color:yellow; }
	a:hover, a:active { text-decoration: none; color:red }


	.posts{
			color:white;
    		display: flex;
    		align-items: flex-start;
    		padding-bottom: 10px;
		}
		
	.post__body{
   			width: 450px;
   			object-fit: contain;
   			border-radius: 20px;
		}

		.post__Footer{
			display: flex;
   			margin-top: 10px;
			margin-bottom: 10px;
		}

		.post__user{
			font-weight: bold;
   			font-size: 16px;
    		margin-bottom: 5px;
		}

		.post__content{
			text-indent: 30px;
			margin-top: 10px;
   		 	margin-bottom: 10px;
   		 	font-size: 16px;
		}

		.postTime{
			font-size: 12px;
		}
		
	.post__line{
			margin-top:10px;
			margin-bottom:10px;
			border-bottom: 1px solid black;
		}	
</style>
