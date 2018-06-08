<?php

class MemberController extends Controller
{

    public $layout = '//layouts/loginStem'; //公用部件


    //登录
    public function actionLogin()
    {
        $confun = CommFun::userIsLogin();

        if(!empty($confun)){
            $this->redirect(Yii::app()->createUrl('reception/home/index'));
        }

        $this->render('login');
    }

    //登录处理
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

                if(preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/',$user)){
                    $condition ='email = '."'".$user."'";
                }else{
                    $condition ='username = '."'".$user."'";
                }

                $userStem = BUser::model()->find($condition);
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

    //登出处理
    public function actionOut(){

        //移除 session
        unset(Yii::app()->session['UserStats']);

        //最后，当用户退出登录(logout),你需要消除痕迹，可使用：
        Yii::app()->session->clear();     //移去所有session变量，然后，调用
        Yii::app()->session->destroy();
        $this->redirect(Yii::app()->createUrl('reception/home/index'));

    }

    //注册
    public function actionRegister()
    {

        $confun = CommFun::userIsLogin();
        if(!empty($confun)){
            $this->redirect(Yii::app()->createUrl('reception/home/index'));
        }

        $this->render('register');
    }

    //注册处理
    public function actionReg(){
            $stasus=true;
            $user =Yii::app()->request->getParam('user');
            $pass1 =Yii::app()->request->getParam('pass1');
            //$pass2 =Yii::app()->request->getParam('pass2');
            $email =Yii::app()->request->getParam('email');
            $verify =Yii::app()->request->getParam('code');

            $condition ='username = '."'".$user."'".'OR email = '."'".$email."'";
            $userStem = BUser::model()->find($condition);
            if(empty($userStem)){
                if(!preg_match('/^[\w\_]{6,20}$/u',$user)){
                    $data['ststus']='用户名必须用英文、数字、下划线6-20位字符';
                    $stasus=false;
                }

                if(!preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/',$email)){

                    $data['ststus']='邮件地址格式不对';
                    $stasus=false;
                }


                if (strlen($pass1)>30 || strlen($pass1)<6)
                {
                    $data['ststus']='密码必须为6-30位的字符串';
                    $stasus=false;
                }
                if(preg_match("/^\d*$/",$pass1))
                {
                    $data['ststus']='密码必须包含字母,强度:弱';
                    $stasus=false;
                }
                if(preg_match("/^[a-z]*$/i",$pass1))
                {
                    $data['ststus']='密码必须包含数字,强度:中';
                    $stasus=false;
                }
                if(!preg_match("/^[a-z\d]*$/i",$pass1))
                {
                    $data['ststus']='密码只能包含数字和字母,强度:强';
                    $stasus=false;
                }

                if($stasus){

                    if ($this->createAction('captcha')->validate($verify, false)) {

                        $pass1 = sha1(md5($pass1 . Yii::app()->params['userpassKey']));
//                      $pass2 = sha1(md5($pass2.Yii::app()->params['userpassKey']));

                        $regtime = time();
                        $user_status_token = md5($user.$regtime); //创建用于激活识别码
                        $user_status_token_exptime = time()+60*60*24;//过期时间为24小时后

                        $url =Yii::app()->params['url'];
                        //邮件发送
                        $mail = Yii::App()->mail;
                        $mail->IsSMTP();
                        $mail->AddAddress($email , $user);
                        $mail->IsHTML(true); //支持html格式内容
                        $mail->Subject = @"星芒社区用户账户激活"; //邮件标题
     $mail->Body = @"亲爱的".$user.': <br/> 感谢您在我站注册了新帐号。<br/> 请点击链接激活您的帐号。<br/><a href= '.$url.'/index.php/reception/member/active/verify/'.$user_status_token.' target="_blank">'.$url.'/index.php/reception/member/active/verify/'.$user_status_token.'</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style="text-align:right">-------- 星芒社区管理员</p>'; //邮件内容
                        if(!$mail->Send())
                        {
                            echo $mail->ErrorInfo;
                            $email_status='0';
                            // return false;
                        }else{
                            $email_status='1';
                            // return true;

                        }

                        Yii::app()->db->createCommand()->insert('b_user',//表增加新数据
                            array(
                                'username' => $user,
                                'nickname' => $user,
                                'password' => $pass1,
                                'email'    => $email,
                                'user_status_token' => $user_status_token,
                                'user_status_token_exptime' => $user_status_token_exptime,
                                'email_status'=>$email_status,
                                'regtime'  => $regtime
                            )
                        );
                        $data['ststus']=200;
                    }else{
                        $data['ststus']='验证码错误';
                    }
                }
            }else{
                $data['ststus']='该用户名或者该邮箱已存在[一个邮箱只能注册一个用户],请用用户名或者邮箱登录';
            }

        echo json_encode($data);
    }

