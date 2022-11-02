<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "blog_db";
$response = array();
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$sql = "SELECT * FROM user WHERE username = '{$_GET['username']}'";
$result = $conn->query($sql);
$data = $result->fetch_all();

if (count($data) == 0) {
   $response['code'] = -200;
   $response['message'] = "找不到该用户";
   exit(json_encode($response));
}
if ($data[0][2] != $_GET['password'] ) {
    $response['code'] = -300;
    $response['message'] = "密码错误";
    exit(json_encode($response));
}
$response['code'] = 100;
$response['message'] = "登陆成功";
exit(json_encode($response));
$conn->close();
