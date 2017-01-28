<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.12.16
 * Time: 0:30
 */
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Blog;
use rmrevin\yii\module\Comments\models\Comment;

class BlogWidget extends  Widget{

    public $view;

    public function run(){

        $query = Blog::find();
        $query_new=$query->orderBy(['created_at'=>SORT_DESC])->limit(5)->all();

        $query_popular=$query->orderBy(['views'=>SORT_DESC])->limit(5)->all();

        $query_random=$query->orderBy('rand()')->limit(5)->all();


        return $this->render($this->view, [
            'model_new' => $query_new,
            'model_popular' => $query_popular,
            'model_random' => $query_random,
        ]);
    }
}