<?php
header("Content-type: application/json");
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "blog_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$sql = "SELECT * FROM blog";
$result = $conn->query($sql);
$data = $result->fetch_all();
exit(json_encode($data));