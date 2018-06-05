<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to 'column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
}
/*
* 调试用输出格式化P函数
*/
function P($data=null)
{
    $now = $_SERVER['SERVER_ADDR'];
    //线上关闭打印功能 http://www.lllomh.cn/
    if ( trim($now) == '47.88.85.163' )
        return false;

    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}

/*******************************************全局函数 credit by (照Felix改的)
 * ==2018-04-17==================================================/
/**
 * 调试用输出格式化H函数(去 die)
 */
function H($data=null)
{
    $now = $_SERVER['SERVER_ADDR'];
//线上关闭打印功能 http://www.lllomh.cn/
    if ( trim($now) == '47.88.85.163' )
        return false;

    echo "<pre>";
    print_r($data);
    echo "</pre>";
}