<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.12.16
 * Time: 0:30
 */
namespace frontend\widgets;

use yii\base\Widget;
use yii\db\Query;

class TopWidget extends  Widget{

    private $_query;

    public $view;

    public function init(){
        $this->_query = new Query();
    }

    public function run(){

        $query = $this->_query;
        $result = $query->from('advert')->orderBy(['views'=>SORT_DESC])->limit(5)->all();

        return $this->render($this->view,['result' => $result]);
    }
}