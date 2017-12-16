<?php
session_start();
$Link = mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$Link->query('use jbj') or die('数据库选择失败');
$PhoneNum = $_SESSION['PhoneNum'];
$rs = $Link->query("select * from trusteeresume_table where TrusteeResume_Id = '{$PhoneNum}'");
while($rows = mysqli_fetch_assoc($rs)) {
    $ID = $rows['ID'];
    $Default = $rows['Default1'];
echo <<<eof
<div class="divinfo">
<a class="a1" href="resumedelete.php?ID={$ID}">删除</a>
eof;
if($Default == '1') {
    echo "<a style='float:left;width:25%;text-decoration:none;font-size:15px;color:green;' href='#'>已是默认简历</a>";
}else 
    echo "<a style='float:left;width:25%;text-decoration:none;font-size:15px;color:green;' href='default.php?ID={$ID}'>选择为默认简历</a>";
echo <<<eof
<form class='info' action='resumedo.php' method='post'>
<input class="input1" type="submit" value="修改" />
<textarea class="txtarea" rows="20" cols="50" name="textarea">{$rows['TrusteeResumeInfo']}</textarea>
<input type="hidden" name="ID" value="{$ID}" />
</form>
</div><br /><br />
eof;

}
?>