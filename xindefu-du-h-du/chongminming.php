<form method="POST" action="" name="frm" enctype="multipart/form-data" onsubmit="return foo();">
			<p><label for="file">选择图片：</label>
			<input type="file" name="file1" id="file1" value=""/><p>
			<input type="submit" value="提交">
		</from>
		
<?php
echo $date=date('Ymdhis');
echo $filename=$_FILES['file1']['name'];
echo $name=explode('.',$filename);
echo $newPath=$date . '.' . $name[1];
 $oldPath=$_FILES['file1']['tmp_name'];
rename($oldPath,$newPath);
echo $newPath;
?>