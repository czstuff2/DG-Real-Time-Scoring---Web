<?php
$playerToAdd = $_POST["ids"];
$con=mysqli_connect("localhost","czstuff2_chuckeR","thegoldenrule","czstuff2_charlotteChuckers");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 
$result = mysqli_query($con,"SELECT * FROM players WHERE player_id = '".$playerToAdd."'");
$players = array();
while ($row = mysqli_fetch_array($result))
{
	$newID = $row['player_id'];
	$newName = $row['name'];
	$players[0] = $newID;
	$players[1] = $newName;	
}

	$result = mysqli_query($con,"INSERT INTO weeklyround (player_id, name, scorekeeper) 
			VALUES ('".$players[0]."','".$players[1]."','0');");
			$players[2] = 0;


$response = $players[0];
echo json_encode($response);

mysqli_close($con);

?>