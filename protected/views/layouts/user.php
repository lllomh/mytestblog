<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <?php $module=mt_rand(100000,999999);?>
    <meta name="timestamp" content="<?php echo time();?>" />
    <meta name="token" content="<?php echo md5($module.'#$@%!^*'.time());?>" />

    <link rel="stylesheet" href="/css/reception/layui.css">
    <link rel="stylesheet" href="/css/reception/global.css">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="fly-header bg-img">
    <div class="layui-container">
        <a class="fly-logo" href="/">
            <img src="/images/reception/logo.png" alt="layui">
        </a>

        <ul class="layui-nav fly-nav-user">

            <?php
            $confun = CommFun::userIsLogin();
            if(!empty($confun)) :?>
                <!-- 登入的状态 -->
                <li class="layui-nav-item">
                    <a class="fly-nav-avatar" href="javascript:;">
                        <cite class="layui-hide-xs"><?=CommFun::getUserName()?></cite>
                        <i class="iconfont icon-renzheng layui-hide-xs" title="认证信息：layui 作者"></i>
                        <i class="layui-badge fly-badge-vip layui-hide-xs">VIP3</i>
                        <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg">
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="user/set.html"><i class="layui-icon">&#xe620;</i>基本设置</a></dd>
                        <dd><a href="user/message.html"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
                        <dd><a href="user/home.html"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
                        <hr style="margin: 5px 0;">
                        <dd><a href="<?=Yii::app()->createUrl('reception/member/out')?>" style="text-align: center;">退出</a></dd>
                    </dl>
                </li>
            <?php else:;?>
                <!-- 未登入的状态 -->
                <li class="layui-nav-item">
                    <a class="iconfont icon-touxiang layui-hide-xs" href="user/login.html"></a>
                </li>
                <li class="layui-nav-item">
                    <a href="<?=Yii::app()->createUrl('reception/member/login')?>">登入</a>
                </li>
                <li class="layui-nav-item">
                    <a href="<?=Yii::app()->createUrl('reception/member/register')?>">注册</a>
                </li>
                <li class="layui-nav-item layui-hide-xs">
                    <a href="/app/qq/" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" title="QQ登入" class="iconfont icon-qq"></a>
                </li>
                <li class="layui-nav-item layui-hide-xs">
                    <a href="/app/weibo/" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" title="微博登入" class="iconfont icon-weibo"></a>
                </li>


                <a href="<?=Yii::app()->createUrl('reception/member/login')?>">登录</a>
            <?php endif;?>

        </ul>
    </div>
</div>

<div class="layui-container fly-marginTop fly-user-main">
    <?php $this->beginWidget('application.widget.common.usercententLeft'); ?>
    <?php $this->endWidget(); ?>
    <?php echo $content; ?>
</div>

<script type="text/javascript" src="/assets/reception/rec_layui/layui.js"></script>
<script type="text/javascript">
    layui.config({
        version: "3.0.0"
        ,base: '/assets/reception/rec_layui/mods/' //这里实际使用时，建议改成绝对路径
    }).extend({
        fly: 'index'
    }).use('fly');
</script>
</body>
</html>