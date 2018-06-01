<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 9:34
 */

class CommFun{

    //判断是否登录状态
    public static function userIsLogin(){
        session_start();
        $user = empty($_SESSION['UserStats']) ? '' : $_SESSION['UserStats'];

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

    //获取用户id
    public static function getUserId(){
        $userInfo = self::userIsLogin();
        if($userInfo)
            return $userInfo[0];
        return false;
    }

}

