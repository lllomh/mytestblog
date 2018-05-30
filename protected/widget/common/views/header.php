<?php $hostUrl = Yii::app()->request->getHostInfo();?>
<?php
$redirecturl = $hostUrl.Yii::app()->request->getUrl();
if(strpos($redirecturl,"index.php?r=member/login/index")!==false){
    $redirecturl = $hostUrl;
}
$user_info_url = 'usercent/setting/company';
$user_home_url = 'usercent/index/home';
$collect = 'usercent/collect/prolist';
if($isLogin['user_type']==1){
    $user_info_url = 'wms/dashboard/index';
    $user_home_url = 'wms/dashboard/index';
}
/*
$logis_user_id = array(4,205,471);
if (in_array($isLogin['user_id'], $logis_user_id)){
    $user_info_url = 'supplier/hyzxproduct/manageprohy/box/zx/check/y';
    $user_home_url = 'supplier/hyzxproduct/manageprohy/box/zx/check/y';
}
*/
?>
<?php $lan=Yii::app()->session['language'];?>
<link type="text/css" rel="stylesheet" href="<?php echo $hostUrl; ?>/css/<?php echo $lan; ?>/Top.css?v=<?php echo Yii::app()->params['version']['CSS']; ?>"/>
<div id="Top">
    <div class="top_menu">
        <div class="top_list">
            <div class="left_yis float-left">
                <input type="hidden" id="reminder" value="<?php echo Yii::t('app', 'message');?>">
                <span class="zeomo"><a href="<?=Yii::app()->params['twusa_url']?>"><?php echo Yii::t('app', 'home');?></a></span>
                <!--<span class="coloe_sgsa"><a href="<?php /*echo Yii::app()->createUrl('news/news/xsrm'); */?>"><?php /*echo Yii::t('app', 'xinshourumen');*/?></a></span>
                <span class="coloe_sgsa"><a href="<?php /*echo Yii::app()->createUrl("news/news/aboutus"); */?>"><?php /*echo Yii::t('app', 'aboutus');*/?></a></span>-->
                <span style="color: #000">400-962-8880</span></div>
            <div class="right_yie float-right">
                <?php if (empty($isLogin)) {  ?>
                    <span><a href="<?php echo Yii::app()->createUrl('member/login/index/redirecturl/'.urlencode($redirecturl)) ?>"><?php echo Yii::t('app', 'login');?></a></span>
                    <span><a href="<?php echo Yii::app()->createUrl('member/register/email'); ?>"><?php echo Yii::t('app', 'register');?></a></span>
                <?php } else { ?>
                	<!--<span><a href="<?php /*echo Yii::app()->createUrl($collect); */?>"> <?php /*echo Yii::t('app', 'collection');*/?></a></span>-->
                    <span><a href="<?=Yii::app()->params['oms_url'].$user_info_url?>"><?php echo Yii::t('app', 'welcome');?> <?php echo $isLogin['username']; ?></a></span>


                    <span><a href="<?=Yii::app()->params['oms_url'].'usercent/index/index'?>"><?php echo Yii::t('app', 'usercenter');?></a></span>
                    <span><a href="<?php echo Yii::app()->createUrl('member/login/out'); ?>"><?php echo Yii::t('app', 'logout');?></a></span>
                <?php
                }
                ?>
                <span class="zedmo coloe_sgsa"><a href="<?php echo $language['url']; ?>"><?php echo $language['name']; ?></a></span>
            </div>
            <div class="clar"></div>
        </div>
        <div class="popteks">
            <span><a href="<?php echo Yii::app()->createUrl("oms/nci/index"); ?>"><?= Yii::t('app','notice_NCI')?></a></span>
            <b><img src="/images/0000.png" alt=""></b>
        </div>
    </div>
    <?php if ($current_module != 'member' && $current_module != 'usercent' && $current_module != 'tools' && $current_module != 'supplier' && $current_module != 'oms'):?>
    <div class="center_menu">
        <div class="top_list1"> <a href="/index.php"><img src="images/logo.png" width="265" height="66" style="float: left;margin-left: 15px;"></a>
            <div class="top_list_r">
                <ul>
                <li><a href="<?=Yii::app()->params['twusa_url']?>"><?php echo Yii::t('app', 'home');?></a></li>
                <?php foreach ($serverName as $key => $value):?>
                    <li><a href="<?php echo $value['server_url']; ?>"><?php echo $value['server_name']; ?></a></li>
                <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>
<?php if (!empty($isLogin) && $isLogin['user_type']!=1 ) {  ?>
  <div class="Position topmis" style="text-align:center;margin-top:30px;" >
        <span ><a href="javascript:;"style="color:red;"><?php echo Yii::t('app', 'bill_notice');?></a></span>
  </div>
<?php }?>

<?php if(!empty($sources)): ?>
    <?php if ($sources['source_customers'] == 5):?>
    <div style="position: absolute;top: 37px;height: 30px;width: 100px;">
        <img src="/images/cflogo.jpg" alt="">
    </div>
    <?php endif;?>
<?php endif;?>

