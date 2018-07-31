<?php
$playersBefore = $_POST["beforeCard"];
$playersAfter = $_POST["afterCard"];

$con=mysqli_connect("localhost","czstuff2_chuckeR","thegoldenrule","czstuff2_charlotteChuckers");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $stringer = "";
switch (count($playersAfter)) {
	case 2 : "UPDATE weeklyscorecards SET player_id = '".$playersAfter[1]."' WHERE player_id = '".$playersBefore[0]."';";
	break;
	case 3 : "UPDATE weeklyscorecards SET player_id = '".$playersAfter[1]."', player2 = '".$playersAfter[2]."' WHERE  
	player_id = '".$playersBefore[0]."';";
	break;
	case 4 :
	$stringer = "UPDATE weeklyscorecards SET player_id = '".$playersAfter[1]."', player2 = '".$playersAfter[2]."', player3 = '".$playersAfter[3]."' WHERE player_id = '".$playersBefore[0]."';";
	break;
	case 5 : 
	$stringer = "UPDATE weeklyscorecards SET player_id = '".$playersAfter[1]."', player2 = '".$playersAfter[2]."', player3 = '".$playersAfter[4]."', player4 = '".$playersAfter[5]."' WHERE player_id = '".$playersBefore[0]."';";
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