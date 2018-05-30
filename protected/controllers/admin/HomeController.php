<?php

class HomeController extends AdminController
{


    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
//    private $_model;


    public function actionIndex()
    {

//        $sql = 'SELECT * FROM gzc_news_system';
//        $data = Yii::app()->db->createCommand($sql)->queryAll();


        $post=AdminMdel::model()->findAll();




        $this->render('index',array('data'=>$post));
    }

    public function actionSave()
    {
       $arr = Yii::app()->request->getParam( 'user');
       var_dump($arr);

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
