<?php
session_start();

$value = $_POST['business'];
if($value == 'no') {
    exit("<script>top.location.href = 'index.php';</script>");
}
else if($value == 'yes') {
    $Link = @mysqli_connect('localhost','root','123456') or die('数据库连接失败');
    $Link->query('use jbj') or die('数据库选择失败');
    $PhoneNum = $_SESSION['PhoneNum'];
    $_SESSION['isBusiness'] = 1;
    $sql = "UPDATE trusteeinfo_table SET isBusiness = 1 WHERE Trustee_Id = '{$PhoneNum}'";
    $Link->query($sql);
    $Link->query("INSERT INTO principal_table(Principal_Id,Principal_Phonenum) VALUES('{$PhoneNum}','{$PhoneNum}');");
    $Link->query("INSERT INTO principalinfo_table(PrincipalInfo_Id,Principal_Id) VALUES('{$PhoneNum}','{$PhoneNum}');");
    $Link->query("INSERT INTO company_table(Company_Id,CompanyInfo) VALUES('{$PhoneNum}','');");
    exit("<script>location.href = 'businesscenter.html';</script>");
}



?>