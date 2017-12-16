<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>register</title>
<style type="text/css">
body{
	margin:0px;
	padding:0px;
}
.div1{				/*最外面的div*/
	width:440px;
	height:460px;
}
.div2{				/*登录标题*/
	width:440px;
	height:30px;
	background-color:#CCC;
}
.div3{				/*登录主体*/
	width:440px;
	height:430px;
}
.div4{				/*手机号*/
	width:250px;
	height:35px;
	border:1px solid #939;
	background-color:#FFF;
	margin-top:50px;
}
.div5{				/*密码*/
	width:250px;
	height:35px;
	border:1px solid #939;
	background-color:#FFF;
	margin-top:30px;
}
.input1{				/*输入手机号*/
	height: 30px;
    width: 200px;
    font-size:20px;
    padding-left:10px;	
	border:0px;			/*不显示边框*/
	outline:none;		/*点击时不显示边框*/
}
.div7{				/*验证码*/
	width:250px;
	height:35px;
	border:1px solid #939;
	background-color:#FFF;
	margin-top:30px;
}
.input5{				/*输入验证码*/
	height: 33px;
    width: 100px;
    font-size:20px;
    padding-left:10px;	
    float:left;
	border:0px;			/*不显示边框*/
	outline:none;		/*点击时不显示边框*/
}
.imageCode{                  /*验证码图片*/
	height:35px;
	float:right;
}
.input2{				/*输入密码*/
	height: 30px;
    width: 200px;
    font-size:20px;
    padding-left:10px;	
	border:0px;			/*不显示边框*/
	outline:none;		/*点击时不显示边框*/
}
.div6{					/*登录重置按钮*/
	width:250px;
	height:50px;
	margin-top:50px;
}
.input3{				/*登录按钮*/
	width:100px;
	height:50px;
	float:left;
	cursor:pointer;
}
.input4{				/*重置按钮*/
	width:100px;
	height:50px;
	float:right;
	cursor:pointer;
}
.a1:link{						/*注册*/
	color:#39F;
	text-decoration:none;
	line-height:150px;			/*行内元素垂直移动*/
	/*padding-left:150px;		  行内元素水平移动*/
}
.a1:hover{						/*注册*/
	color:#39F;
	text-decoration:underline;
}
.a2:link{						/*打叉*/
	color:#333;
	text-decoration:none;
	line-height:150px;			/*行内元素垂直移动*/
	/*padding-left:150px;		  行内元素水平移动*/
}
.a2:hover{						/*打叉*/
	color:red;
	cursor:pointer;
}
</style>
<script type="text/javascript">
function close() {				//关闭div
	var div_5 = window.top.document.getElementById("div_5");
	var div_6 = window.top.document.getElementById("div_6");
	div_5.style.display = "none";
	div_6.style.display = "block";
}
function reloadCode() {			//刷新验证码
	document.getElementById("imageCode").src="readverify.php";
}
</script>
</head>

<body>
<center>
<div class="div1">
	<div class="div2">
    	<b>注册</b>
        <a class="a2" style="float:right;line-height:30px;padding-right:10px;" href="javascript:close()">X</a>
    </div>
    <div class="div3">
    <form action="registerafter.php?act=login" method="post">
    	<div class="div4">
        	<img style="float:left;" src="Images/people.png" />
    		<input class="input1" name="PhoneNum" type="text" placeholder="请输入手机号" /><br />
        </div>
        <div class="div5">
        	<img style="float:left;" src="Images/lock.png" />
    		<input class="input2" name="Password" type="password" placeholder="请输入密码" /><br />
        </div>
        <div class="div7">
        	<input class="input5" type="text" name="Verify" placeholder="验证码" />
        	<img class="imageCode" id="imageCode" onclick="javascript:reloadCode()" src="readverify.php" /><br />
        </div>
        <div class="div6">
        	<input class="input3" onclick="submit();" type="button" value="注册" />
            <input class="input4" type="reset" value="重置" />
            
        </div>
    </form>
    <a class="a1" href="login.php">已有账号？去登录一下吧</a>
    </div>
</div>
</center>
</body>
</html>
