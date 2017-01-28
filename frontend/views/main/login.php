<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Войти / Зарегистрироваться';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content_res">
    <div id="breadcrumb"><div id="crumbs">
            <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><span class="trail-begin"><a href="/" title="home" rel="home">Главная</a></span>
                <span class="sep">/</span> <span class="trail-end"> Войти</span>
            </div></div></div>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните поля:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div style="color:#999;margin:1em 0">
                Забыли пароль? <?= Html::a('Изменить пароль', ['main/request-password-reset']) ?>.
            </div>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'obtn btn_orange nav login', 'name' => 'login-button']) ?>

                <span class="register">Or</span>
                <a href="/main/register"><div  class="obtn btn_orange nav but_reg">Register </div></a>

            </div>

            <?php ActiveForm::end(); ?>



        </div>
    </div>
</div>
    </div>
