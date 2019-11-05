<?php
$host = "localhost";
$username = 'root';
$password = '';
$db = 'xingdefu';
//连接数据库
$conn = mysql_connect($host, $username, $password);
if(!$conn){
    echo "数据库连接失败";
    exit;
}

//选择所要操作的数据库
mysql_select_db($db);
//设置数据库编码格式
mysql_query('SET NAMES UTF8');
$username=$_POST['username'];
$password=$_POST['password'];
$sql = "SELECT * FROM user";
//把sql语句传送到数据库
$result = mysql_query($sql);
//处理我们的数据
while($row = mysql_fetch_assoc($result)){
   
    $user=$row['username'];
	$pwd=$row['pwd'];
	if($username==$user && $password==$pwd){
		echo "<script>alert('登录成功');location.href='http://localhost:8080/lena/xindefu/xindefu-du-h-du/index.html'</script>";
	}else{
		echo "<script>alert('登录失败');location.href='http://localhost:8080/lena/xindefu/xindefu-du-h-du/login.php'</script>";
	}
    }
    ?>