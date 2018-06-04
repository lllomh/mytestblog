<?php

class MemberController extends Controller
{

    public $layout = '//layouts/loginStem'; //公用部件


    public function actionLogin()
    {

        $confun = CommFun::userIsLogin();

        if(!empty($confun)){
            $this->redirect(Yii::app()->createUrl('reception/home/index'));
        }

        $this->render('login');
    }

    public function actionDo(){
        //Yii::import('application.models.BUser');


        //邮件发送
/*        $mail = Yii::App()->mail;
        $mail->IsSMTP();
        $mail->AddAddress('897963688@qq.com' , '半条虫');
                $mail->Subject = @"密码修改通知"; //邮件标题
                $mail->Body = @"您的密码已经修改"; //邮件内容
                if(!$mail->Send())
                {
                    echo $mail->ErrorInfo;
                echo 'n';
//                 return false;
                }else{
                    echo 'y';
                // return true;

                }
        exit();*/


        $confun = CommFun::userIsLogin();

        if(empty($confun)){

            $user =Yii::app()->request->getParam('user');
            $pass =Yii::app()->request->getParam('pass');
            $verify =Yii::app()->request->getParam('code');



            if ($this->createAction('captcha')->validate($verify, false)) {

                $userStem = BUser::model()->find('username = '."'".$user."'");
                if(!empty($userStem)){
                    $passs = sha1(md5($pass.Yii::app()->params['userpassKey']));                //密码加密
                    if($userStem->password == $passs){
                        $token = sha1(md5($userStem->user_id.Yii::app()->params['tokenKey'].time()));//加密 token
                        $arrUser = array($userStem->user_id,$token);
                        //if (!session_id()){session_start(); }                            //初始化 session
                        Yii::app()->session['UserStats']= $arrUser;
                        $userStem -> token = $token;
                        $userStem->save();
                        $this->redirect(Yii::app()->createUrl('reception/home/index'));
                    }else{
                        $data['user'] =$user;
                        $data['pass'] =$pass;
                        $data['stats']=400;
                        $this->render('login',array('data'=>$data));
                    }


                }else{
                    $data['user'] =$user;
                    $data['pass'] =$pass;
                    $data['stats']=304;
                    $this->render('login',array('data'=>$data));
                }

            } else {
                $data['user'] =$user;
                $data['pass'] =$pass;
                $data['stats']=305;
                $this->render('login',array('data'=>$data));
            }
        }else{
            $this->redirect(Yii::app()->createUrl('reception/home/index'));
        }


    }

    public function actionOut(){

//移除 session
        unset(Yii::app()->session['UserStats']);

//最后，当用户退出登录(logout),你需要消除痕迹，可使用：
        Yii::app()->session->clear();     //移去所有session变量，然后，调用
        Yii::app()->session->destroy();
        $this->redirect(Yii::app()->createUrl('reception/home/index'));

    }



    public function actionRegister()
    {

        $confun = CommFun::userIsLogin();
        if(!empty($confun)){
            $this->redirect(Yii::app()->createUrl('reception/home/index'));
        }

        $this->render('register');
    }

    public function actionReg(){
        $confun = CommFun::userIsLogin();
        if(empty($confun)){

            $user =Yii::app()->request->getParam('user');
            $pass1 =Yii::app()->request->getParam('pass1');
            //$pass2 =Yii::app()->request->getParam('pass2');
            $email =Yii::app()->request->getParam('email');
            $verify =Yii::app()->request->getParam('code');


            if ($this->createAction('captcha')->validate($verify, false)) {

                 $pass1 = sha1(md5($pass1 . Yii::app()->params['userpassKey']));
//                $pass2 = sha1(md5($pass2.Yii::app()->params['userpassKey']));

                Yii::app()->db->createCommand()->insert('b_user',//表增加新数据

                    array(
                        'username' => $user,
                        'password' => $pass1,
                         'email'=> $email
                    )
                );

                $data['stats']=200;
                $this->render('register',array('data'=>$data));
            }else{
                $this->render('register');
                echo'<script>      layui.use(\'layer\', function () {
             ErroAlert(\'验证码错误\');
         });
</script>';
            }

        }else{
            $this->redirect(Yii::app()->createUrl('reception/home/index'));
        }

    }




    public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'system.web.widgets.captcha.CCaptchaAction',
                'height'=>40,
                'width'=>90,
                'minLength'=>4,
                'maxLength'=>4,
//                'backColor'=>0x273866,
//                'foreColor'=>0xFFFFFF
            )
        );

    }



}
