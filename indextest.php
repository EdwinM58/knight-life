<?php

	include "sql.php";
	
	//INSERT INTO `posts` (`postID`, `userID`, `postContent`, `postTime`, `likes`, `replyID`) VALUES (NULL, '1', 'Aaa it\'s me joe biden i want coconut oil', CURRENT_TIMESTAMP, '200', '-1');

?>


<head>
	<meta charset="utf-8" />
	<style>
		.post{
			background-color: pink;
			display: block;
			margin-bottom: 1em;
			width: 20em;
			max-height: 30em;
		}
		.user{
			text-decoration: underline;
		}
		.date{
			color: red;
			opacity: 0.4;
		}
		.date:hover{
			opacity: 1;
		}

		/*.post{
			border-style: soild;
			display: block;
			border-width: 1px;
			border-color: black;

			background-color: pink;
			margin-bottom: 1em;
		}*/
	</style>
</head>
<body>
knight life 




<?php
if($_SESSION["login"]>-1)echo '<a href="byebye.php">logout</a>';
else echo '<a href="frontdoor.php">login/create account</a>';
?>

<hr>





<?php



if($_SESSION["login"]>-1){

	echo '<form action="post.php" method="get"><input name="post" type="text"><br>
<input type="submit" value="post"></form>';
}else echo "you must login to post <br>";



	$result = getPosts();
	//print_r($result);
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($rows as $row) {



		echo '<div class = "post">';
		
		$name = getUserNamebyId($row['userID']);
		/*print "username:".$name."<br>";
		print "post:".$row['postContent']."<br>";
		print "date:".$row['postTime']."<br>";
		print "likes:".$row['likes']."<br>";*/
		echo '<div class="user"><a href="userpage.php?id='.$row['userID'].'">@'.$name.'</a></div>';
		print '<div class="postContent">' .$row['postContent'].'</div>';
		print '<div>100 Likes.</div>';
		print '<div>(view thread) (reply)</div>';
		print '<div class="date">' .$row['postTime'].'</div>';
		echo '</div>';
		/*
		
		
		
	
			*/

	}
?>

<div class = "post">
	<table>
		<tr>
			<td style="background-color:#000;color:white;">100</td>
			<td>
				

	<div class="user">@lazyBean</div>
	<div class="postContent">abababab</div>
	<div class="date">1:59 PM 2/1/2023</div>

			</td>	
		</tr>
	</table>
</div>
</body>