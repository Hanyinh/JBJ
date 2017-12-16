<?php
session_start();
if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin']!=1 || !isset($_SESSION['PhoneNum'])) {
    exit("<script>alert('请先登录');location.href = 'firstpage.html';</script>");
    ?>
<?php 
}else if(!isset($_SESSION['RsmID'])) {
    exit("<script>alert('请先填写简历');location.href = 'firstpage.html';</script>");
}else {
    $PhoneNum = $_SESSION['PhoneNum'];
    $CtgID = $_GET['CtgID'];
    $RsmID = $_SESSION['RsmID'];
    $Link = mysqli_connect('localhost','root','123456') or die('数据库连接失败');
    $Link->query('use jbj') or die('数据库选择失败');
    $sql1 = "select * from job_trustee_table where CtgID = {$CtgID} and Trustee_Id = '{$PhoneNum}'";
    $rs = $Link->query($sql1);
    if ($rows = mysqli_fetch_assoc($rs)) {
        exit("<script>alert('已申请');location.href = 'firstpage.html';</script>");
    }else {
        $sql = "INSERT INTO job_trustee_table(Job_Trustee_Id,CtgID,Trustee_Id,RsmID,TrusteeResume_Id) VALUES('{$PhoneNum}',{$CtgID},'{$PhoneNum}',{$RsmID},'{$PhoneNum}')
";
        $Link->query($sql);
        exit("<script>alert('申请成功');location.href = 'firstpage.html';</script>");
    }
}
?>