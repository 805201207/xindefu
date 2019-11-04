<?php
header("Content-type:text/html;Charset=utf8");//设定字符集
$conn=mysqli_connect("localhost","root","","xingdefu");
mysqli_set_charset($conn,'utf8');//设定字符集
$content=$_POST['liuyuan'];
$time=date("Y-m-d H:i:s");
$name=$_POST['xinming'];
$sex=$_POST['sex'];
$shj=$_POST['shj'];
$dianhua=$_POST['dianhua'];
$chuanzhen=$_POST['chuanzhen'];
$address=$_POST['address'];
if($conn){
        $sql="insert into xinxibiao(time,Content,Name,sex,sjhao,dhhao,chuanzhen,address) values 
                ('$time','$content','$name','$sex','$shj','$dianhua','$chuanzhen','$address')";
        $que=mysqli_query($conn,$sql);//ִ执行SQL语句
        if($que){
            echo "<script>alert('您的信息已经提交，我们会在第一时间联系您');location.href='liangxiwomen.html'</script>";
        }else{
            die("数据库链接失败".mysqli_connect_error());
    }

}
?>