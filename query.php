<?php
session_start();
$value = $_GET['value'];
$Link = mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$Link->query('use jbj') or die('数据库选择失败');
$sql = "SELECT * FROM category_table WHERE categoryName LIKE '%{$value}%'";
$rs = $Link->query($sql);
echo <<<eof
<style type="text/css">
.table1{
	border-top:3px solid rgb(228,228,228);
    margin:auto;
}
.table1 th{
	width:250px;
	height:50px;
}
.table1 td{
	width:250px;
	height:50px;
	text-align:center;
	border-collapse:collapse;
	border-top:1px solid rgb(228,228,228);	
}
.table1 .a1{
	text-decoration:none;
}
</style>
<table class="table1">
<tr>
<th>职位名称</th>
<th>公司名称</th>
<th>薪资</th>
<th>工作地区</th>
</tr>
eof;
while($rows = mysqli_fetch_assoc($rs)) {
    $ID = $rows['ID'];
    $Company_Id = $rows['Category_Id'];
    $categoryName = $rows['categoryName'];
    $Information = $rows['Information'];
    $Salary = $rows['Salary'];
    $sql1 = "select * from company_table where Company_Id = '{$Company_Id}'";
    $rs1 = $Link->query($sql1);
    $rows1 = mysqli_fetch_assoc($rs1);
    $CompanyName = $rows1['CompanyName'];
    $CompanyAddress = $rows1['CompanyAddress'];
    echo <<<eof
<div>
<tr>
<td><a class="a1" href="showInfo?ID={$ID}&flag=0">{$categoryName}</a></td>
<td><a class="a1" href="showCompany?Company_Id={$Company_Id}">{$CompanyName}</a></td>
<td>{$Salary}</td>
<td>{$CompanyAddress}</td>
</tr>
</div>
eof;
}
echo <<<eof
</table>
eof;

?>