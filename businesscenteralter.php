<?php
session_start();
$name = $_GET['name'];
$value = $_GET['value'];
$PhoneNum = $_SESSION['PhoneNum'];
$link = mysqli_connect('localhost','root','123456') or die("数据库连接失败");
$link->query('use jbj') or die("数据库选择失败");
$sql = "UPDATE principalinfo_table SET {$name} = '{$value}' WHERE Principal_Id = '{$PhoneNum}'";
$link->query($sql);

?>