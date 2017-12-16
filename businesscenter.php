<?php
session_start();
$Link = @mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$Link->query('use jbj') or die('数据库选择失败');
$PhoneNum = $_SESSION['PhoneNum'];
$rs = $Link->query("select Principal_Name,Principal_Sex,Principal_Age,Principal_Email from principalinfo_table where Principal_Id = '{$PhoneNum}'");
$rows = mysqli_fetch_array($rs);
?>
<table>
<tr><td>姓名:</td><td><input type="text" maxlength="10" id="Principal_Name" value="<?php echo $rows['Principal_Name'];?>" /></td><td><a href="javascript:alterInfo('Principal_Name')">修改</a></td></tr>
<tr><td>性别:</td><td><input type="text" maxlength="1" id="Principal_Sex" value="<?php echo $rows['Principal_Sex'];?>" /></td><td><a href="javascript:alterInfo('Principal_Sex')">修改</a></td></tr>
<tr><td>年龄:</td><td><input type="text" maxlength="4" id="Principal_Age" value="<?php echo $rows['Principal_Age'];?>" /></td><td><a href="javascript:alterInfo('Principal_Age')">修改</a></td></tr>
<tr><td>邮箱:</td><td><input type="text" maxlength="20" id="Principal_Email" value="<?php echo $rows['Principal_Email'];?>" /></td><td><a href="javascript:alterInfo('Principal_Email')">修改</a></td></tr>
</table>
