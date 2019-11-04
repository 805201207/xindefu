<?php
header("Content-type:text/html;Charset=utf8");//设定字符集
$conn=mysqli_connect("localhost","root","","xingdefu");
mysqli_set_charset($conn,'utf8');//设定字符集
$id=$_GET["id"];
$sql="select id,title,cre_time,content from news where id='$id'";
	$que=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($que);
	$title=$row['title'];
	$content=$row['content'];
	$url=$row['url'];
?>
<!DOCTYPE>
<html>
<head>
<meta  charset="utf-8">
<title>修改新闻页</title>
<style>
	body{
		background-image: url(./images/backgrund.JPG);
	}
</style>
</head>
<body>
<form method="POST" action="" name="myform" onsubmit="return foo();" enctype="multipart/form-data">
	<h1>修改新闻</h1>
	<p>标题⣺<input type="text" name="title" id="title" value="<?php echo $title ?>"/></p>
	<p><label for="file">请重新选择图片：</label>
	<input type="file" name="file" id="file"/><p>
	<p><textarea cols="30" rows="5" name="content" id="content"><?php echo $content ?></textarea></p>
	<p><input type="submit" value="提交"/></p>
</form>
</body>
</html>
<script>
	function foo(){
	if(myform.file.value==""){
	alert("请重新选择图片");
	myform.file.focus();
	return false;
	}
	}
</script>
<?php
// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            //获取文件的路径
            $time=date("Y-m-d H:i:s");
            $photo= "upload/" . $_FILES["file"]["name"];
            $title=$_POST['title'];
			$content=$_POST['content'];
			$time=date("Y-m-d H:i:s");
			if($conn){
					if ( $_POST['title']!=null && $_POST['content']!=null ){
						$sql="update news set title='$title',cre_time='$time',content='$content',url='$photo' where id='$id'";
						$que=mysqli_query($conn,$sql);//ִ执行SQL语句
						if($que){
							echo "<script>alert('新闻修改成功，返回新闻列表页');location.href='member-fenlei-xinwen.php'</script>";
						}else{
							die("数据库链接失败".mysqli_connect_error());
						}
					}
			}
			//插入新闻
        }
    }
}
?>
<script>
	function foo(){
	if(myform.title.value==""){
	alert("标题不能为空");
	myform.title.focus();
	return false;
	}
	if(myform.content.value==""){
		alert("内容不能为空");
		myform.content.focus();
		return false;
	}
	}
</script>

