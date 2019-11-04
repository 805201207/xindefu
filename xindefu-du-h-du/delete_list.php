<?php
header("Content-type:text/html;Charset=utf8");//设定字符集
$conn=mysqli_connect("localhost","root","","xingdefu");
mysqli_set_charset($conn,'utf8');//设定字符集
$id=$_GET['id'];
if($conn){
	$sql="DELETE FROM news WHERE id='$id' ";
	$que=mysqli_query($conn,$sql);
			if($que){
				echo "<script>alert('删除成功');location.href='http://localhost:8080/lena/xindefu/xindefu-du-h-du/member-fenlei-xinwen.php'</script>";
			}else{
				die("删除失败".mysqli_connect_error());
			}



}
?>