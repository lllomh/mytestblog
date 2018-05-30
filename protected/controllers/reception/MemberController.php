<?php

class MemberController extends Controller
{

    public $layout = '//layouts/loginStem'; //公用部件


    public function actionLogin()
    {

//        $sql = 'SELECT * FROM b_user';
//        $data = Yii::app()->db->createCommand($sql)->queryAll();
//
//        $criteria = new CDbCriteria();



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
        $userStem = BUser::model()->find('user = '. $user);
        if(!empty($userStem)){
            if($userStem->pass == $pass){
                $_SESSION['stats']='200';
                P($_SESSION['stats']);
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
