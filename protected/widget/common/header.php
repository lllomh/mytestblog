<?php

/**
 * @desc 页面头部
 * @author kevin.wang
 * @date 2015-06-29 10:00:00
 */
class header extends CWidget {

    public function init() {

    }

    public function run() {
        Yii::import('application.models.getdata.*');
        $obj = new getData();
        $sql = "select * from gzc_web_server where is_show = 1 order by sort desc ,web_server_id desc ";
        $list = $obj->select_table($sql, 'all');
        $web_server_language_zh = Yii::t('app', 'web_server', array(), null, 'zh');
        $web_server = Yii::t('app', 'web_server');
        $user_ids =  CommFun::getUserId();
        $user_ids = empty($user_ids) ? 0 : $user_ids;
        $sql = 'SELECT source_customers FROM gzc_user WHERE user_id = '.$user_ids;
        $result_list['sources']= Yii::app()->db->createCommand($sql)->queryRow();

        foreach ($list as $k => $v)
        {
            $key_name = array_search($v['server_name'], $web_server_language_zh);
            if (!empty($key_name))
            {
                $list[$k]['server_name'] = $web_server[$key_name];
            }
        }

        $result_list['serverName'] = $list;
        $isLogin = CommFun::userIsLogin();
        $result_list['isLogin'] = $isLogin;

        $result_list['language']['url'] = Yii::app()->createUrl('language/change/qiehuan/lang/en');
        $result_list['language']['name'] = 'EN';
        $language = Yii::app()->session['language'];
        if($language!='zh'){
            $result_list['language']['url'] = Yii::app()->createUrl('language/change/qiehuan/lang/zh');
            $result_list['language']['name'] = '中文';
        }

        $result_list['current_module'] = '';
        if (!empty($_REQUEST['r']))
        {
            $router = explode('/', $_REQUEST['r']);
            $result_list['current_module'] = $router[0];
        }

        if (!empty($_REQUEST['r']) && strpos($_REQUEST['r'], 'logistics/warehouse/reservation') === 0)
        {
            $result_list['twusa_url'] = Yii::app()->params['twusa_url'];
            $this->render('twusaHeader', $result_list);
        }
        else
        {
            $this->render('header', $result_list);
        }
    }

}
