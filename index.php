<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home_page</title>
<style type="text/css">
*{
	margin:0px;
	padding:0px;
}
.header{
	position:fixed;
	border:1px solid red;	
}
.div1{					/*兼并兼和图像*/
	width:200px;
	height:75px;
	position:relative;
	margin-left:70px;
	float:left;
}
.img1{
	margin-top:10px;
	border-radius:25px;/*让图片以圆形方式显示*/
	box-shadow:15px -0px 15px 1px #666666;	/*盒子阴影*/
}
.div2{
	width:100px;
	float:right;
	margin-right:30px;
	cursor:pointer;
	line-height:70px;/* 兼并兼 调高低*/
	text-shadow:15px -5px 2px  #666666;		/*文字阴影*/
}
.div3 {					/*注册登录*/
	height: 75px;
	width: 200px;
	position: absolute;
	right:0px;
	top: 0px;
	line-height:75px;
}
.firstpage:link{					/*首页*/
	text-decoration:none;
}
.firstpage:hover{					/*首页*/
	text-decoration:underline;
	
}
.firstpage{					/*首页*/
	font-size:18px;
	cursor:pointer;
}
.lore:link{					/*注册登录*/
	text-decoration:none;
	font-size:18px;
}
.lore:hover{					/*注册登录*/
	text-decoration:underline;
	
}
.div4{					/*菜单栏*/
	float:left;
	width:700px;
	height:75px;
}
.div5{				/*frame界面iv*/
	width:440px;
	height:460px;
	border:5px solid #939;
	margin-top:25px;	
	display:none;			/*两种隐和显示藏div方法*/
}
.input1{						/*查询text*/
	width:400px;
	height:40px;
	font-size:20px;
	margin-top:15px;
	margin-left:100px;
	padding-left:10px;
}
.input2{						/*查询button*/
	width:100px;
	height:46px;
	font-size:20px;
	cursor:pointer;	
	
}
.input2:hover{
	box-sizing:border-box;		/*加边框*/
	border:rgba(0,255,153,0.2) solid 10px;
}
.div6{
	display:block;
	float:right;
	border-left:double 5px red;
}
.NavationBar{					/*导航栏*/
	width:600px;
	height:50px;
	list-style-type:none;		/*去除ul前面的点*/
}
.NavationBar li{
	margin-top:10px;
	line-height:50px;
	width:99px;
	float:left;	
}
.NavationBar li a{
	text-decoration:none;
	display:block;
}
.NavationBar li a:hover{
	transform:scale(1.3,1.3);	/*缩放*/
}
.div7{
	width:40px;
	height:500px;
	position:absolute;
}
.cana{
	 color:#FF9;
	 text-decoration:none;
}
.cana:hover{
	text-decoration:underline;
}
</style>
<script type="text/javascript">
window.onload = function(){
	var header = document.getElementById("header");
	var div_6 = document.getElementById("div_6");
	var iframe2 = document.getElementById("iframe2");
	header.style.width = window.innerWidth;
	header.style.height = "75px";
	div_6.style.width = window.innerWidth;
	iframe2.width = window.innerWidth - 50;
	iframe2.height = window.innerHeight - 150;
}
function open() {				//显示div
	var div_5 = document.getElementById("div_5");
	var div_6 = document.getElementById("div_6");
	document.getElementById("iframe1").src = "login.php";//每次打开都是指定地址
	div_5.style.display = "block";
	div_6.style.display = "none";
}
</script>
</head>

<body>
<div class="header1" id="header" style="background-color:#999;">
	<div class="div1">
		<img class="img1" src="Images/jbj.jpg" width="50" height="50"  />
    	<div class="div2">
        	<h1>兼并兼</h1>
        </div>
        
	</div>
    <div class="div4">
    	<form action="query.php" method="get" target="bodyframe">
        	<input class="input1" type="text" name="value" placeholder="请输入职位名称或者公司名称" />
            <input class="input2" type="submit" value="查询" />
        </form>
    </div>
  <div class="div3">
    	<div style="width:40px;float:left;"><a class="firstpage" href="firstpage.html" target="bodyframe" style="color:#FF9;">首页</a></div>
    	<?php 
    	   if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin']!=1 || !isset($_SESSION['PhoneNum'])) {
    	?>
    			<div class="registerlogin" id="registerlogin" style="width:150px;float:right;"><a class="lore" style="color:#FF9;" href="javascript:open()" target="newframe">注册登录</a></div>	
   		<?php    
    	   }else {
    	?>
    			<div class="cancellation" id="cancellation" style="width:150px;float:right;"><?php echo $_SESSION['PhoneNum'];?><a class="cana" href="loginafter.php?act=logout">/注销</a></div>	
    	<?php 
    	   }
    	?>
    	 
   		
    </div>
	
</div>
<center>
<ul class="NavationBar">
        <li><a href="personal.php" target="bodyframe">个人中心</a></li>
        <li><a href="resume1.php" target="bodyframe">我的简历</a></li>
    	<li><a href="history1.php"  target="bodyframe">历史求职</a></li>
        <li><a href="business1.php"  target="bodyframe">商家中心</a></li>
        <li><a href="company1.php"  target="bodyframe">我的公司</a></li>
        <li><a href="category1.php"  target="bodyframe">发布兼职</a></li>
</ul>
</center>
<div class="div7">
	<marquee width="100%" height="100%" style="font-size:23px;margin-left:8px; color:#C0C;" direction="up">欢迎来到兼并兼</marquee>

</div>
<center>
<div class="div5" id="div_5">
	<iframe id="iframe1" frameborder="0" scrolling="no" name="newframe" src="login.php" height="460" width="440"></iframe>
</div>

<div class="div6" id="div_6">
	<iframe id="iframe2" frameborder="0" name="bodyframe" src="firstpage.html"></iframe>
</div>
</center>

</body>
</html>
