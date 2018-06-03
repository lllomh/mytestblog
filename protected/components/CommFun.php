<?php
/**
 * Created by PhpStorm.
 * User: lllomh
 * Date: 2018/5/31
 * Time: 9:34
 */

class CommFun{

    //判断是否登录状态
    public static function userIsLogin(){
        //if (!session_id()){session_start(); }
        $user = empty(Yii::app()->session['UserStats']) ? '' : Yii::app()->session['UserStats'];
        if(!empty($user)){
            $userdb = BUser::model()->find('user_id = '. "'".$user[0]."'");
            if($userdb->token == $user[1]){
                return $user;
            }else{

                return '';
            }

        }else{
            return '';
        }



    }

    //获取当前登录用户id
    public static function getUserId(){
        $userInfo = self::userIsLogin();
        if($userInfo)
            return $userInfo[0];
        return false;
    }

    //获取当前登录用户名
    public static function getUserName(){
        $userInfo = self::userIsLogin();
        if($userInfo)
            $users =BUser::model()->find('user_id = '. "'".$userInfo[0]."'");
            return $users->username;
        return false;
    }

}

