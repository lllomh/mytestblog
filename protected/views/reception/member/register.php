<div class='login'>
    <div class='login_title'>
        <span><?=Yii::app()->params['title']?></span>
    </div>
    <div class='login_fields'>
            <div class='login_fields__user'>
                <div class='icon'>
                    <img alt="" src='/images/loginRegStem/user_icon_copy.png'>
                </div>
                <input name="user" placeholder='用户名,支持中英文数字[唯一]' maxlength="16" type='text' autocomplete="off" value=""/>
                <div class='validation'>
                    <img alt="" src='/images/loginRegStem/tick.png'>
                </div>
            </div>
            <div class='login_fields__password'>
                <div class='icon'>
                    <img alt="" src='/images/loginRegStem/user_icon_copy.png'>
                </div>
                <input name="email"  placeholder='邮件地址' value="" type='text' autocomplete="off">
                <div class='validation'>
                    <img alt="" src='/images/loginRegStem/tick.png'>
                </div>
            </div>
            <div class='login_fields__password'>
                <div class='icon'>
                    <img alt="" src='/images/loginRegStem/lock_icon_copy.png'>
                </div>
                <input name="pass1"  placeholder='密码' value="" maxlength="16" type='password' autocomplete="off">
                <div class='validation'>
                    <img alt="" src='/images/loginRegStem/tick.png'>
                </div>
            </div>
            <div class='login_fields__password'>
                <div class='icon'>
                    <img alt="" src='/images/loginRegStem/lock_icon_copy.png'>
                </div>
                <input name="pass2"  placeholder='密码' value="" maxlength="16" type='password' autocomplete="off">
                <div class='validation'>
                    <img alt="" src='/images/loginRegStem/tick.png'>
                </div>
            </div>
            <div class='login_fields__password'>
                <div class='icon'>
                    <img alt="" src='/images/loginRegStem/key.png'>
                </div>
                <input name="code" placeholder='验证码' maxlength="4" type='text'  autocomplete="off">
                <div class='validation' style="opacity: 1;top: 0">
                    <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'curror:pointer'))); ?>
                </div>
            </div>
            <div class='login_fields__submit'>
                <input class="loggin" type='button' value='登录'>
                <input style="color: white;background: #4FA1D9;" class="reg" type='button' value='注册'>
            </div>

    </div>
    <div class='success'>
    </div>
    <div class='disclaimer'>
        <p></p>
    </div>
</div>
<div class='authent'>
    <div class="loader" style="height: 44px;width: 44px;margin-left: 28px;">
        <div class="loader-inner ball-clip-rotate-multiple">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<div class="OverWindows"></div>

<link href="/assets/reception/layui/css/layui.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/assets/reception/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/reception/js/jquery-ui.min.js"></script>
<script type="text/javascript" src='/assets/reception/js/stopExecutionOnTimeout.js?t=1'></script>
<script type="text/javascript" src="/assets/reception/layui/layui.js"></script>
<script type="text/javascript" src="/assets/reception/js/Particleground.js"></script>
<script type="text/javascript" src="/assets/reception/js/Treatment.js"></script>
<script type="text/javascript" src="/assets/reception/js/jquery.mockjax.js"></script>
<script type="text/javascript">


    $(document).keypress(function (e) {
        // 回车键事件
        if (e.which == 13) {
            $('.reg').click();
        }
    });
    $(".loggin").click(function () {
        window.location.href='<?=Yii::app()->createUrl('reception/member/login')?>';
    });
    //粒子背景特效
    $('body').particleground({
        dotColor: '#E8DFE8',
        lineColor: '#133b88'
    });


    $('input[type="password"],input[type="text"]').focus(function () {
        $(this).prev().animate({ 'opacity': '1' }, 200);
    });
    $('input[type="text"],input[type="password"]').blur(function () {
        $(this).prev().animate({ 'opacity': '.5' }, 200);
    });
    $('input[name="user"],input[name="pass1"],input[name="pass2"]').keyup(function () {
        var Len = $(this).val().length;
        if (!$(this).val() == '' && Len >= 20) {
            $(this).next().animate({
                'opacity': '1',
                'right': '30'
            }, 200);
        } else {
            $(this).next().animate({
                'opacity': '0',
                'right': '20'
            }, 200);
        }
    });

        //非空验证

         $('.reg').click(function () {
             var login = $('input[name="user"]').val();
             var pwd1 = $('input[name="pass1"]').val();
             var pwd2 = $('input[name="pass2"]').val();
             var email = $('input[name="email"]').val();
             var code = $('input[name="code"]').val();
             if (login == '') {
                 layui.use('layer', function () {
                     ErroAlert('请输入您的账号');
                 });
             }else if(email== ''){
                 layui.use('layer', function () {
                     ErroAlert('请输入邮箱地址');
                 });
             }else if (pwd1 == '') {
                 layui.use('layer', function () {
                     ErroAlert('请输入密码');
                 });
             }else if (pwd2 == '') {
                 layui.use('layer', function () {
                     ErroAlert('请输入密码');
                 });
             } else if (code == '' || code.length != 4) {
                 layui.use('layer', function () {
                     ErroAlert('输入验证码');
                 });
             }else if(pwd1!=pwd2){
                 layui.use('layer', function () {
                     ErroAlert('2次密码不一致');
                 });
             }else {

                 $.ajax({
                     url: "<?=Yii::app()->createUrl('reception/member/reg')?>",
                     type: 'post',
                     data: {user:login,pass1:pwd1,email:email,code:code},
                     dataType: 'JSON',
                     success: function (data)
                     {
                        if(data.ststus==200){
                            layui.use('layer', function () {
                                ErroAlert('注册成功,并已向您邮箱发送激活邮件,请尽快去激活!马上跳转到登录页');
                            });

                            setTimeout(function () {
                                window.location.href='<?=Yii::app()->createUrl('reception/member/login')?>';
                            },4000)
                        }else {
                            layui.use('layer', function () {
                                ErroAlert(data.ststus);
                            });
                        }

                     },
                     error:function (error) {
                         alert(error);
                     }
                 });
             }
         });


</script>








