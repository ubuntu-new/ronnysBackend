<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string|null $district
 * @property string|null $status
 * @property string $address
 * @property string $created
 * @property int $user_id
 * @property string $city
 * @property string $email
 * @property string $phone
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'address'], 'string'],
            [['address', 'user_id', 'city', 'email', 'phone'], 'required'],
            [['created'], 'safe'],
            [['user_id'], 'integer'],
            [['district', 'city', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'district' => Yii::t('app', 'District'),
            'status' => Yii::t('app', 'Status'),
            'address' => Yii::t('app', 'Address'),
            'created' => Yii::t('app', 'Created'),
            'user_id' => Yii::t('app', 'User ID'),
            'city' => Yii::t('app', 'City'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
        ];
    }
}
