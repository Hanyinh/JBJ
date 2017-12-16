<?php
session_start();
$ID = $_GET['ID'];
$PhoneNum = $_SESSION['PhoneNum'];
$link = mysqli_connect('localhost','root','123456') or die("数据库连接失败");
$link->query('use jbj') or die("数据库选择失败");
$sql1 = "select * from trusteeresume_table where ID = '{$ID}'";
$rs1 = $link->query($sql1);
$rows1 = mysqli_fetch_assoc($rs1);
$Default1 = $rows1['Default1'];
if($Default1 == 1) {
    exit("<script>alert('此为默认简历，不能删除');location.href='resume.html';</script>");
}else {
    $sql = "DELETE FROM trusteeresume_table WHERE TrusteeResume_Id = '{$PhoneNum}' AND ID = {$ID}";
    $link->query($sql);
    exit("<script>location.href='resume.html';</script>");
}
?>