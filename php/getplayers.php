<?php
class Player {
	public $name = "";
	public $id = 0;
}


$con=mysqli_connect("localhost","czstuff2_chuckeR","thegoldenrule","czstuff2_charlotteChuckers");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con, "SELECT * FROM players \n"
    . "LEFT JOIN weeklyround ON (weeklyround.player_id = players.player_id)\n"
    . "WHERE weeklyround.player_id IS NULL");
$players=array();
$count = 0;
while($row = mysqli_fetch_array($result))
  {
	  $Player = new Player();
	  $Player->id = $row[0];
	  $Player->name = $row[1];
	  $players[] = $Player;
	  $count++;
	  
  }
  
  $q=$_GET["str"];

//lookup all hints from array if length of q>0
if (strlen($q) > 0)
  {
  $hint= array();
  $Player = new Player();
  $hintCount = 0;
  for($i=0; $i<count($players); $i++)
    {
		$Player = $players[$i];
    if (strtolower($q)==strtolower(substr($Player->name,0,strlen($q))))
      { 
	  if ($hintcount > 0) {
	  $yeah = ($hintCount) - 1;
      	if ($hint[$yeah] == $Player) {
		return;  
	  }
	  } else {
        $hint[$hintCount]=$Player;
		$hintCount++;
	  }
      }
    }
  }

// Set output to "no suggestion" if no hint were found
// or to the correct values
if (count($hint) == 0)
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
echo json_encode($response);

mysqli_close($con);
?>