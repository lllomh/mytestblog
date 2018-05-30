<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/29
 * Time: 15:53
 */

class LoginMdel extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe;
    public $verifyCode;
    public function rules()
    {
        return array(
            // username and password are required
            array('username, password,verifyCode', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password'),
            // verifyCode needs to be entered correctly
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }
    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'rememberMe'=>Yii::t('user',"Remember me next time"),
            'username'=>Yii::t('user',"username or email"),
            'password'=>Yii::t('user',"password"),
            'verifyCode'=>Yii::t('user','Verification Code'),
        );
    }
}