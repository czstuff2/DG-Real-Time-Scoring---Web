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
$result = mysqli_query($con, "SELECT * FROM players");
$players=array();
$count = 0;
while($row = mysqli_fetch_array($result))
  {
	  //$Player = new Player();
	  //$Player->id = $row[0];
	  //$Player->name = $row[1];
	  $players[$row[0]] = $row[1];
	  $count++;
	  
  }
  
$response = $players;
//output the response
echo json_encode($response);

mysqli_close($con);
?>