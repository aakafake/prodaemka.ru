<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06.01.17
 * Time: 11:09
 */
namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\Blog;
use common\models\search\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use Imagine\Image\Point;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\helpers\Url;
use yii\helpers\BaseFileHelper;


class BlogController extends Controller{

    public function actionIndex()
    {

        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

	//метод для загрузки главного фото для поста
    public function actionFileUploadGeneral(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post("advert_id");
            $path = Yii::getAlias("@frontend/web/uploads/adverts/".$id."/general");
            BaseFileHelper::createDirectory($path);
            $model = Blog::findOne($id);


            $file = UploadedFile::getInstance($model,'general_image');
			
            $name = 'general.'.$file->extension;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            $image  = $path .DIRECTORY_SEPARATOR .$name;
			//готовим картинку к оптимизации 
            $new_name = $path .DIRECTORY_SEPARATOR."small_".$name;

            $model->general_image = $name;
            $model->save();

            $size = getimagesize($image);
            $width = $size[0];
            $height = $size[1];

			//оптимизируем под нужные размеры
            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(1000,644))
                ->save($new_name, ['quality' => 100]);

            return true;

        }
    }


    public function actionCreate()
    {
        $model = new Blog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['step2', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

	
	//для загрузки картинок отдельный шаг заполения
    public function actionStep2()
    {

        $id = Yii::$app->locator->cache->get('id');
        $model = Blog::findOne($id);
        $model->scenario = 'step2';
        $image = [];
        if($general_image = $model->general_image){
			//прервьюшка для главной
            $image[] =  '<img src="/uploads/adverts/' . $model->id . '/general/small_' . $general_image . '" width=250>';
        }

        if(Yii::$app->request->isPost){
            $this->redirect(Url::to(['blog/']));
        }

        $path = Yii::getAlias("@backend/web/uploads/adverts/".$model->id);
        $images_add = [];

        try {
            if(is_dir($path)) {
                $files = \yii\helpers\FileHelper::findFiles($path);

                foreach ($files as $file) {
                    if (strstr($file, "small_") && !strstr($file, "general")) {
						//прервьюшки для остальных
                        $images_add[] = '<img src="/uploads/adverts/' . $model->id . '/' . basename($file) . '" width=250>';
                    }
                }
            }
        }
        catch(\yii\base\Exception $e){}


        return $this->render("step2",['model' => $model,'image' => $image, 'images_add' => $images_add]);
    }
}