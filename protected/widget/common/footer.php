<?php
/**
 * @desc 页面尾部
 * @author kevin.wang
 * @date 2015-06-29 10:00:00
 */
class footer extends CWidget{

    public function init(){}

    public function run(){
        if (!empty($_REQUEST['r']) && strpos($_REQUEST['r'], 'logistics/warehouse/reservation') === 0)
        {
            $result_list['twusa_url'] = Yii::app()->params['twusa_url'];
            $this->render('twusaFoot', $result_list);
        }
        else
        {
            $this->render('footer');
        }
    }
}