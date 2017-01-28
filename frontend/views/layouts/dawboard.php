<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\MainAsset;
use common\widgets\Alert;

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
   <link rel="shortcut icon" href="/images/favicon.ico" />


    <?php $this->head() ?>
</head>
<body class="home page page-id-8241 page-template page-template-tpl-ads-home page-template-tpl-ads-home-php logged-in">
<?php $this->beginBody() ?>




    <div class="container">
        <div class="header">

            <div class="header_top">

                <div class="header_top_res">
                    <p>
                    <?php $guest = Yii::$app->user->isGuest;
                    if($guest) {
                        echo"<a href='main/login'>Войти</a>";
                    }
                    else {
                        echo"
                        Добро пожаловать, <strong>".\Yii::$app->user->identity->username." </strong> [ <a href='advert'>Мои объявления</a> | <a href='main/logout'>Выйти</a> ]&nbsp;";
                    }?>


                        <a href='#' class='dashicons-before srvicon rss-icon' target='_blank' title='RSS Feed'></a>

                        <a href='#' class='dashicons-before srvicon twitter-icon' target='_blank' title='Twitter'></a>



                    </p>
                </div><!-- /header_top_res -->

            </div><!-- /header_top -->


            <div class="header_main">

                <div class="header_main_bg">

                    <div class="header_main_res">

                        <div id="logo">

                            <a class="site-logo" href="/">
                                <img src="/images/cp_logo_black.png" class="header-logo" width="300" height="80" alt="" />
                            </a>

                        </div><!-- /logo -->



                        <div class="clr"></div>

                    </div><!-- /header_main_res -->

                </div><!-- /header_main_bg -->

            </div><!-- /header_main -->


            <div class="header_menu">

                <div class="header_menu_res">


                    <? echo \frontend\widgets\Menu_mainWidget::widget() ?>


                    <?
                    $menuItems = [];
                    $guest = Yii::$app->user->isGuest;
                    if($guest) {
                        $menuItems[] =  ['label' => 'Разместить объявление', 'url' => '/main/login'];
                    }
                    else{
                        $menuItems[] =  ['label' => 'Мои объявления', 'url' => ['/advert']];
                        $menuItems[] =  ['label' => 'Настройки', 'url' => ['/advert/settings']];
                        $menuItems[] =  ['label' => 'Сменить пароль', 'url' => ['/advert/change-password']];

                        $menuItems[] = ['label' => 'Выйти',  'url' => ['/main/logout']];
                    }
                    echo Nav::widget([
                        'options' => ['class' => 'obtn btn_orange'],
                        'items' => $menuItems,
                    ]);
                    ?>


                    <div class="clr"></div>

                </div><!-- /header_menu_res -->

            </div><!-- /header_menu -->

        </div><!-- /header -->



        <?= Alert::widget() ?>
        <?= $content ?>





<div class="footer">

    <div class="footer_menu">

        <div class="footer_menu_res">

            <? echo \frontend\widgets\Menu_mainWidget::widget() ?>

            <div class="clr"></div>

        </div><!-- /footer_menu_res -->

    </div><!-- /footer_menu -->

    <div class="footer_main">

        <div class="footer_main_res">

            <div class="dotted">

                <div class="column widget_text" id="text-3"><h2 class="dotted">О Нас</h2>
                    <div class="textwidget">Prodaemka.ru - помогает быстро купить или продать! Бесплатное объявление увидит вся аудитория сайта, которая в поиске квартиры, оборудования, услуг, мебели, одежды, техники и многих других товаров.</div>
                </div><!-- /column -->

                <div class="column widget-top-ads-overall" id="top_ads_overall-8">

                    <? echo \frontend\widgets\TopWidget::widget(['view'=>'top_footer']) ?>

                </div><!-- /column -->
                <div class="clr"></div>

            </div><!-- /dotted -->

            <p>&copy; 2017 Prodaemka.ru</p>

            <a href="https://twitter.com/appthemes" class="dashicons-before twit" target="_blank" title="Twitter"></a>

            <div class="right">
                <p>Разработано на фреймворке<a href="http://www.yiiframework.com/" target="_blank" rel="nofollow">YII2</a></p>
            </div>


            <div class="clr"></div>

        </div><!-- /footer_main_res -->

    </div><!-- /footer_main -->

    </div><!-- /footer -->
	
  </div><!-- /сontainer -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
