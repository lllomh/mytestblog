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

        $confun = CommFun::userIsLogin();

        if(empty($confun)){
            P('还没登录');
        }





        $this->render('login');
    }

    public function actionDo(){
        //Yii::import('application.models.BUser');


        $user =Yii::app()->request->getParam('user');
        $pass =Yii::app()->request->getParam('pass');
        $verify =Yii::app()->request->getParam('code');
//        if ($this->createAction('captcha')->validate($verify, false)) {
//            echo '成功';
//        } else {
//            echo '失败';
//        }

        $data['user'] =$user;
        $data['pass'] =$pass;
        $userStem = BUser::model()->find('user = '."'".$user."'");
        if(!empty($userStem)){
            if($userStem->pass == $pass){
                $userArr = array($user,$userStem->user_id);
                session_start();
                $_SESSION['UserStats']=$userArr;
                $this->redirect(Yii::app()->createUrl('reception/home/index'));
            }else{
                $data['stats']=400;
                $this->render('login',array('data'=>$data));
            }


        }else{
            $data['stats']=304;
            $this->render('login',array('data'=>$data));
        }


    }


    public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'system.web.widgets.captcha.CCaptchaAction',
                'height'=>57,
                'width'=>100,
                'minLength'=>4,
                'maxLength'=>4
            )
        );

    }



}
