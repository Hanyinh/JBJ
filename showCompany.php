<?php
session_start();
$Company_Id = $_GET['Company_Id'];
$link = mysqli_connect('localhost','root','123456') or die("数据库连接失败");
$link->query('use jbj') or die("数据库选择失败");
$sql = "select * from company_table where Company_Id = '{$Company_Id}'";
$rs = $link->query($sql);
$rows = mysqli_fetch_assoc($rs);
echo <<<eof
<style type="text/css">
.backdiv{float:right;width:40px;height:30px;}
.backa{text-decoration:none;color:red;}
.backa:hover{text-decoration:underline;}
</style>
<div class="backdiv"><a class="backa" href="javascript:history.back()" >back</a></div>
<div class="bgdiv" style="width:1000px;height:1000px;margin:30px auto;background-image:url('./Images/bgimage5.jpg');">
<h2 style="text-align:center;padding-top:15px;">公司详情</h2>
<div style="width:500px;height:400px;margin:30px auto;">
<h4>名称:</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$rows['CompanyName']}
<h4>电话:</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$rows['Company_Id']}
<h4>地址:</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$rows['CompanyAddress']}
<h4>简介:</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$rows['CompanyInfo']}
</div>
<div>
eof;
?>