<?php
session_start();
$Link = @mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$Link->query('use jbj') or die('数据库选择失败');
$UserFindId = $_POST['PhoneNum'];
$PhoneNum = $_POST['PhoneNum'];
$Password1 = $_POST['Password'];
$Password = md5($Password1);
$Verify = strtolower($_POST['Verify']);
$verifyCode = strtolower($_SESSION["verifyCode"]);
$rs = $Link->query('select * from trustee_table');
if($Verify !== $verifyCode) {
    exit("<script>alert('验证码输入错误，请重新输入！');location.href='register.php';</script>");
}
while($rows = @mysqli_fetch_array($rs)) {
	if($PhoneNum == $rows['Trustee_Phonenum']) {
	   exit("<script>alert('手机号已存在，请重新输入！');location.href='register.php';</script>");
	}
	
}
if($rows == null) {
    $Link->query("INSERT INTO trustee_table(Trustee_Id,Trustee_Phonenum,Trustee_Password) VALUES('{$UserFindId}','{$PhoneNum}','{$Password}');");
    $Link->query("INSERT INTO trusteeinfo_table(TrusteeInfo_Id,Trustee_Id,isBusiness) VALUES('{$PhoneNum}','{$PhoneNum}',0);");
    exit("<script>alert('注册成功，请登录');location.href='login.php';</script>");
}




?>
