<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<style>
		body{
			background-image: url(./images/backgrund.JPG);
		}
	.wujin{
	width: 100%;
	height: auto;

	}
	p{
		margin-top: 30px;
	}
	*{
		color: #000000;
	}
	</style>
	<body>
		<div class="wujin">
		<form method="POST" action="" name="frm" enctype="multipart/form-data" onsubmit="return foo();">
		 <p>请选择产品类型：
		 <select name="province" id="province">
			<option value="0">请选择袋子类型</option>
			<option value="五金">五金</option>
			<option value="颗粒">颗粒</option>
			<option value="粉剂">粉剂</option>
			<option value="液体">液体</option>
			<option value="糖果">糖果</option>
			<option value="药品">药品</option>
			<option value="内外袋">内外袋</option>
			<option value="不规则产品/生活用品/其他">不规则产品/生活用品/其他</option>



		</select>

		</p>

			<p><label for="file">选择第一张图片：</label>
			<input type="file" name="file1" id="file1" value=""/><p>
			<p><label for="file">选择第二张图片：</label>
			<input type="file" name="file2" id="file2" value=""/><p>
			<p><label for="file">选择第三张图片：</label>
			<input type="file" name="file3" id="file3" value=""/><p>
			<p><label for="file">选择第四张图片：</label>
			<input type="file" name="file4" id="file4" value=""/><p>
			<p><textarea cols="30" rows="5" name="content" id="content"></textarea></p>
			<p><input type="submit" value="提交"/></p>
		</from>
		<div>
	</body>
</html>
<script language="javascript">
	function foo(){
	if(frm.province.value=="0"){
		alert("请选择袋子类型");
		frm.province.focus();
		return false;
	}
	if(frm.file1.value==""){
		alert("请选择第一张图片");
		frm.city.focus();
		return false;
	}
	if(frm.file2.value==""){
		alert("请选择第二张图片");
		frm.city.focus();
		return false;
	}
	if(frm.file3.value==""){
		alert("请选择第三张图片");
		frm.city.focus();
		return false;
	}
	if(frm.file4.value==""){
		alert("请选择第四张图片");
		frm.city.focus();
		return false;
	}
	if(frm.content.value==""){
		alert("内容不能为空");
		frm.content.focus();
		return false;
	}

	}
