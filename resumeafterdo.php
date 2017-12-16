<?php
session_start();
$PhoneNum = $_SESSION['PhoneNum'];
$txtarea = $_POST["txtarea"];
$link = mysqli_connect('localhost','root','123456') or die("数据库连接失败");
$link->query('use jbj') or die("数据库选择失败");
$sql1 = "select * from trusteeresume_table where TrusteeResume_Id = '{$PhoneNum}'";
$rs1 = $link->query($sql1);
if($rows1 = mysqli_fetch_assoc($rs1)) {
    $sql = "INSERT INTO trusteeresume_table(TrusteeResume_Id,TrusteeResumeInfo,Default1) VALUES('{$PhoneNum}','{$txtarea}',0)";   
}else {
    $sql = "INSERT INTO trusteeresume_table(TrusteeResume_Id,TrusteeResumeInfo,Default1) VALUES('{$PhoneNum}','{$txtarea}',1)";   
}
$link->query($sql);
exit("<script>location.href='resume.html';</script>");

?>