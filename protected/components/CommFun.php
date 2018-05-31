<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 9:34
 */

class CommFun{

    public static function userIsLogin(){
        session_start();
        if(!empty($_SESSION['UserStats'])){
                return $_SESSION['UserStats'];
        }else{
            return '';
        }

    }



}

