<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property string $order_id
 * @property string $product_id
 * @property double $qty
 * @property double $price
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['qty', 'price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'qty' => 'Qty',
            'price' => 'Price',
        ];
    }
    
    public function getOrder()
    {
        return $this->hasOne(Order::className(),['id'=>'order_id']);
    }
}
