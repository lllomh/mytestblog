<?php

class MemberController extends Controller
{

    public $layout = '//layouts/loginStem'; //公用部件


    public function actionLogin()
    {
// 保存一天



//        session_start();
//
////2、清空session信息
//        $_SESSION = array();
//
////3、清楚客户端sessionid
//        if(isset($_COOKIE[session_name()]))
//        {
//            setCookie(session_name(),'');
//        }
////4、彻底销毁session
//        session_destroy();
//        P($_COOKIE[session_name()]);

       // H($_SESSION["admin"]);
//        $sql = 'SELECT * FROM b_user';
//        $data = Yii::app()->db->createCommand($sql)->queryAll();
//
//        $criteria = new CDbCriteria();

//        $qq = CommFun::userStates();
//          $uu =CommFun::getUserId();
//        P($uu);


        $confun = CommFun::userIsLogin();

        if(!empty($confun)){
            $this->redirect(Yii::app()->createUrl('reception/home/index'));
        }





        $this->render('login');
    }

    public function actionDo(){
        //Yii::import('application.models.BUser');

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
