<div class="content_res">
<div class="row contact">
    <div id="breadcrumb"><div id="crumbs">
            <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><span class="trail-begin"><a href="/" title="home" rel="home">Главная</a></span>
                <span class="sep">/</span> <span class="trail-end"> Контакты</span>
            </div></div></div>

    <h1 class="single dotted">Напишите Нам </h1>
    <div class="col-lg-6 col-sm-6 ">
        <div class="contact">

        <?php
        $form = \yii\bootstrap\ActiveForm::begin();
        ?>

        <?php
        echo $form->field($model,'name');
        ?>
        <?php
        echo $form->field($model,'email');
        ?>
        <?php
        echo $form->field($model,'subject');
        ?>
        <?php
        echo $form->field($model,'body')->textarea(['rows' => 6]);
        ?>

        <?php
        echo $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            'captchaAction' => \yii\helpers\Url::to(['main/captcha'])

        ]);
        ?>

        <?php
        echo \yii\helpers\Html::submitButton('Отправить',['class' => 'obtn btn_orange nav'])
        ?>


        <?php
        \yii\bootstrap\ActiveForm::end();
        ?>
    </div>
        </div>
    </div>

</div>