<div class="content">

    <div class="content_botbg">

        <div class="content_res">

            <div id="breadcrumb"><div id="crumbs">
                    <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><span class="trail-begin"><a href="http://demos.appthemes.com/classipress" title="ClassiPress Demo" rel="home">Home</a></span>
                        <span class="sep">&raquo;</span> <span class="trail-end">Change password</span>
                    </div></div></div>
            <h1>Change password</h1>

<div class="advert-form">

    <? $form = \yii\bootstrap\ActiveForm::begin(); ?>

    <?=$form->field($model,'password')->passwordInput() ?>
    <?=$form->field($model,'repassword')->passwordInput() ?>


    <?= \yii\helpers\Html::submitButton('Change password', ['class' => 'btn btn-primary']) ?>

    <? \yii\bootstrap\ActiveForm::end() ?>


</div>

        </div><!-- /content_res -->

    </div><!-- /content_botbg -->

</div><!-- /content -->