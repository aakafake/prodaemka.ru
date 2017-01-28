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
use common\models\Advert;
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

    class MainController extends \yii\web\Controller
    {
        public $layout='dawboard';

        public function actions()
        {
            return [
                'captcha' => [
                    'class' => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                ],


            ];
        }


        public function actionIndex()
        {
            $query=new Query();
            $query_advert=$query->from('advert')->orderBy('id desc');
            $command=$query_advert->limit(5);
            $result_general=$command->all();
 


            return $this->render('index',['result_general'=>$result_general]);
        }


        public function actionLogin()
        {
            if (!\Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $model = new LoginForm();
            if ($model->load(\Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            } else {
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }


        public function actionRegister()
        {
            $model= new SignupForm();

            if(\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {

                if($model->load(\Yii::$app->request->post())){

                    \Yii::$app->response->format=Response::FORMAT_JSON;

                    return ActiveForm::validate($model);
                }



            }


            if($model->load(\Yii::$app->request->post()) && $model->signup()){

                \Yii::$app->session->setFlash('success', 'Register success');


            }

            return $this->render('register',['model'=> $model]);
        }


        public function actionLogout()
        {
            \Yii::$app->user->logout();

            return $this->goHome();
        }


        public function actionRequestPasswordReset()
        {
            $model = new PasswordResetRequestForm();
            if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
                if ($model->sendEmail()) {
                    \Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                    return $this->goHome();
                } else {
                    \Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
                }
            }

            return $this->render('requestPasswordResetToken', [
                'model' => $model,
            ]);
        }


        public function actionViewAdvert($id){
            $model = Advert::findOne($id);
			//cчетчик просмотров объявлений
            $model->updateCounters(['views' => 1]);

            $user_advert = Advert::find()->where(['agent_contact'=>$model->user->id])->limit(5)->all();

            $data = ['name', 'email', 'text'];
            $model_feedback = new DynamicModel($data);
            $model_feedback->addRule('name','required');
            $model_feedback->addRule('email','required');
            $model_feedback->addRule('text','required');
            $model_feedback->addRule('email','email');


            if(\Yii::$app->request->isPost) {
                if ($model_feedback->load(\Yii::$app->request->post()) && $model_feedback->validate()){

                    \Yii::$app->common->sendMail('Subject Advert',$model_feedback->text);
                }

            }

           
            $images = \frontend\components\Common::getImageAdvert($model,false);

            $current_user = ['email' => '', 'username' => ''];

            if(!\Yii::$app->user->isGuest){

                $current_user['email'] = \Yii::$app->user->identity->email;
                $current_user['username'] = \Yii::$app->user->identity->username;

            }
			//данные для Яндекс Карты
            $coords = str_replace(['(',')'],'',$model->location);
            $coords = explode(',',$coords);




            return $this->render('view_advert',[
                'model' => $model,
                'model_feedback' => $model_feedback,
                'user_advert'=>$user_advert,
                'images' =>$images,
                'current_user' => $current_user,
                'map' => $coords
            ]);

        }

        public function actionFind($propert='',$category = ''){


            $query = Advert::find();
            $query->filterWhere(['like', 'address', $propert])
                ->orFilterWhere(['like', 'description', $propert])
                ->orFilterWhere(['like', 'title', $propert])
                ->andFilterWhere(['category' => $category]);


            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count()]);
            $pages->setPageSize(10);

            $model = $query->offset($pages->offset)->limit($pages->limit)->all();



            $request = \Yii::$app->request;
            return $this->render("find", ['model' => $model, 'pages' => $pages,  'request' => $request]);

        }

        public function actionCategory($type = ''){

            $category=urldecode($type);

            $query = Advert::find();
            $query->filterWhere(['category' => $type])
                  ->orderBy(['created_at'=>SORT_DESC]);

            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count()]);
            $pages->setPageSize(10);

            $model = $query->offset($pages->offset)->limit($pages->limit)->all();

            $request = \Yii::$app->request;
            return $this->render("category", ['model' => $model, 'type'=>$category, 'pages' => $pages,  'request' => $request]);




        }

        public function actionContact()
        {
            $model= new ContactForm();

            if ($model->load(\Yii::$app->request->post()) && $model->validate() ) {



                \Yii::$app->common->sendmail($model->subject, $model->body);

                echo "success";
                die;

            }

            return $this->render('contact', ['model' => $model]);

        }

        public function actionFaq(){

            return $this->render('faq');


        }


    }