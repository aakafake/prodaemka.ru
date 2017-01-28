<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content">

    <div class="content_botbg">

        <div class="content_res">

            <div id="breadcrumb"><div id="crumbs">
                    <div class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><span class="trail-begin"><a href="http://demos.appthemes.com/classipress" title="ClassiPress Demo" rel="home">Home</a></span>
                        <span class="sep">&raquo;</span> <span class="trail-end"><?= Html::encode($this->title) ?></span>
                    </div></div></div>
            <h1><?= Html::encode($this->title) ?></h1>

<div class="advert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div id="map_canvas" style="width:640px; height:380px"></div><br/>

    <?= $form->field($model, 'location')->hiddenInput()->label(false) ?>


    <?= $form->field($model, 'category')->dropDownList(['Транспорт'=>'Транспорт', 'Недвижимость'=>'Недвижимость', 'Работа'=>'Работа', 'Услуги'=>'Услуги', 'Личные вещи'=>'Личные вещи', 'Для дома и дачи'=>'Для дома и дачи', 'Бытовая электроника'=>'Бытовая электроника', 'Хобби и отдых'=>'Хобби и отдых', 'Животные'=>'Животные' ,'Для бизнеса'=>'Для бизнеса']) ?>



    <script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
    <?

    $this->registerJs("

         var myMap;
                     ymaps.ready(init);
                     function init()
                         {myMap = new ymaps.Map('map_canvas', {
                         center: [55.832995, 37.549956],
                         zoom: 17,
                         behaviors: ['default', 'scrollZoom']});

                     myMap.controls.add('zoomControl');

                     myMap.controls.add('typeSelector');
                     }



           $( '#advert-address' ).change(function() {

              var t=document.getElementById('advert-address').value;

              ymaps.geocode(t,{results:1}).then(
              function(res){  var MyGeoObj = res.geoObjects.get(0);




              var myPlacemark = new ymaps.Placemark([MyGeoObj.geometry.getCoordinates()[0], MyGeoObj.geometry.getCoordinates()[1]]);
              myMap.geoObjects.add(myPlacemark);
              myMap.setCenter([MyGeoObj.geometry.getCoordinates()[0], MyGeoObj.geometry.getCoordinates()[1]], 17, {
                  checkZoomRange: true
              });

                $('#advert-location').val([MyGeoObj.geometry.getCoordinates()[0], MyGeoObj.geometry.getCoordinates()[1]]);
              });


              });





  ");

    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Next' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

        </div><!-- /content_res -->

    </div><!-- /content_botbg -->

</div><!-- /content -->