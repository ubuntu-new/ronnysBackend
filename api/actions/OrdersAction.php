<?php
namespace api\actions;

use api\models\response\Result;
use backend\models\Orders;

use api\models\response\OrdersResponse;

use yii\base\Exception;
use yii\helpers\Json;

class OrdersAction {

    public static function getList(){
        return Orders::find()
            ->where(['visible' => '1'])
            ->all();
    }


    public static function create($customer_id , $orderData){

        $transaction = \Yii::$app->db->beginTransaction();

        try {
            $orders  = new Orders();
            $orders->customer_id = $customer_id;
            $orders->orderData = serialize($orderData);
            $orders->save();

            $transaction->commit();
            return Result::SUCCESS;
        } catch (\yii\db\Exception $ex) {
            $transaction->rollBack();
            \Yii::error($ex->getMessage());
        }
        return Result::FAILURE;

    }
    public static function update($id, $customer_id , $orderData){

        $transaction = \Yii::$app->db->beginTransaction();

        try {
            $orders  = new Orders();
            $orders->customer_id = $customer_id;
            $orders->orderData = serialize($orderData);
            $orders->id = $id;
            $orders->load($id);

            $transaction->commit();
            return Result::SUCCESS;
        } catch (\yii\db\Exception $ex) {
            $transaction->rollBack();
            \Yii::error($ex->getMessage());
        }
        return Result::FAILURE;

    }


}