<?php
session_start();
$PhoneNum = $_SESSION['PhoneNum'];
$txtarea = $_POST['textarea'];
$ID = $_POST['ID'];
$CompanyName = $_POST['cmpname'];
$CompanyAddress = $_POST['cmpadd'];
$link = mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$link->query('use jbj') or die('数据库选择失败');
$sql = "UPDATE company_table SET CompanyName = '{$CompanyName}',CompanyAddress = '{$CompanyAddress}',CompanyInfo = '{$txtarea}' WHERE Company_Id = '{$PhoneNum}' and ID = {$ID}";
$rs = $link->query($sql);
exit("<script>location.href='company.php';</script>");




?>