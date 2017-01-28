<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.12.16
 * Time: 0:30
 */
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Advert;

class New_popularWidget extends  Widget{



    public function run(){

        $query = Advert::find();
        $query_new=$query->orderBy(['created_at'=>SORT_DESC])->limit(10)->all();

        $query_popular=$query->orderBy(['views'=>SORT_DESC])->limit(10)->all();

        $query_random=$query->orderBy('rand()')->limit(10)->all();


        return $this->render("new_popular", [
            'model_new' => $query_new,
            'model_popular' => $query_popular,
            'model_random' => $query_random,
            ]);
    }
}