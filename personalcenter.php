<?php
session_start();
$Link = @mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$Link->query('use jbj') or die('数据库选择失败');
$PhoneNum = $_SESSION['PhoneNum'];
$rs = $Link->query("select Trustee_Name,Trustee_Sex,Trustee_Age,Trustee_School,Trustee_Major,Trustee_Grade,Trustee_Email from trusteeinfo_table where Trustee_Id = '{$PhoneNum}'");
$rows = mysqli_fetch_array($rs);
?>
<table>
<tr><td>姓名:</td><td><input type="text" maxlength="10" id="Trustee_Name" value="<?php echo $rows['Trustee_Name'];?>" /></td><td><a href="javascript:alterInfo('Trustee_Name')">修改</a></td></tr>
<tr><td>性别:</td><td><input type="text" maxlength="1" id="Trustee_Sex" value="<?php echo $rows['Trustee_Sex'];?>" /></td><td><a href="javascript:alterInfo('Trustee_Sex')">修改</a></td></tr>
<tr><td>年龄:</td><td><input type="text" maxlength="4" id="Trustee_Age" value="<?php echo $rows['Trustee_Age'];?>" /></td><td><a href="javascript:alterInfo('Trustee_Age')">修改</a></td></tr>
<tr><td>学校:</td><td><input type="text" maxlength="10" id="Trustee_School" value="<?php echo $rows['Trustee_School'];?>" /></td><td><a href="javascript:alterInfo('Trustee_School')">修改</a></td></tr>
<tr><td>专业:</td><td><input type="text" maxlength="10" id="Trustee_Major" value="<?php echo $rows['Trustee_Major'];?>" /></td><td><a href="javascript:alterInfo('Trustee_Major')">修改</a></td></tr>
<tr><td>年级:</td><td><input type="text" maxlength="4" id="Trustee_Grade" value="<?php echo $rows['Trustee_Grade'];?>" /></td><td><a href="javascript:alterInfo('Trustee_Grade')">修改</a></td></tr>
<tr><td>邮箱:</td><td><input type="text" maxlength="20" id="Trustee_Email" value="<?php echo $rows['Trustee_Email'];?>" /></td><td><a href="javascript:alterInfo('Trustee_Email')">修改</a></td></tr>
</table>
