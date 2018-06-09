<?php

class UsercententController extends ReceptionController
{
    public $layout = '//layouts/user';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */


    public function actionBasic()
    {
        $confun = CommFun::userIsLogin();

        if(empty($confun)){
            $this->redirect(Yii::app()->createUrl('reception/home/index'));
        }

        $this->render('basic/index');
    }









    public function actionsave(){
//        print_r(Yii::app()->request->getParam( 'ee'));
        $verify =Yii::app()->request->getParam('cxscode');
        if ($this->createAction('captcha')->validate($verify, false)) {
            echo '成功';
        } else {
            echo '失败';
        }
    }

    public function actions(){
            return array(
                'captcha'=> array(
                    'class'=>'system.web.widgets.captcha.CCaptchaAction',
                    'height'=>25,
                    'width'=>100,
                    'minLength'=>4,
                    'maxLength'=>4
                )
            );

    }



    /**
     * @return array action filters
     */

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules

    /**
     * Displays a particular model.
     */
//    public function actionView()
//    {
//        $post = $this->loadModel();
//        $comment = $this->newComment($post);
//
//        $this->render('view', array(
//            'model' => $post,
//            'comment' => $comment,
//        ));
//    }
//

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
//    public function actionUpdate()
//    {
//        $model = $this->loadModel();
//        if (isset($_POST['Post'])) {
//            $model->attributes = $_POST['Post'];
//            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->id));
//        }
//
//        $this->render('update', array(
//            'model' => $model,
//        ));
//    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
//    public function actionDelete()
//    {
//        if (Yii::app()->request->isPostRequest) {
//            // we only allow deletion via POST request
//            $this->loadModel()->delete();
//
//            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//            if (!isset($_GET['ajax']))
//                $this->redirect(array('index'));
//        } else
//            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
//    }

    /**
     * Lists all models.
     */
//	public function actionIndex()
//	{
//		$criteria=new CDbCriteria(array(
//			'condition'=>'status='.Post::STATUS_PUBLISHED,
//			'order'=>'update_time DESC',
//			'with'=>'commentCount',
//		));
//		if(isset($_GET['tag']))
//			$criteria->addSearchCondition('tags',$_GET['tag']);
//
//		$dataProvider=new CActiveDataProvider('Post', array(
//			'pagination'=>array(
//				'pageSize'=>Yii::app()->params['postsPerPage'],
//			),
//			'criteria'=>$criteria,
//		));
//
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
//	}

}
