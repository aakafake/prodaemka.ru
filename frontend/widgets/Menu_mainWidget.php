<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.12.16
 * Time: 0:30
 */
namespace frontend\widgets;

use yii\base\Widget;

class Menu_mainWidget extends  Widget{


    public function run(){


        return $this->render('menu_main');
    }
}