    //激活邮箱处理
    public function actionActive(){
        $verifys  =Yii::app()->request->getParam('verify');

        $nowtime = time();
        $usermessge = BUser::model()->find('status = 0 AND user_status_token = '."'".$verifys."'");

        if($usermessge){
            if($nowtime>$usermessge->user_status_token_exptime){ //30min
                $data['msg'] = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.';
            }else{
                $usermessge->status = 1;
                $stasu = $usermessge->save();
                if(!empty($stasu)){
                    $data['msg'] = "激活成功";
                    $data['msgstus'] = 200;
                }
            }
        }else{
             $data['msg'] = '此链接已经失效';
        }

        $this->renderPartial('active',array('data'=>$data));

    }

    //找回密码
    public function actionPassword(){

        $confun = CommFun::userIsLogin();
        if(!empty($confun)){
            $this->redirect(Yii::app()->createUrl('reception/home/index'));
        }

        $this->render('password');
    }
        //找回密码邮件发送
    public function actionPwd(){
        $user =Yii::app()->request->getParam('user');
        $verify =Yii::app()->request->getParam('code');

        if(preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/',$user)){
            $condition ='email = '."'".$user."'";
        }else{
            $condition ='username = '."'".$user."'";
        }

        $userStem = BUser::model()->find($condition);
        if(!empty($userStem)){

            if ($this->createAction('captcha')->validate($verify, false)) {

                $email = $userStem->email;
                $newtime = time();
                $pwdtoken = md5($user.$newtime); //创建用于激活识别码
                $pwdtoken_exptime = time()+60*60*24;//过期时间为24小时后


                $url =Yii::app()->params['url'];
                //邮件发送
                $mail = Yii::App()->mail;
                $mail->IsSMTP();
                $mail->AddAddress($email , $user);
                $mail->IsHTML(true); //支持html格式内容
                $mail->Subject = @"星芒社区用户找回密码"; //邮件标题
                $mail->Body = @"亲爱的".$user.': <br/> 感谢使用找回密码。<br/> 请点击链接找回密码。<br/><a href='.$url.'/index.php/reception/member/passwords/verify/'.$pwdtoken.' target="_blank">'.$url.'/index.php/reception/member/passwords/verify/'.$pwdtoken.'</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次找回密码请求非你本人所发，请忽略本邮件。<br/><p style="text-align:right">-------- 星芒社区管理员</p>'; //邮件内容
                if(!$mail->Send())
                {
//                    echo $mail->ErrorInfo;
                    $data['stusa']='发送失败';
                    $data['code']='304';
                    // return false;
                }else{
                    $data['stusa']='已向您邮箱发送邮件,请查收';
                    $data['code']='200';
                    // return true;
                    Yii::app()->session['var']='value';


                }

                $userStem->pwdtoken=$pwdtoken;
                $userStem->pwdtoken_exptime=$pwdtoken_exptime;
                $userStem->save();

            }else{
                $data['stusa']='验证码错误';
            }

        }else{
            $data['stusa']='该用户还未注册';
        }

        echo json_encode($data);
    }

    //找回密码邮件处理
    public function actionPasswords(){

        $verifys  =Yii::app()->request->getParam('verify');

        $nowtime = time();
        $usermessge = BUser::model()->find('pwdtoken = '."'".$verifys."'");

        if($usermessge){
            if($nowtime>$usermessge->pwdtoken_exptime){ //30min
                $data['msg'] = '您的链接有效期已过，请重新回密码';
            }else{
                  if(!empty(Yii::app()->session['var'])){
                      $usermessge->password='fdb6394be1d232819b457dd642668c3c87484f21';
                      $usermessge->pwd_cunt+=1;
                      $usermessge->save();
                      $data['msg'] = '亲爱的'.$usermessge->username.'您的密码已重置为:a123456,请尽快登录用户中心修改';
                      unset(Yii::app()->session['var']);
                  }else{
                      $data['msg'] = '此链接已经失效';
                  }
            }
        }else{
            $data['msg'] = '此链接已经失效';
        }

        $this->renderPartial('passwords',array('data'=>$data));
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
//              'backColor'=>0x273866,
//              'foreColor'=>0xFFFFFF
            )
        );

    }

}
