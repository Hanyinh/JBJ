<?php
session_start();
$PhoneNum = $_SESSION['PhoneNum'];


?>
<form class="insertInfo" action="resumeafterdo.php" method="post">
	<textarea class="txtarea" rows="20" cols="50" name="txtarea"></textarea>
	<input type="submit" value="提交" />
</form>