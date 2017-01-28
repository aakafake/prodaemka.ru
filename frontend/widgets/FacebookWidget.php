<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.12.16
 * Time: 0:30
 */
namespace frontend\widgets;

use yii\base\Widget;

class FacebookWidget extends  Widget{


    public function run(){

        return $this->render('facebook');
    }
}