<div class="content">

    <div class="content_botbg">

        <div class="content_res">

            <div id="breadcrumb"><div id="crumbs">
                    <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><span class="trail-begin"><a href="http://demos.appthemes.com/classipress" title="ClassiPress Demo" rel="home">Home</a></span>
                        <span class="sep">&raquo;</span> <span class="trail-end">Settings</span>
                    </div></div></div>
            <h1>Settings</h1>
<div class="advert-form">

    <? $form = \yii\bootstrap\ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?=\yii\helpers\Html::img(\common\components\UserComponent::getUserImage(Yii::$app->user->id), ['width' => 200]) ?>

    <?=$form->field($model,'username') ?>
    <?=$form->field($model,'email') ?>
    <?=\yii\helpers\Html::label('Avatar') ?>
    <?=\yii\helpers\Html::fileInput('avatar') ?>
    <br>
    <br>


    <?= \yii\helpers\Html::submitButton('Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <? \yii\bootstrap\ActiveForm::end() ?>


</div>

        </div><!-- /content_res -->

    </div><!-- /content_botbg -->

</div><!-- /content -->