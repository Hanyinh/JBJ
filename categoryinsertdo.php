<?php
session_start();
$PhoneNum = $_SESSION['PhoneNum'];
$categoryname = $_POST['categoryname'];
$salary = $_POST['salary'];
$textarea = $_POST["textarea"];
$link = mysqli_connect('localhost','root','123456') or die("数据库连接失败");
$link->query('use jbj') or die("数据库选择失败");
$sql = "INSERT INTO category_table(Category_Id,categoryName,Salary,Information) VALUES('{$PhoneNum}','{$categoryname}','{$salary}','{$textarea}')";
$link->query($sql);
exit("<script>location.href='category.html';</script>");
?>