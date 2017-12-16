<?php
session_start();
$Link = mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$Link->query('use jbj') or die('数据库选择失败');
$PhoneNum = $_SESSION['PhoneNum'];
$sql = "select * from job_trustee_table where Trustee_Id = '{$PhoneNum}'";
$rs = $Link->query($sql);
echo <<<eof
<table class="table1">
<tr>
<th>职位名称</th>
<th>公司名称</th>
<th>薪资</th>
<th>工作地区</th>
<th>简历</th>
</tr>
eof;
while($rows = mysqli_fetch_assoc($rs)) {
    $CtgID = $rows['CtgID'];
    $RsmID = $rows['RsmID'];
    $sql1 = "select * from category_table where ID = '{$CtgID}'";
    $rs1 =  $Link->query($sql1);
    $rows1 = mysqli_fetch_assoc($rs1);
    $Category_Id = $rows1['Category_Id'];
    $categoryName = $rows1['categoryName'];
    $Salary = $rows1['Salary'];
    $sql2 = "select * from trusteeresume_table where ID = '{$RsmID}'";
    $rs2 =  $Link->query($sql2);
    $rows2 = mysqli_fetch_assoc($rs2);
    $TrusteeResumeInfo = $rows2['TrusteeResumeInfo'];
    $sql3 = "select * from company_table where Company_Id = '{$Category_Id}'";
    $rs3 =  $Link->query($sql3);
    $rows3 = mysqli_fetch_assoc($rs3);
    $CompanyName = $rows3['CompanyName'];
    $CompanyAddress = $rows3['CompanyAddress'];
echo <<<eof
<div>
<tr>
<td><a class="a1" href="showInfo.php?ID={$CtgID}&flag=1">{$categoryName}</a></td>
<td><a class="a1" href="showCompany.php?Company_Id={$Category_Id}">{$CompanyName}</a></td>
<td>{$Salary}</td>
<td>{$CompanyAddress}</td>
<td><a class="a1" href="showResume.php?ID={$RsmID}">简历详情</a></td>
</tr>
</div>
eof;
}
echo <<<eof
</table>
eof;
?>