<?php
header("Content-type:text/html;Charset=utf8");//设定字符集
$conn=mysqli_connect("localhost","root","","xingdefu");
mysqli_set_charset($conn,'utf8');//设定字符集
echo $id=$_GET["id"];
if($conn){
	$sql="DELETE FROM yangdai WHERE id='$id' ";
	$que=mysqli_query($conn,$sql);
			if($que){
				echo "<script>alert('删除成功');location.href='feibiao-select.php'</script>";
			}else{
				die("删除失败".mysqli_connect_error());
			}



}
?>
