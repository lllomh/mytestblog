<?php $hostUrl = Yii::app()->request->getHostInfo();?>
<?php $lan=Yii::app()->session['language']; ?>
<!--  footer start  -->
<link type="text/css" rel="stylesheet" href="<?php echo $hostUrl;?>/css/<?php echo $lan; ?>/Foot.css?v=<?php echo Yii::app()->params['version']['CSS'];?>"/>
<link href="<?=Yii::app()->request->getHostInfo()?>/assets/js/popup/showBo.css?v=<?php echo Yii::app()->params['version']['CSS'];?>" rel="stylesheet" type="text/css"/>
<script src="<?=Yii::app()->request->getHostInfo()?>/assets/js/popup/showBo.js?v=<?php echo Yii::app()->params['version']['JS'];?>" type="text/javascript"></script>
<div class="clar"></div>
<div class="footer">
    <div class="width_1100">
        <div class="doort">
            <ul class="firfsgsg">
                <!--<li class="zedmopwsd"><a href="index.php"><?php /*echo Yii::t('app', 'home');*/?></a> </li>
                <li><a href="<?php /*echo Yii::app()->createUrl('news/news/xsrm'); */?>"><?php /*echo Yii::t('app', 'xinshourumen');*/?></a> </li>
                <li><a href="<?php /*echo Yii::app()->createUrl("news/news/hzhb"); */?>"><?php /*echo Yii::t('app', 'partners');*/?></a></li>
                <li><a href="<?php /*echo Yii::app()->createUrl("news/news/low"); */?>"><?php /*echo Yii::t('app', 'Legal_Notices');*/?></a></li>
                <li><a href="<?php /*echo Yii::app()->createUrl("news/news/aboutus"); */?>"><?php /*echo Yii::t('app', 'aboutus');*/?></a></li>
                <li><a href="<?php /*echo Yii::app()->createUrl("news/news/connectus"); */?>"><?php /*echo Yii::t('app', 'contactus');*/?></a></li>-->
            </ul>
            <div class="clar"></div>
            <div class="csiaydwf">
                <span>
                    <?php echo Yii::t('app', 'Complaints_Hotline');?> &nbsp;&nbsp;
                    <?php echo Yii::t('app', 'Complaints_Email');?> &nbsp;&nbsp;
                    <?php echo Yii::t('app', 'Complaints_Wechat');?>
                </span>
                <br>
                <br>
                Copyright &copy; 2002-2015 <?php echo Yii::t('app', 'ourcompany');?> <?php echo Yii::t('app', 'copyright');?>
            </div>
        </div>
    </div>
    <div class="zcc" style="text-align: center;">
        <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261069146'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/stat.php%3Fid%3D1261069146%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
    </div>
</div>  
<!--  footer end  -->
<script src="<?=Yii::app()->request->getHostInfo()?>/assets/js/tracker.js" type="text/javascript"></script>
<?php
    $userInfo = CommFun::userIsLogin();
    if(!empty($userInfo))
    {
        $user_id = $userInfo['user_id'];
    }
    else
    {
        $user_id = '';
    }
?>
<script type="text/javascript">

    try {
        var st = new SiteTracker("twusa");
        st.setPage('<?=Yii::app()->request->url?>');
        st.setReferer(document.referrer);
        st.setIp('<?=CommFun::realIp()?>');
        st.setUid('<?=$user_id?>');
        st.track();
    }
    catch (err) {}
</script>