<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productivity_db";
$date = "'".date('Y-m-d')."'";
$time = "'".date('H:i:s')."'";
$score = rand(0,10);
$timeId = rand(9,19);
if ($score < 5){
	$description = "'Sleepy'";
} else {
	$description = "' '";
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO testscore (score, description, date, time,id)
    VALUES ($score, $description, $date, $time, $timeId)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo $date;
	echo $time;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>