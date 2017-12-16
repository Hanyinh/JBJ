<?php
session_start();
$Link = mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$Link->query('use jbj') or die('数据库选择失败');
$PhoneNum = $_SESSION['PhoneNum'];
$sql = "select * from company_table where Company_Id = '{$PhoneNum}'";
$rs1 = $Link->query($sql);
$rows1 = mysqli_fetch_assoc($rs1);
$CompanyName = $rows1['CompanyName'];
$CompanyAddress = $rows1['CompanyAddress'];
$rs = $Link->query("select * from category_table where Category_Id = '{$PhoneNum}'");
echo <<<eof
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