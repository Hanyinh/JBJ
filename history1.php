<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style type="text/css">
.div1{
	width:300px;
	margin:100px auto;
	font-size:16px;
	color:green;
}
.btn{
	cursor:pointer;
}
</style>
</head>
<body>
<?php 
if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin']!=1 || !isset($_SESSION['PhoneNum'])) {
    exit("<script>alert('请先登录');location.href = 'firstpage.html';</script>");
?>	
<?php 
}else {
    exit("<script>location.href = 'history.html';</script>");
}
?>

</body>
</html>