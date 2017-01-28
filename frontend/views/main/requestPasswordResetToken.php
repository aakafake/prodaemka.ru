<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Изменить пароль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content_res">
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>После ввода Email'a, проверьте почту и перейдите по ссылке указанной в письме</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'obtn btn_orange']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
    </div>
