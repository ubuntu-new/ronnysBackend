<?php
namespace api\actions;


use api\models\response\NewsResponse;

use yii\base\Exception;
use yii\helpers\Json;

class NewsAction {
    public static function getList(){
       //return Products::find()->all();

        //$sql = "select * from products";
        $sql = "SELECT {{i}}.*,{{m}}.[[filePath]] FROM {{news}} {{i}} 
                    LEFT JOIN {{image}} {{m}} ON {{m}}.[[itemId]] = [[i]].[[id]] AND {{m}}.[[modelName]] = 'News' AND {{m}}.[[isMain]] = '1'";

        $cmd = \Yii::$app ->db->createCommand($sql)->queryAll(\PDO::FETCH_ASSOC);
        return $cmd;
    }
}