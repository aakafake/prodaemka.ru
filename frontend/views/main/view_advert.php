<?php
use rmrevin\yii\module\Comments;
?>


<div id="search-bar">

    <? echo \frontend\widgets\SearchWidget::widget() ?>

</div> <!-- /search-bar -->



    <div class="content">

        <div class="content_botbg">

            <div class="content_res">

                <div id="breadcrumb"><div id="crumbs">
                        <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
                            <span class="sep"><a href="/">Главная</a> / <?php echo $model->title ?></span>
                        </div></div></div>

                <div class="clr"></div>

                <div class="content_left">



                    <div class="shadowblock_out featured">

                        <div class="shadowblock">


                            <div class="tags price-wrap">
                                <span class="tag-head"><p class="post-price"><?=$model->price ?></p></span>
                            </div>


                            <h1 class="single-listing"><a href="#" title="<?=$model->title ?>"><?=$model->title ?></a></h1>

                            <div class="clr"></div>


                            <div class="pad5 dotted"></div>

                            <div class="bigright ">

                                <ul>

                                    <li id="cp_street" class=""><span>Адрес:</span> <?=$model->address?></li>
                                    <li id="cp_city" class=""><span>Размещено:</span> <?=date('d.m.Y', $model->created_at)?></li>
                                    <li id="cp_city" class=""><span>Обновлено:</span> <?=date('d.m.Y', $model->updated_at)?></li>
                                    <li id="cp_state" class=""><span>Просмотров:</span> <?=$model->views?> </li>

                                </ul>

                            </div><!-- /bigright -->



                            <div class="bigleft">

                                <div id="main-pic">


                                    <a href="<?=\frontend\components\Common::getImageAdvert($model)[0] ?>" class="img-main" data-rel="colorbox" title="<?=$model->title ?>"><img class="img-responsive" src="<?=\frontend\components\Common::getImageAdvert($model)[0] ?>" title="<?=$model->title ?>" alt="<?=$model->title ?>" /></a>
                                    <div class="clr"></div>

                                </div>

                                <div id="thumbs-pic">
                                    <?
                                    foreach($images as $image):
                                    ?>

                                    <a href="<?=$image ?>" id="thumb1" class="post-gallery" data-rel="colorbox" title="<?=$model->title ?>"><img src="<?=$image ?>" alt="<?=$model->title ?>" title="<?=$model->title ?>" width="50" height="50" /></a>

                                        <?
                                    endforeach
                                    ?>
                                    <div class="clr"></div>

                                </div>


                            </div><!-- /bigleft -->


                            <div class="clr"></div>


                            <div class="single-main">


                                <h3 class="description-area">Описание</h3>

                                <p><?=$model->description ?></p>

                            </div>



                           </div><!-- /shadowblock -->

                    </div><!-- /shadowblock_out -->



                    <div class="clr"></div>



                    <div class="shadowblock_out start">

                        <div class="shadowblock">

                            <div id="comments">



                                <div id="comments_wrap">

                                    <?php
                                    echo Comments\widgets\CommentListWidget::widget([
                                    'entity' => (string) 'advert-'.$model->id, // type and id
                                    ]);
                                    ?>




                                </div> <!-- /comments_wrap -->

                            </div><!-- /comments -->

                        </div><!-- /shadowblock -->

                    </div><!-- /shadowblock_out -->


                </div><!-- /content_left -->


                <!-- right sidebar -->
                <div class="content_right">

                    <div class="tabprice">

                        <ul class="tabnavig">
                            <li><a href="#priceblock1"><span class="big">Карта</span></a></li>			<li><a href="#priceblock2"><span class="big">Контакты</span></a></li>
                            <li><a href="#priceblock3"><span class="big">Разместил</span></a></li>
                        </ul>


                        <!-- tab 1 -->
                        <div id="priceblock1" class="sidebar-block">

                            <div class="clr"></div>

                            <div class="singletab">


                                <div id="gmap" class="mapblock">


                                    <script type="text/javascript">var address = "2265 Octavia St&nbsp;San Francisco&nbsp;California&nbsp;94123";</script>

                                    <script type="text/javascript">
                                        //<![CDATA[
                                        jQuery(document).ready(function($) {
                                            var clicked = false;

                                            if( $('#priceblock1').is(':visible') ) {
                                                map_init();
                                            } else {
                                                jQuery('a[href="#priceblock1"]').click( function() {
                                                    if( !clicked ) {
                                                        map_init();
                                                        clicked = true;
                                                    }
                                                });
                                            }

                                        });


                                        //var directionDisplay;
                                        //var directionsService = new google.maps.DirectionsService();
                                        var map = null;
                                        var marker = null;
                                        var infowindow = null;
                                        var geocoder = null;
                                        var fromAdd;
                                        var toAdd;
                                        var redFlag = "http://demos.appthemes.com/classipress/wp-content/themes/classipress/images/red-flag.png";
                                        var noLuck = "http://demos.appthemes.com/classipress/wp-content/themes/classipress/images/gmaps-no-result.gif";
                                        var adTitle = "Acoustic Guitar";
                                        var contentString = '<div id="mcwrap"><span>' + adTitle + '</span><br />' + address + '</div>';

                                        function map_init() {
                                            jQuery(document).ready(function($) {
                                                $('#map').hide();
                                                load();
                                                $('#map').fadeIn(1000);
                                                codeAddress();
                                            });
                                        }



                                    </script>



                                    <div id="myMap" style="height: 400px;">
                                        <script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
                                        <?php $this->registerJs("
                            
                             var myMap;                                                 
            ymaps.ready(init);                              
            function init()                                 
                {myMap = new ymaps.Map('myMap', {      
                center: [$map[0], $map[1]],             
                zoom: 17,                                   
                behaviors: ['default', 'scrollZoom']});     
                                                            
            myMap.controls.add('zoomControl');              
                                                            
            myMap.controls.add('typeSelector');
            
            var myPlacemark = new ymaps.Placemark([$map[0], $map[1]]);             
myMap.geoObjects.add(myPlacemark);                                                                                                 
            }                                               
                                                              
                            ")?>
                                    </div>

                                </div>



                            </div><!-- /singletab -->

                        </div>



                        <!-- tab 2 -->
                        <div id="priceblock2" class="sidebar-block">

                            <div class="clr"></div>

                            <div class="singletab">


                                <form name="mainform" id="mainform" class="form_contact" action="#priceblock2" method="post" enctype="multipart/form-data">

                                    <input type="hidden" id="_cp_contact_nonce" name="_cp_contact_nonce" value="a7f6950022" /><input type="hidden" name="_wp_http_referer" value="/classipress/ads/acoustic-guitar/" />

                                    <p class="dashicons-before contact_msg"></p>


                                    <?
                                    $form = \yii\bootstrap\ActiveForm::begin();
                                    ?>
                                    <?=$form->field($model_feedback,'email')->textInput(['value' => $current_user['email'], 'placeholder' => 'Email','class'=>'text'])->label(false) ?>
                                    <?=$form->field($model_feedback,'name')->textInput(['value' => $current_user['username'], 'placeholder' => 'Имя','class'=>'text'])->label(false) ?>
                                    <?=$form->field($model_feedback,'text')->textarea(['rows' => 6, 'placeholder' => 'Ваше сообщение','class'=>'text'])->label(false) ?>
                                    <button type="submit" class="btn_orange" name="Submit">Связаться</button>

                                    <?
                                    \yii\bootstrap\ActiveForm::end();
                                    ?>


                                    <input type="hidden" name="send_email" value="yes" />

                                </form>

                            </div><!-- /singletab -->

                        </div><!-- /priceblock2 -->


                        <!-- tab 3 -->
                        <div id="priceblock3" class="sidebar-block">

                            <div class="clr"></div>

                            <div class="postertab">

                                <div class="priceblocksmall dotted">


                                    <div id="userphoto">
                                        <p class='image-thumb'>
                                           <!-- <img alt='' src='../uploads/users/small_1.jpg' srcset='../uploads/users/small_1.jpg' class='avatar avatar-140 photo' height='140' width='140' />
                                        -->
                                            <?=\yii\helpers\Html::img(\common\components\UserComponent::getUserImage($model->user->id), ['class' => 'avatar']) ?>

                                        </p>
                                    </div>

                                    <ul class="member">

                                        <li><span>Опубликовал:</span>
                                            <p><?=$model->user->username ?></p>
                                        </li>

                                        <li><span>Зарегистрирован:</span> <?=date('d.m.Y', $model->user->created_at)?></li></li>

                                    </ul>


                                    <div class="pad5"></div>

                                    <div class="clr"></div>

                                </div>

                                <div class="pad5"></div>

                                <h3>Еще предложения от <?=$model->user->username ?></h3>

                                <div class="pad5"></div>

                                <ul>

                                    <?
                                    foreach($user_advert as $key):
                                    ?>

                                    <li class="dashicons-before"><a href="<?=\frontend\components\Common::getUrlAdvert($key) ?>">
                                            <?=$key->title ?>

                                        </a></li>
                                    <?
                                   endforeach;
                                    ?>


                                </ul>

                                <div class="pad5"></div>


                            </div><!-- /singletab -->

                        </div><!-- /priceblock3 -->

                    </div><!-- /tabprice -->



                    <div class="shadowblock_out widget-top-ads-overall" id="top_ads_overall-3">

                        <? echo \frontend\widgets\TopWidget::widget(['view'=>'top']) ?>

                    </div><!-- /shadowblock_out -->

                    <div class="shadowblock_out widget-facebook" id="cp_facebook_like-3">

                        <? echo \frontend\widgets\FacebookWidget::widget() ?>

                    </div><!-- /shadowblock_out -->


                </div><!-- /content_right -->

                <div class="clr"></div>

            </div><!-- /content_res -->

        </div><!-- /content_botbg -->

    </div><!-- /content -->






