<?php
session_start();
$ID = $_POST['ID'];
$textarea = $_POST['textarea'];
$PhoneNum = $_SESSION['PhoneNum'];
$link = mysqli_connect('localhost','root','123456') or die("数据库连接失败");
$link->query('use jbj') or die("数据库选择失败");
$sql = "UPDATE trusteeresume_table SET TrusteeResumeInfo = '{$textarea}' WHERE TrusteeResume_Id = '{$PhoneNum}' and ID = {$ID}";
$link->query($sql);
exit("<script>location.href='resume.html';</script>");
?>