<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "status_bcf15_detail".
 *
 * @property string $id
 * @property string $nmstatus_detail
 */
class StatusBcf15Detail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_bcf15_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nmstatus_detail'], 'required'],
            [['nmstatus_detail'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nmstatus_detail' => 'Nmstatus Detail',
        ];
    }
}
