<?php
session_start();
$PhoneNum = $_SESSION['PhoneNum'];
$link = mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$link->query('use jbj') or die('数据库选择失败');
$sql = "select * from company_table where Company_Id = '{$PhoneNum}'";
$rs = $link->query($sql);
$rows = mysqli_fetch_assoc($rs);
$ID = $rows['ID'];
$CompanyName = $rows['CompanyName'];
$CompanyAddress = $rows['CompanyAddress'];
echo <<<eof
<div style="width:500px;margin:10px auto;">
<form class='info' action='companyupdate.php' method='post'>
<input style="width:100%;cursor:pointer;font-size:15px;color:green;" class="input1" type="submit" value="修改" />
公司名称：<input style="width:100%;border:0;padding-left:20px;" type="text" name="cmpname" value="{$CompanyName}" />
公司地址：<input style="width:100%;border:0;padding-left:20px;" type="text" name="cmpadd" value="{$CompanyAddress}" />
公司简介：<textarea style="resize:none;outline:none;width:100%;" class="txtarea" rows="30" cols="50" name="textarea">{$rows['CompanyInfo']}</textarea>
<input type="hidden" name="ID" value="{$ID}" />
</form>
</div>
eof;



?>