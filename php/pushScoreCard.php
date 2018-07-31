<?php
$playersToAdd = $_POST["playerArray"];

$con=mysqli_connect("localhost","czstuff2_chuckeR","thegoldenrule","czstuff2_charlotteChuckers");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $stringer = "";
switch (count($playersToAdd)) {
	case 1 :
	$stringer = "INSERT INTO weeklyscorecards (player_id) 
			VALUES ('".$playersToAdd[0]."');";
	break;
	case 2 : 
	$stringer = "INSERT INTO weeklyscorecards (player_id, player1) 
			VALUES ('".$playersToAdd[0]."','".$playersToAdd[1]."');";
	break;
	case 3 :
	$stringer = "INSERT INTO weeklyscorecards (player_id, player1, player2) 
			VALUES ('".$playersToAdd[0]."','".$playersToAdd[1]."','".$playersToAdd[2]."');";
	break;
	case 4 :
	$stringer = "INSERT INTO weeklyscorecards (player_id, player1, player2, player3) 
			VALUES ('".$playersToAdd[0]."','".$playersToAdd[1]."','".$playersToAdd[2]."','".$playersToAdd[3]."');";
	break;
	case 5 :
	$stringer = "INSERT INTO weeklyscorecards (player_id, player1, player2, player3, player4) 
			VALUES ('".$playersToAdd[0]."','".$playersToAdd[1]."','".$playersToAdd[2]."','".$playersToAdd[3]."','".$playersToAdd[4]."');";
	break;
}
$result = mysqli_query($con, $stringer);
		
$string = "";
for ($i=0; $i<count($playersToAdd);$i++)
{
	if ($i == 0) {
		$string = "UPDATE weeklyround SET scorekeeper = 1, cardID = '".$playersToAdd[0]."' WHERE player_id = '".$playersToAdd[$i]."';";
		mysqli_query($con, $string);
		} else
	$string = "UPDATE weeklyround SET cardID = '".$playersToAdd[0]."' WHERE player_id = '".$playersToAdd[$i]."';";
		mysqli_query($con, $string);
}

echo json_encode($result);

mysqli_close($con);

?>