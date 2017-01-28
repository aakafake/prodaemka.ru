<?php
use yii\bootstrap\Nav;

$menuMain=[];
$menuMain[]=['label' => 'Главная', 'url' => '/'];
$menuMain[]=['label' => 'Категории','items'=>[
    ['label'=>'Транспорт', 'url'=>'/main/category/?type=Транспорт'],
    ['label'=>'Недвижимость','url'=>'/main/category/?type=Недвижимость'],
    ['label'=>'Работа','url'=>'/main/category/?type=Работа'],
    ['label'=>'Личные вещи','url'=>'/main/category/?type=Личные%20вещи'],
    ['label'=>'Услуги','url'=>'/main/category/?type=Услуги'],
    ['label'=>'Все для дома и дачи','url'=>'/main/category/?type=Все%20для%20дома%20и%20дачи'],
    ['label'=>'Бытовая электроника','url'=>'/main/category/?type=Бытовая%20электроника'],
    ['label'=>'Хобби и отдых','url'=>'/main/category/?type=Хобби%20и%20отдых'],
    ['label'=>'Животные','url'=>'/main/category/?type=Животные'],
    ['label'=>'Для бизнеса','url'=>'/main/category/?type=Для%20бизнеса'],

],'options' => ['class' => 'dropdown']];
$menuMain[]=['label' => 'Блог', 'url' => '/blog'];
$menuMain[]=['label' => 'FAQ', 'url' => '/main/faq'];
$menuMain[]=['label' => 'Контакты', 'url' => '/main/contact'];

echo Nav::widget([
    'options' => ['class' => ''],
    'items' => $menuMain,
]);


?>