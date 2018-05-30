
<form name="QQ" method="post" action="<?=Yii::app()->createUrl('reception/home/save')?>">
    <input name="ww" type="text" value="">
    <input name="cxscode" type="text" value="">
<?php
$this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'curror:pointer')));
?>
<input type="submit">
</form>