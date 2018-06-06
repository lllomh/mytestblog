
<html>

<head>
    <meta charset="UTF-8"/>
    <title></title>
</head>
<body>
<?php


//
//$str='我的是我';
//
//if(preg_match('/^[a-zA-Z0-9\x{4e00}-\x{9fa5}]+$|^[a-zA-Z0-9\x{4e00}-\x{9fa5}][a-zA-Z0-9_\s\ \x{4e00}-\x{9fa5}\.]*[a-zA-Z0-9\x{4e00}-\x{9fa5}]+$/u',$str)){
//    echo "符合验证规则";
//}else{
//    echo "不符合验证规则";
//}
//
//$pwd = '3434fdfd<>';
//if (strlen($pwd)>30 || strlen($pwd)<6)
//{
//    echo "密码必须为6-30位的字符串";
//}
//if(preg_match("/^\d*$/",$pwd))
//{
//    echo "密码必须包含字母,强度:弱";//全数字
//}
//if(preg_match("/^[a-z]*$/i",$pwd))
//{
//    echo "密码必须包含数字,强度:中";//全字母
//}
//if(!preg_match("/^[a-z\d]*$/i",$pwd))
//{
//    echo "密码只能包含数字和字母,强度:强";//有数字有字母 ";
//}
//
//

include("connect.php");
$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();
$query = mysql_query("select id,token_exptime from t_user where status='0' and `token`='$verify'");
$row = mysql_fetch_array($query);
if($row){
    if($nowtime>$row['token_exptime']){ //30min
        $msg = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.';
    }else{
        mysql_query("update t_user set status=1 where id=".$row['id']);
        if(mysql_affected_rows($link)!=1) die(0);
        $msg = '激活成功！';
    }
}else{
    $msg = 'error.';
}
echo $msg;











?>

<script>
    //'数字(0-9)、字母(a-z和A-Z)、汉字、下划线(_)、圆点(.)和空格'
    var pattern = /[A-Za-z0-9_\-\u4e00-\u9fa5]+/,
        str = "555<script>";
    alert(pattern.test(str));
</script>
</body>
</html>