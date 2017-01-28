<?
use yii\helpers\Html;
?>


<div id="search-bar">

    <? echo \frontend\widgets\SearchWidget::widget() ?>

</div> <!-- /search-bar -->


    <div class="content">

        <div class="content_botbg">

            <div class="content_res">



                <script>
                    /* featured listings slider */
                    jQuery(document).ready(function($) {
                        $('div.slider').jCarouselLite({
                            btnNext: '.next',
                            btnPrev: '.prev',
                            autoWidth: true,
                            responsive: true,
                            pause: true,
                            auto: true,
                            timeout: 2800,
                            speed: 800,
                            init: function() {
                                $('div.slider').fadeIn();
                            },
                            easing: 'easeOutQuint' // for different types of easing, see easing.js
                        });
                    });
                </script>



                <!-- featured listings -->
                <div class="shadowblock_out slider_top">

                    <div class="shadowblock sliderblock">

                        <h2 class="dotted">Предложения</h2>

                        <div class="sliderwrap">

                            <div class="dashicons-before prev"></div>
                            <div class="dashicons-before next"></div>

                            <div class="slider">

                                <ul>
                                    <? foreach($result_general as $row): ?>

                                        <li>

                                            <div class="slide-item">
		<span class="feat_left">

			<a href="<?=\frontend\components\Common::getUrlAdvert($row) ?>" title="<?=$row['title'] ?>" class="preview" data-rel=" <?=\frontend\components\Common::getImageAdvert($row)[0] ?>"><img width="250" height="250" src="<?=\frontend\components\Common::getImageAdvert($row)[0] ?> " class="attachment-ad-medium size-ad-medium" alt="<?=$row['title'] ?>" srcset=" <?=\frontend\components\Common::getImageAdvert($row)[0] ?>" sizes="(max-width: 250px) 100vw, 250px" /></a>
		</span>


                                                <p><a href="<?=\frontend\components\Common::getUrlAdvert($row) ?>"><?=$row['title'] ?></a></p>

                                                <span class="price_sm muted"><?=$row['price'] ?></span>

                                            </div>
                                        </li>


                                        <?
                                    endforeach;
                                    ?>


                                </ul>

                            </div><!-- /slider -->

                        </div><!-- /sliderwrap -->

                    </div><!-- /sliderblock -->

                </div><!-- /shadowblock_out -->





                <!-- left block -->
                <div class="content_left">

                    <div class="shadowblock_out">

                        <div class="shadowblock">

                            <h2 class="dotted">Категории</h2>

                            <div id="directory" class="directory Col">

                                <div class="catcol first">
                                    <ul><li class="maincat">
                                    <a href="/main/category/?type=Транспорт">ТРАНСПОРТ
                                    <ins><img src="/images/icon-1.png" ></ins></a>
                                        </li>
                                        </ul>
                                </div><!-- /catcol -->
                                <div class="catcol">
                                    <ul><li class="maincat">
                                            <a href="/main/category/?type=Недвижимость">НЕДВИЖИМОСТЬ
                                            <ins><img src="/images/icon-2.png" ></ins></a>
                                        </li>
                                    </ul>
                                </div><!-- /catcol -->
                                <div class="catcol">
                                    <ul><li class="maincat">
                                            <a href="/main/category/?type=Работа">РАБОТА
                                            <ins><img src="/images/icon-3.png" ></ins></a>
                                        </li>
                                    </ul>
                                </div><!-- /catcol -->


                                <div class="catcol first">
                                    <ul><li class="maincat">
                                            <a href="/main/category/?type=Услуги">УСЛУГИ
                                            <ins><img src="/images/icon-5.png" ></ins></a>
                                        </li>
                                    </ul>
                                </div><!-- /catcol -->
                                <div class="catcol">
                                    <ul><li class="maincat">
                                            <a href="/main/category/?type=Личные%20вещи">ЛИЧНЫЕ ВЕЩИ
                                            <ins><img src="/images/icon-9.png" ></ins></a>
                                        </li>
                                    </ul>
                                </div><!-- /catcol -->
                                <div class="catcol">
                                    <ul><li class="maincat">
                                            <a href="/main/category/?type=Животные">ЖИВОТНЫЕ
                                                <ins><img src="/images/icon-6.png" ></ins></a>
                                        </li>
                                    </ul>
                                </div><!-- /catcol -->


                                <div class="catcol first">
                                    <ul><li class="maincat">
                                            <a href="/main/category/?type=Для%20бизнеса">ДЛЯ БИЗНЕСА
                                                <ins><img src="/images/icon-11.png" ></ins></a>
                                        </li>
                                    </ul>
                                </div><!-- /catcol -->
                                <div class="catcol">
                                    <ul><li class="maincat">
                                            <a href="/main/category/?type=Хобби%20и%20отдых">ХОББИ И ОТДЫХ
                                            <ins><img src="/images/icon-12.png" ></ins></a>
                                        </li>
                                    </ul>
                                </div><!-- /catcol -->
                                <div class="catcol">
                                    <ul><li class="maincat">
                                            <a href="/main/category/?type=Все%20для%20дома%20и%20дачи">ВСЕ ДЛЯ ДОМА И ДАЧИ
                                                <ins><img src="/images/icon-10.png" ></ins></a>
                                        </li>
                                    </ul>

                                </div><!-- /catcol -->


                                <div class="catcol first">

                                    <ul><li class="maincat">
                                            <a href="/main/category/?type=Бытовая%20электроника">БЫТОВАЯ ЭЛЕКТРОНИКА
                                                <ins><img src="/images/icon-8.png" ></ins></a>
                                        </li>
                                    </ul>
                                </div><!-- /catcol -->

                                <div class="clr"></div>

                            </div><!--/directory-->

                        </div><!-- /shadowblock -->

                    </div><!-- /shadowblock_out -->


                    <? echo \frontend\widgets\New_popularWidget::widget() ?>




                </div><!-- /content_left -->



                <div class="content_right">
                   <? $guest = Yii::$app->user->isGuest;
                    if($guest){}
                   else {
                       echo "<div id='welcome_widget' class='shadowblock_out'>

                        <div class='shadowblock'>


                            <div class='avatar'> ".\yii\helpers\Html::img(\common\components\UserComponent::getUserImage(Yii::$app->user->id), ['width' => 70, 'height'=>70, 'class' => 'avatar'])."
</div>

                            <div class='user'>

                                <p class='welcome-back'>Добро пожаловать, <strong>" . \Yii::$app->user->identity->username . "</strong>.</p>
                                <p class='last-login'>Последний раз вы были: August 16, 2017 1:08 am</p>
                                <p>Управляйте своими объявлениями в персональном кабинете.</p>

                            </div><!-- /user -->

                            <div class='welcome-buttons'>
                                <a href='/advert' class='btn_orange'>Подать объявление</a>&nbsp;&nbsp;&nbsp;<a href='/advert/settings' class='btn_orange'>Настройки</a>
                            </div>

                            <div class='clr'></div>


                        </div><!-- /shadowblock -->

                    </div><!-- /shadowblock_out -->";
                   }?>







                    <div class="shadowblock_out widget-facebook" id="cp_facebook_like-2">

                        <? echo \frontend\widgets\FacebookWidget::widget() ?>

                    </div><!-- /shadowblock_out -->

                    <div class="shadowblock_out widget_cp_recent_posts" id="cp_recent_posts-2"><div class="shadowblock"><h2 class="dotted">Свежее из нашего блога</h2>

                            <? echo \frontend\widgets\BlogWidget::widget(['view'=>'blog_sidebar']) ?>

                        </div><!-- /shadowblock --></div><!-- /shadowblock_out -->

                    <div class="shadowblock_out widget_text" id="text-4">

                        <? echo \frontend\widgets\Text_sidebarWidget::widget() ?>

                    </div><!-- /shadowblock_out -->

                </div><!-- /content_right -->


                <div class="clr"></div>

            </div><!-- /content_res -->

        </div><!-- /content_botbg -->

    </div><!-- /content -->




</html>
