<?php
session_start();
$Link = mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$Link->query('use jbj') or die('数据库选择失败');
$ID = $_GET['ID'];
$_SESSION['RsmID'] = $ID;
$PhoneNum = $_SESSION['PhoneNum'];
$sql = "UPDATE trusteeresume_table SET Default1 = 0 WHERE TrusteeResume_Id = '{$PhoneNum}' and Default1 = 1";
$Link->query($sql);
$rs = $Link->query("UPDATE trusteeresume_table SET Default1 = 1 WHERE TrusteeResume_Id = '{$PhoneNum}' and ID = {$ID}");
exit("<script>location.href = 'resume.html';</script>");
?>