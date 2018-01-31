<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productivity_db";
$date = "'".date('Y-m-d')."'";
$time = "'".date('H:i:s')."'";
$score = $_GET["score"];
$timeId = "'".date('H')."'";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO productivityscore (score, description, date, time,id)
    VALUES ($score, 'test', $date, $time, $timeId)";
    // use exec() because no results are returned
    $conn->exec($sql);
	echo $score;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>