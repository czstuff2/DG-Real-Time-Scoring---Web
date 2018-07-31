<?php
class Scorecard {
	public $player_id = 0;
	public $player1 = 0;
	public $player2 = 0;
	public $player3 = 0;
	public $player4 = 0;
}


$con=mysqli_connect("localhost","czstuff2_chuckeR","thegoldenrule","czstuff2_charlotteChuckers");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con, "SELECT * FROM `weeklyscorecards`");


$count = 0;

while($row = mysqli_fetch_array($result))
{	
	$card = new Scorecard();
	$card->player_id = $row['player_id'];
	$card->player1 = $row['player1'];
	$card->player2 = $row['player2'];
	$card->player3 = $row['player3'];
	$card->player4 = $row['player4'];
	$players[]= $card;
	$count++;
}


if ($count == 0)
$response = "No cards found.";
else
//output the response
$response = $players;

echo json_encode($response);

mysqli_close($con);
?>