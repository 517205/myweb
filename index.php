<?php
$con=mysqli_connect("localhost","root","2025","my_db");
if(!$con)
{
	die('could not connect:'.mysqli_error());
}
if($_GET["id"]=="config")
{
	echo "12345";
}
if($_GET["id"]=="init")
{
	mysqli_query($con,"CREATE DATABASE my_db");
	$sql2 = "CREATE TABLE chat
	(
	id int,
	username varchar(15),
	message varchar(100),
	publishtime varchar(20)
	)";
	mysqli_query($con,$sql2);
	$sql2 = "CREATE TABLE user
	(
	id int,
	username varchar(15),
	publishtime varchar(20)
	)";
	mysqli_query($con,$sql2);
	$sql2 = "CREATE TABLE msg
	(
	id int,
	name varchar(20),
	subject varchar(20),
	message varchar(100),
	publishtime varchar(20)
	)";
	mysqli_query($con,$sql2);
}

if($_GET["id"]=="addchat")
{
	$datedate=date("Y-m-d")." ".date("H").":".date("i").":".date("s");
	$sql3="INSERT INTO chat (username,message,publishtime)
	VALUES('$_GET[username]','htmlspecialchars($_GET[message])',$datedate)";
	mysqli_query($con,$sql3);
}

if($_GET["id"]=="adduser")
{
	$num=1;
	$result = mysqli_query($con,"SELECT * FROM user");
	while($row = mysqli_fetch_array($result))
	{
		$num=$num+1;
	}
	$usr=htmlspecialchars($_GET[username]);
	$datedate=date("Y-m-d")." ".date("H").":".date("i").":".date("s");
	$sql4="INSERT INTO user (id,username,publishtime)
	VALUES('$num','$usr','$datedate')";
	mysqli_query($con,$sql4);
	echo $num;
}

if($_GET["id"]=="showuser")
{
$result = mysqli_query($con,"SELECT * FROM user");
while($row = mysqli_fetch_array($result))
  {
  echo $row['id']." ".$row['username'] ." ".$row['publishtime'];
  echo "</br>";
  }
}
if($_GET["id"]=="showchat")
{
$result = mysqli_query($con,"SELECT * FROM user");
while($row = mysqli_fetch_array($result))
  {
  echo $row['id']." ".$row['username'] ." ".$row['publishtime'];
  echo "</br>";
  }
}
if($_GET["id"]=="showmsg")
{
$result = mysqli_query($con,"SELECT * FROM msg");
while($row = mysqli_fetch_array($result))
  {
  echo "-----------------------</br>";
  echo $row['id'].": ".$row['name']."</br>".$row['subject'] ."</br>".$row['message']."</br>".$row['publishtime'];
  echo "</br>-----------------------</br>";
  }
}
if($_GET["id"]=="command")
{
	echo mysqli_query($_GET["command"]);
}

if($_GET["id"]=="del")
{
	mysqli_query("DELETE FROM user WHERE id='$_GET[userid]'");
}
















mysqli_close($con);
echo " end";
?>
