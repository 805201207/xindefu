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
		 <select name="province" id="province" onchange="getCity()">
			<option value="0">请选择五金包装机类型</option>
			<option value="立式称重包装机">立式称重包装机</option>
			<option value="点数定位包装机">点数定位包装机</option>
			<option value="水平枕式包装机">水平枕式包装机</option>
		</select>
		<select id="city" name="city">
			<option value="0">请选择包装机的子类型</option>
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
		alert("请选择五金包装机类型");
		frm.province.focus();
		return false;
	}
	if(frm.city.value=="0"){
		alert("请选择五金包装机子类型");
		frm.city.focus();
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
<script language="JavaScript" type="text/javascript">
var city=[
["称重补重自动包装机","称重补点数自动包装机","1-2头称自动包装机","4-6头称自动包装机"],
["1-2盘自动包装机","3-4盘自动包装机","带拖斗自动包装机","带皮带自动包装机"],
["上走纸半自动包装机","下走纸半自动包装机"]

];
function getCity(){
var sltProvince=document.getElementById("province");
var sltCity=document.getElementById("city");
var provinceCity=city[sltProvince.selectedIndex-1];
sltCity.length=1;
for(var i=0;i<provinceCity.length;i++){
sltCity[i+1]=new Option(provinceCity[i],provinceCity[i]);
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
		$newName1=$date ."wu1" . '.' . $temp1[1];
		$newName2=$date ."wu2" . '.' . $temp2[2];
		$newName3=$date ."wu3" . '.' . $temp3[3];
		$newName4=$date ."wu4" . '.' . $temp4[4];
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
            echo $newName1 . " 第一张图片已经存在，请重新选择不同名称的图片 ";
            echo $newName2 . " 第二张图片已经存在，请重新选择不同名称的图片 ";
            echo $newName3 . " 第三张图片已经存在，请重新选择不同名称的图片 ";
            echo $newName4 . " 第四张图片已经存在，请重新选择不同名称的图片 ";
        }
        else
        {	
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file1"]["tmp_name"], "upload/" . $newName1);
            move_uploaded_file($_FILES["file2"]["tmp_name"], "upload/" . $newName2);
            move_uploaded_file($_FILES["file3"]["tmp_name"], "upload/" . $newName3);
            move_uploaded_file($_FILES["file4"]["tmp_name"], "upload/" . $newName4);
             
		 $time=date("Y-m-d H:i:s");//时间
		 $zhonleixin=$_POST['province'];//包装机的类型
		 $zileixin=$_POST['city'];//五金包装机子类型
		 $photo1= "upload/" . $newName1;//获取文件的路径
         $photo2= "upload/" . $newName2;
         $photo3= "upload/" . $newName3;
         $photo4= "upload/" . $newName4;
         $jiesou=$_POST['content'];//产品介绍
			if($conn){
					if ($_POST['content']!=null ){
						$sql="insert into  wujinbiao(
cre_time,TotalModel,Subtype,URL1,URL2,URL3,URL4,Details) values ('$time','$zhonleixin','$zileixin','$photo1','$photo2','$photo3','$photo4','$jiesou')";
						$que=mysqli_query($conn,$sql);//ִ执行SQL语句
						if($que){
							echo "<script>alert('添加成功');location.href='http://localhost:8080/lena/xindefu/xindefu-du-h-du/member-fenlei-wujin.php';</script>";
						}else{
							die("数据库链接失败".mysqli_connect_error());
						}
			}
			//插入
			}
        }
    }
}
?>



