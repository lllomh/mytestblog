<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17
 * Time: 13:32
 */


class AdminMdel extends CActiveRecord
{
    public static function model($className=__CLASS__){
        return parent::model($className);
    }
    public function tableName() {
        return 'gzc_news_system';
    }

}
