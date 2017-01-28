<?php
use yii\helpers\Html;
?>

<div class="searchblock_out">

    <div class="searchblock">
        <?=\yii\helpers\Html::beginForm(\yii\helpers\Url::to('/main/find/') ,'get',['class'=>'form_search', 'id'=>'searchform']) ?>



        <div class="searchfield">

            <?=Html::textInput('propert', '', ['class' => 'editbox_search', 'placeholder' => 'Поиск', 'required'=>'required']) ?>


        </div>

        <div class="searchbutcat">

            <button class="dashicons-before btn-topsearch" type="submit" tabindex="3" title="Search Ads" id="go" value="search" name="sa"></button>


            <?= Html::dropDownList('category', 'Все категории', [''=>'Все категории' ,'Транспорт'=>'Транспорт', 'Недвижимость'=>'Недвижимость', 'Работа'=>'Работа', 'Услуги'=>'Услуги', 'Личные вещи'=>'Личные вещи', 'Для дома и дачи'=>'Для дома и дачи', 'Бытовая электроника'=>'Бытовая электроника', 'Хобби и отдых'=>'Хобби и отдых', 'Животные'=>'Животные' ,'Для бизнеса'=>'Для бизнеса'],['class'=>'searchbar','id'=>'scat']) ?>

        </div>




        <?=\yii\helpers\Html::endForm() ?>

    </div> <!-- /searchblock -->

</div> <!-- /searchblock_out -->