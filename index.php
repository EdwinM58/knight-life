<?php

	include "sql.php";
	
	//INSERT INTO `posts` (`postID`, `userID`, `postContent`, `postTime`, `likes`, `replyID`) VALUES (NULL, '1', 'Aaa it\'s me joe biden i want coconut oil', CURRENT_TIMESTAMP, '200', '-1');

?>


<head>


	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KnightLife</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
	<link href="//db.onlinewebfonts.com/c/0d568bbc9833f436d4f82654a8bfd823?family=ITC+Giovanni" rel="stylesheet" type="text/css"/>


	<style>

		@import url(//db.onlinewebfonts.com/c/0d568bbc9833f436d4f82654a8bfd823?family=ITC+Giovanni);

		html{
			background-color:#1e1e1e;
			color:white;
			@font-face {
				font-family: "ITC Giovanni";
				src: url("//db.onlinewebfonts.com/t/0d568bbc9833f436d4f82654a8bfd823.eot");
			}
		}

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
			word-wrap: break-word;
		}

		.postTime{
			font-size: 12px;
		}
		
		.post__line{
			margin-top:10px;
			margin-bottom:10px;
			border-bottom: 1px solid black;
		}

		.tweetbox{
   			padding-bottom: 10px;
   			border-bottom: 8px;
   			padding-right: 10px;
		}

		.tweetbox form{
   			display: flex;
    		flex-direction: column;
		}

		.tweetbox form{
   			display: flex;
    		flex-direction: column;
		}

		.tweetbox__input input{
			color:black;
			width: 50%;
    		flex: 1;
    		margin-left: 20px;
    		font-size: 20px;
    		border: none;
    		outline: none;
		}

		.tweetbox__tweetbutton{
    		border: none;
    		color: white;
    		font-weight: 900;
    		border-radius: 30px;
    		width: 80px;
    		height: 40px;
    		margin-top: 20px;
    		margin-left: auto;
		}
		
		input{
			text-align:left;
			text-align:center;
			background-color:#1e1e1e;
			color: white;
		}

		input[type=submit]{
			float:left;
			clear:left;
			width: 100px;
			background-color:maroon;
		}

		::placeholder{
			color:darkgrey;
		}

		.title{
			text-align:center;
			font-size:100;
			color:white;
			background-color:maroon;
		}

		.textarea{
			background-color:#1e1e1e;
			color:white;
			font-size:14;
		}


	</style>

<div class="title">
Knight Life
</div>

</head>

<body>


<?php
if($_SESSION["login"]>-1)echo '<a href="byebye.php">logout</a>';
else echo '<a href="frontdoor.php">login/create account</a>';
?>

<hr>

<?php

if($_SESSION["login"]>-1){

	echo '
		<div class="tweetbox">
			<form action="post.php" method="get">
				<div class="tweetbox__input">
					<textarea class=textarea id="post" name="post" type="text" placeholder="What would you like to say?" rows="4" cols="50"></textarea>
					<br>
					
					<input type="submit" value="Post">
					
				</div>
			</form>
		</div>
		';

}
else echo "you must login to post <br>";


	$result = getPosts();
	//print_r($result);
	$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($rows as $row) {



		//echo '<div class = "post">';
		/*print "username:".$name."<br>";
		print "post:".$row['postContent']."<br>";
		print "date:".$row['postTime']."<br>";
		print "likes:".$row['likes']."<br>";*/

		$name = getUserNamebyId($row['userID']);

		print '<div class="posts">';
		print '<div class="post__body">';
		print '<div class="post__header">';
		echo '<div class="post__user"><a href="userpage.php?id='.$row['userID'].'">@'.$name.'</a></div>';
		print '<div class="post__content">
		' .$row['postContent'].'
		</div>';
		print '<div class="postTime">' .$row['postTime'].'</div>';
		print '<div class="post__Footer">
					<button class="material-symbols-outlined"> &#xE87D;  
					</button>
					'.$row['likes'].'
				</div>';
		print '<div class="post__line"></div>';
	}
?>

<!--
<div class="post">
            <div class="post__body">
                <div class="post__header">
                    <div class="post__user">
                        <h3>Username</h3>
                    </div>
                    <div class="post__content">
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. At officiis quis ea dicta quisquam porro, molestiae obcaecati enim natus totam inventore, labore nemo minima harum eius ipsum omnis, recusandae optio.
                        </p>
                    </div>
                </div>
				<div class="postTime">
					12:00pm Feb. 1st 2023
				</div>
                <div class="post__Footer">
					<span class="material-symbols-outlined"> &#xE87D;</span> 0
                </div>
            </div>
        </div>
</body>