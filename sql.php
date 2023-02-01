<?php

	session_start();

	if(!isset($_SESSION["login"]))$_SESSION["login"]=-1;

function login($username, $password){
	$sql = "SELECT * FROM `users` where `username`='joeBiden' and `password`='prezi';";

}


function newPost($id, $post){

	global $con, $result;
	$sql = "INSERT INTO `posts` (`postID`, `userID`, `postContent`, `postTime`, `likes`, `replyID`) VALUES (NULL, '".$id."', '".$post."', CURRENT_TIMESTAMP, '0', '-1');";
	$result = mysqli_query($con, $sql);
	return $result;
}
function userExist($user, $password){
	global $con, $result;
	$sql = "SELECT * FROM `users` where username = '".$user."' and password='".$password."';";
	$result = mysqli_query($con, $sql);
	return $result;
}
function getUser($id){

	global $con, $result;
	$sql = "SELECT * FROM `users` where userID=".$id.";";
	$result = mysqli_query($con, $sql);
	return $result;
}

function getUserNamebyId($id){
	global $con,$result;
	$result = getUser($id);
	while ($row = mysqli_fetch_assoc($result)){
		return $row['username'];
	}
	return "user not found";
}

function checkUsernameExist($username){
	global $con,$result;
	$sql = 'SELECT * FROM `users` where username="kai";';
	$result = mysqli_query($con, $sql);
	return mysqli_num_rows($result);
	}

function newUser($username, $password, $email){
	global $con, $result;
	$sql = "INSERT INTO `users` (`userID`, `username`, `password`, `email`) VALUES (NULL, '".$username."', '".$password."', '".$email."');";
	$result = mysqli_query($con, $sql);
	return $result;
}


function getPosts(){
	global $con, $result;
	$sql = "SELECT * FROM `posts` ORDER BY `posts`.`postTime` DESC ;";
	$result = mysqli_query($con, $sql);
	return $result;
}


function connect(){
	global $con, $result;
	$con = mysqli_connect("localhost", "root", "", "knightdb");}
connect();
?>