</script>
<?php
include './conn.php';
// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp1 = explode(".", $_FILES["file1"]["name"]);
$temp2 = explode(".", $_FILES["file2"]["name"]);
$temp3 = explode(".", $_FILES["file3"]["name"]);
$temp4 = explode(".", $_FILES["file4"]["name"]);
$_FILES["file1"]["size"];
$_FILES["file2"]["size"];
$_FILES["file3"]["size"];
$_FILES["file4"]["size"];
$extension1 = end($temp1);
$extension2 = end($temp2);
$extension3 = end($temp3);
$extension4 = end($temp4);      // 获取文件后缀名
if (
	  (
		   ($_FILES["file1"]["type"] == "image/gif")
		|| ($_FILES["file1"]["type"] == "image/jpeg")
		|| ($_FILES["file1"]["type"] == "image/jpg")
		|| ($_FILES["file1"]["type"] == "image/pjpeg")
		|| ($_FILES["file1"]["type"] == "image/x-png")
		|| ($_FILES["file1"]["type"] == "image/png")
		//第二个文件
		|| ($_FILES["file2"]["type"] == "image/gif")
		|| ($_FILES["file2"]["type"] == "image/jpeg")
		|| ($_FILES["file2"]["type"] == "image/jpg")
		|| ($_FILES["file2"]["type"] == "image/pjpeg")
		|| ($_FILES["file2"]["type"] == "image/x-png")
		|| ($_FILES["file2"]["type"] == "image/png")
		//第三个文件
		|| ($_FILES["file3"]["type"] == "image/gif")
		|| ($_FILES["file3"]["type"] == "image/jpeg")
		|| ($_FILES["file3"]["type"] == "image/jpg")
		|| ($_FILES["file3"]["type"] == "image/pjpeg")
		|| ($_FILES["file3"]["type"] == "image/x-png")
		|| ($_FILES["file3"]["type"] == "image/png")
		//第四个文件
		|| ($_FILES["file4"]["type"] == "image/gif")
		|| ($_FILES["file4"]["type"] == "image/jpeg")
		|| ($_FILES["file4"]["type"] == "image/jpg")
		|| ($_FILES["file4"]["type"] == "image/pjpeg")
		|| ($_FILES["file4"]["type"] == "image/x-png")
		|| ($_FILES["file4"]["type"] == "image/png")
	  )
		&& ($_FILES["file1"]["size"] < 204800)   // 小于 200 kb
		&& in_array($extension1, $allowedExts)
		//第二个文件
		&& ($_FILES["file2"]["size"] < 204800)   // 小于 200 kb
		&& in_array($extension2, $allowedExts)
		//第三个文件
		&& ($_FILES["file3"]["size"] < 204800)   // 小于 200 kb
		&& in_array($extension3, $allowedExts)
		//第四个文件
		&& ($_FILES["file4"]["size"] < 204800)   // 小于 200 kb
		&& in_array($extension4, $allowedExts)
	)
{
    if (($_FILES["file1"]["error"] > 0) && ($_FILES["file2"]["error"] > 0) &&($_FILES["file3"]["error"] > 0) &&($_FILES["file4"]["error"] > 0))
    {
        echo "错误：: " . $_FILES["file1"]["error"] . "<br>";
        echo "错误：: " . $_FILES["file2"]["error"] . "<br>";
        echo "错误：: " . $_FILES["file3"]["error"] . "<br>";
        echo "错误：: " . $_FILES["file4"]["error"] . "<br>";
    }
    else
    {
		//更换图片的名字
		$date=date('Ymdhis');
		$newName1=$date ."yang1" . '.' . $temp1[1];
		$newName2=$date ."yang2" . '.' . $temp2[2];
		$newName3=$date ."yang3" . '.' . $temp3[3];
		$newName4=$date ."yang4" . '.' . $temp4[4];
		$oldName1=$_FILES["file1"]["name"];
		$oldName2=$_FILES["file2"]["name"];
		$oldName3=$_FILES["file3"]["name"];
		$oldName4=$_FILES["file4"]["name"];
		rename($oldName1,$newName1);
		rename($oldName2,$newName2);
		rename($oldName3,$newName3);
		rename($oldName4,$newName4);
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if ((file_exists("upload/" . $newName1)) && (file_exists("upload/" . $newName2)) &&(file_exists("upload/" . $newName3)) && (file_exists("upload/" . $newName4)))
        {
            echo $_FILES["file1"]["name"] . " 第一张图片已经存在，请重新选择不同名称的图片 ";
            echo $_FILES["file2"]["name"] . " 第二张图片已经存在，请重新选择不同名称的图片 ";
            echo $_FILES["file3"]["name"] . " 第三张图片已经存在，请重新选择不同名称的图片 ";
            echo $_FILES["file4"]["name"] . " 第四张图片已经存在，请重新选择不同名称的图片 ";
        }
        else
        {
			// 把文件移动到upload文件夹下
			move_uploaded_file($_FILES["file1"]["tmp_name"], "upload/" . $newName1);
			move_uploaded_file($_FILES["file2"]["tmp_name"], "upload/" . $newName2);
			move_uploaded_file($_FILES["file3"]["tmp_name"], "upload/" . $newName3);
			move_uploaded_file($_FILES["file4"]["tmp_name"], "upload/" . $newName4);
       
		$time=date("Y-m-d H:i:s");//时间
		$zhonleixin=$_POST['province'];//包装机的类型
		$photo1= "upload/" . $newName1;
		$photo2= "upload/" . $newName2;
		$photo3= "upload/" . $newName3;
		$photo4= "upload/" . $newName4;
         $jiesou=$_POST['content'];//产品介绍
			if($conn){
					if ($_POST['content']!=null ){
						$sql="insert into   yangdai(
cre_time,type,URL1,URL2,URL3,URL4,Details) values ('$time',' $zhonleixin','$photo1','$photo2','$photo3','$photo4','$jiesou')";
						$que=mysqli_query($conn,$sql);//ִ执行SQL语句
						if($que){
							echo "<script>alert('添加成功');location.href='http://localhost:8080/lena/xindefu/xindefu-du-h-du/member-fenlei-yangdai.php'</script>";
						}else{
							die("数据库链接失败".mysqli_connect_error());
						}
					}
			}
			//插入
        }
    }
}
?>
