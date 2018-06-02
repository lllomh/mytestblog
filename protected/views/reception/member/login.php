<div class='login'>
    <div class='login_title'>
        <span><?=Yii::app()->params['title']?></span>
    </div>
    <div class='login_fields'>
        <form method="post" name="form" action="<?=Yii::app()->createUrl('reception/member/do')?>">
        <div class='login_fields__user'>
            <div class='icon'>
                <img alt="" src='/images/user_icon_copy.png'>
            </div>
            <input name="user" placeholder='用户名' maxlength="16" type='text' autocomplete="off" value="<?=$data['user']?>"/>
            <div class='validation'>
                <img alt="" src='/images/tick.png'>
            </div>
        </div>
        <div class='login_fields__password'>
            <div class='icon'>
                <img alt="" src='/images/lock_icon_copy.png'>
            </div>
            <input name="pass"  placeholder='密码' value="<?=$data['pass']?>" maxlength="16" type='password' autocomplete="off">
            <div class='validation'>
                <img alt="" src='/images/tick.png'>
            </div>
        </div>
        <div class='login_fields__password'>
            <div class='icon'>
                <img alt="" src='/images/key.png'>
            </div>
            <input name="code" placeholder='验证码' maxlength="4" type='text'  autocomplete="off">
            <div class='validation' style="opacity: 1;top: 0">
                <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'curror:pointer'))); ?>
            </div>
        </div>
        <div class='login_fields__submit'>
            <input type='button' value='登录'>
        </div>
        </form>
    </div>
    <div class='success'>
    </div>
    <div class='disclaimer'>
        <p>1</p>
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
    var stats = <?=empty($data['stats'])?'0':$data['stats']?>;
    if(stats==305){
        layui.use('layer', function () {
            ErroAlert('验证码错误');
        });
    }else if(stats==400){
        layui.use('layer', function () {
            ErroAlert('密码错误');
        });
    }else if(stats==304){
        layui.use('layer', function () {
            ErroAlert('用户名不存在');
        });
    }

    $(document).keypress(function (e) {
        // 回车键事件
        if (e.which == 13) {
            $('input[type="button"]').click();
        }
    });
    //粒子背景特效
    $('body').particleground({
        dotColor: '#E8DFE8',
        lineColor: '#133b88'
    });

    $('input[name="pwd"]').focus(function () {
        $(this).attr('type', 'password');
    });
    $('input[type="text"]').focus(function () {
        $(this).prev().animate({ 'opacity': '1' }, 200);
    });
    $('input[type="text"],input[type="password"]').blur(function () {
        $(this).prev().animate({ 'opacity': '.5' }, 200);
    });
    $('input[name="login"],input[name="pwd"]').keyup(function () {
        var Len = $(this).val().length;
        if (!$(this).val() == '' && Len >= 5) {
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
    layui.use('layer', function () {
        //非空验证
        $('input[type="button"]').click(function () {
            var login = $('input[name="login"]').val();
            var pwd = $('input[name="pwd"]').val();
            var code = $('input[name="code"]').val();
            if (login == '') {
                ErroAlert('请输入您的账号');
            } else if (pwd == '') {
                ErroAlert('请输入密码');
            } else if (code == '' || code.length != 4) {
                ErroAlert('输入验证码');
            } else {
                $("form").submit();
            }
        })
    });

</script>








