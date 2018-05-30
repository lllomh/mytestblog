<!--SIGN UP-->
<h1>klasikal Login Form</h1>
<div class="login-form">
    <form name="form" method="post" action="<?=Yii::app()->createUrl('reception/member/do')?>" onsubmit="return Form(this)">
    <div class="close"> </div>
    <div class="head-info">
        <label class="lbl-1"> </label>
        <label class="lbl-2"> </label>
        <label class="lbl-3"> </label>
    </div>
    <div class="clear"> </div>
    <div class="avtar">
        <img src="/images/avtar.png" />
    </div>
        <input type="text" name="user" class="text" value="" placeholder="手机号或者邮箱">
        <div class="key">
            <input type="password" name="pass" placeholder="密码" value="">
            <div class="codes">
                <input class="code" name="code" placeholder="验证码" type="text" value="">
                <span class="date">
                <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'curror:pointer'))); ?>
                </span>
            </div>
        </div>
    <div class="signin">
        <input type="submit" value="Login" >
    </div>
    </form>
</div>

<div class="reg">还没有账号?<a href="#"> 注册</a></div>
<div class="copy-rights">
    <p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="#" target="_blank" title="took">took</a> - Collect from <a href="#" title="took" target="_blank">tkko</a></p>
</div>

<script>
    function Form(form) {
        var user =form.user.value;
        var pass =form.pass.value;
        var code =form.code.value;
    if(user == '' || pass == '' || code == ''){
        alert('账号密码不能为空');
        return false;
        }
    }
</script>