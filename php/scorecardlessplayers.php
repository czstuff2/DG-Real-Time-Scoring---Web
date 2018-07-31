<?php
class Player {
	public $player_id = null;
	public $name = "";
	public $scorekeeper = null;
	public $cardID = null;
	public $startingHole = null;
}


$con=mysqli_connect("localhost","czstuff2_chuckeR","thegoldenrule","czstuff2_charlotteChuckers");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con, "SELECT * FROM `weeklyround` WHERE `cardID`IS NULL");


$count = 0;

while($row = mysqli_fetch_assoc($result))
{	
	$player = new Player();
	$player->player_id = $row['player_id'];
	$player->name = $row['name'];
	$player->scorekeeper = $row['scorekeeper'];
	$player->cardID = $row['cardID'];
	$player->startingHole = $row['startingHole'];
	$players[]= $player;
	$count++;
}


//output the response
$response = $players;

echo json_encode($response);

mysqli_close($con);
?>