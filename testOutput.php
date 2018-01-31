<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
	.big{
	font-size: 20;
	}
	.small{
	font-size: 15;
	
	}
	</style>
</head>
<body>

<?php
$q = intval($_GET["q"]);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productivity_db";
$date = date('Y-m-d');

$con = new mysqli($servername, $username, $password, $dbname);
if (!$con) {
    die('Could not connect: ' . mysql_error($con));
}

if ($q == 0){
	$sql= "SELECT score, date, time FROM testscore WHERE date = '$date'";
} else {
	$sql= "SELECT score, date, time FROM testscore";
}


$result = mysqli_query($con, $sql);

echo "<table class='table table-striped'>
<thead>
<tr>
<th>Score</th>
<th>Date</th>
<th>Time</th>
</tr>
</thead>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['score'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$sql = "SELECT score FROM testscore";
$result = mysqli_query($con, $sql);
$sum = 0;
$average = 0;
$count = 0;
$high = 0;
$low = 0;
while($row = mysqli_fetch_array($result)) {
	$sum += $row['score'];
	$count++;
	if ($row['score'] > $high) {
		$high =$row['score'];
	}
	if ($row['score'] < $low) {
		$low = $row['score'];
	}
	
}
echo "<span class='big'> Highest score: </span><span class='small'>" . $high . "</span><hr />";
echo "<span class='big'> Lowest score: </span><span class='small'>" . $low . "</span><hr />";
$average = $sum / $count;
echo "<span class='big'> Average Productivity Score of the Day: </span><span class='small'>".round($average, 1)."</span><hr />";

$sql2 = "SELECT description FROM testscore WHERE score < 5";
$result = mysqli_query($con, $sql2);
echo "<span class='big'> Reasons for low productivity: </span>";
echo "<p class='small'>Sleepy<p>";
mysqli_close($con);
?>
</body>
</html>