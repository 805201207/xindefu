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
// 发送邮件
/*发送邮件方法
 *@param $to：接收者 $title：标题 $contents：邮件内容
 *@return bool true:发送成功 false:发送失败
 */
function sendMail($to,$title,$contents) {
    // 这个PHPMailer 就是之前从 Github上下载下来的那个项目
    require './PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    //使用smtp鉴权方式发送邮件
    $mail->isSMTP();
    //smtp需要鉴权 这个必须是true
    $mail->SMTPAuth = true;
    // qq 邮箱的 smtp服务器地址，这里当然也可以写其他的 smtp服务器地址
    $mail->Host = 'smtp.qq.com';
    //smtp登录的账号 这里填入字符串格式的qq号即可
    $mail->Username = '805201207@qq.com';
    // 这个就是之前得到的授权码，一共16位
    $mail->Password = 'jrzgmzsvoshabgae';
    $mail->setFrom('805201207@qq.com', 'send_user_name');
    // $to 为收件人的邮箱地址，如果想一次性发送向多个邮箱地址，则只需要将下面这个方法多次调用即可
    $mail->addAddress($to);
    // 该邮件的主题
    $mail->Subject = $title;
    // 该邮件的正文内容
    $mail->Body = $contents;

    // 使用 send() 方法发送邮件
    if(!$mail->send()) {
        return '发送失败: ' . $mail->ErrorInfo;
    } else {
        return "发送成功";
    }
}

// 调用发送方法，并在页面上输出发送邮件的状态
var_dump(sendMail('805201207@qq.com',$name,'姓名：'.$name.' 性别：'.$sex.' 手机号码'.$shj.' 电话号码：'.$dianhua.' 传真：'.$chuanzhen.' 地址：'.$address.' 留言内容：'.$content));
//邮件发送完成
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