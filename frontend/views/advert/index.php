<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adverts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">

    <div class="content_botbg">

        <div class="content_res">

            <div id="breadcrumb"><div id="crumbs">
                    <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><span class="trail-begin"><a href="http://demos.appthemes.com/classipress" title="ClassiPress Demo" rel="home">Home</a></span>
                        <span class="sep">&raquo;</span> <span class="trail-end">Advert</span>
                    </div></div></div>

<div class="advert-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Advert', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'price',
            'address',
            // 'location',
             'created_at:date',
             'updated_at:date',
            // 'general_image',
            // 'category',
            // 'agent_contact',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

        </div><!-- /content_res -->

    </div><!-- /content_botbg -->

</div><!-- /content -->