<?php
session_start();
$Link = @mysqli_connect('localhost','root','123456') or die('数据库连接失败');
$Link->query('use jbj') or die('数据库选择失败');
$PhoneNum = $_POST['PhoneNum'];
$Password1 = $_POST['Password'];
$Password = md5($Password1);
$Verify = strtolower($_POST['Verify']);
$verifyCode = strtolower($_SESSION["verifyCode"]);
$sql = "select isBusiness from trusteeinfo_table where Trustee_Id = '{$PhoneNum}'";
$isBusiness = mysqli_fetch_assoc($Link->query($sql))['isBusiness'];
$act = $_GET['act'];
$flag1 = 0;//验证手机号是否存在
$flag2 = 0;//验证密码是否正确
$rs = $Link->query('select * from trustee_table');
switch($act) {
    case 'login':
        if($Verify !== $verifyCode) {
            exit("<script>alert('验证码输入错误，请重新输入！');location.href='login.php';</script>");
        }
        while($rows = @mysqli_fetch_array($rs)) {
            if($PhoneNum == $rows['Trustee_Phonenum']) {
                $flag1 = 1;
                if ($Password == $rows['Trustee_Password']) {
                    $flag2 = 1;
                    $_SESSION['PhoneNum'] = $PhoneNum;
                    $_SESSION['isLogin'] = 1;
                    $_SESSION['isBusiness'] = $isBusiness;
                }
            }
        }
        if($flag1 == 0) {
            exit("<script>alert('手机号输入错误，请重新输入！');location.href='login.php';</script>");
        }
        else if($flag1 == 1) {
            if ($flag2 == 0) {
                exit("<script>alert('密码输入错误，请重新输入！');location.href='login.php';</script>");
            }
            else if ($flag2 == 1) {
                //top.location.href是最外层页面跳转
                exit("<script>top.location.href = 'index.php';</script>");
            }
            
        }
        break;
    case 'logout':
        //将$_SESSION数据清空
        $_SESSION=[];
        //删除会话cookie
        if(ini_get('session.use_cookie')) {
            $params = session_set_cookie_params();
            setcookie(session_name(),'',time()-1,$params['path'],$params['domain'],$params['secure'],$params['httponly']);      
        }
        //销毁会话
        session_destroy();
        header('location:index.php');
        break;
}





?>
