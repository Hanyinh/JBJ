<?php
session_start();
$ID = $_GET['ID'];
$flag = $_GET['flag'];
$link = mysqli_connect('localhost','root','123456') or die("数据库连接失败");
$link->query('use jbj') or die("数据库选择失败");
$sql = "select * from category_table where ID = '{$ID}'";
$rs = $link->query($sql);
$rows = mysqli_fetch_assoc($rs);
$Category_Id = $rows['Category_Id'];

echo <<<eof
<style type="text/css">
.backdiv{float:right;width:40px;height:30px;}
.backa{text-decoration:none;color:red;}
.backa:hover{text-decoration:underline;}
</style>
<div class="backdiv"><a class="backa" href="javascript:history.back()" >back</a></div>
eof;
if($flag == 0) {
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin']!=1 || !isset($_SESSION['PhoneNum'])) {
        echo "<div class='backdiv'><a class='backa' style='color:green;' href='apply.php?CtgID={$ID}' >申请</a></div>";
    }else {
        $PhoneNum = $_SESSION['PhoneNum'];
        if ($Category_Id != $PhoneNum) {
            echo "<div class='backdiv'><a class='backa' style='color:green;' href='apply.php?CtgID={$ID}' >申请</a></div>";
        }
    }
}
echo <<<eof
<div class="bgdiv" style="width:700px;height:400px;margin:30px auto;background-image:url('./Images/bgimage4.jpg');">
<h2 style="text-align:center;padding-top:15px;">职业要求</h2>
<div style="width:500px;height:400px;margin:30px auto;">{$rows['Information']}</div>
<div>
eof;
?>