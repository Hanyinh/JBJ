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
if(!isset($_SESSION['isBusiness']) || $_SESSION['isBusiness'] != 1) {
    

?>
<div class="div1">
<form action="businessafter.php" method="post">
	是否要认证成为商家：
	<input type="radio" name="business" value="yes" checked="checked" />Yes
	<input type="radio" name="business" value="no" />No
	<br /><br /><input class="btn" type="submit" value="确定" />
</form>
</div>
<?php 
}else {
    exit("<script>location.href = 'businesscenter.html';</script>");
}
?>

</body>
</html>