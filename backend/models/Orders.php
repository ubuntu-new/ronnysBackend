<?php

namespace backend\models;
use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $orderData
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $statuss
 * @property string|null $visible
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'orderData'], 'required'],
            [['customer_id'], 'integer'],
            [['orderData', 'statuss', 'visible'], 'string'],
            [['created_at', 'updated_at','id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'orderData' => 'Order Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'statuss' => 'Statuss',
            'visible' => 'Visible',
        ];
    }
}
