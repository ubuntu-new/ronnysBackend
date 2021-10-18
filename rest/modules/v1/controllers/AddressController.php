<?php
namespace rest\modules\v1\controllers;

use api\actions\AddressAction;

use rest\controllers\RestController;
use yii\base\Security;
use rest\models\response\Response;

class AddressController extends RestController  {


    public  function actionList(){
        //$rcxa = \Yii::$app->request->post('name');
        return AddressAction::getList();
    }

}