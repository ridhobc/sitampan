<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auto_number".
 *
 * @property string $group
 * @property integer $number
 * @property integer $optimistic_lock
 * @property integer $update_time
 */
class AutoNumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group'], 'required'],
            [['number', 'optimistic_lock', 'update_time'], 'integer'],
            [['group'], 'string', 'max' => 32],
            [['tabel'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group' => 'Group',
            'number' => 'Number',
            'optimistic_lock' => 'Optimistic Lock',
            'update_time' => 'Update Time',
            'tabel' => 'Nama tabel',
        ];
    }
}
