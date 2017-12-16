<?php
echo <<<eof
<form class="formpost" action="categoryinsertdo.php" method="post">
职位名称：<input type="text" name="categoryname" /><br />
薪资：<input type="text" name="salary" /><br />
职位要求：<br /><textarea rows="20" cols="50" name="textarea"></textarea>
<input type="submit" value="提交" />
</form>
eof;
?>