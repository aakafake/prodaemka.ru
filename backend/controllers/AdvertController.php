<?

namespace backend\controllers;

use common\controllers\AuthController;
use common\models\Advert;
use common\models\search\AdvertSearch;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class AdvertController extends AuthController{



    public function actionIndex(){

        \Yii::$app->view->title = "Advert Manager";
        $dataProvider = new ActiveDataProvider([
            'query' => Advert::find()
        ]);

        return $this->render("index", ['dataProvider' => $dataProvider]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}