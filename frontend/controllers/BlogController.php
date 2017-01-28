<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27.09.16
 * Time: 4:01
 */

namespace frontend\controllers;

use common\models\User;
use yii\web\Controller;
use common\models\Blog;
use yii\base\DynamicModel;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\db\Query;
use yii\data\Pagination;

class BlogController extends \yii\web\Controller
{
    public $layout='dawboard';




    public function actionIndex()
    {
        $query=new Query();
        $query_advert=$query->from('blog')->orderBy('id desc');
        $result_general=$query_advert->all();


        return $this->render('index',['result_general'=>$result_general]);
    }

	
    public function actionViewPost($id){

        $model = Blog::findOne($id);
		//счетчик просмотров постов
        $model->updateCounters(['views' => 1]);


        $image = \frontend\components\Common::getImagePost($model,false);


        return $this->render('view_post',[
            'model' => $model,
            'image' =>$image,

        ]);



    }






}