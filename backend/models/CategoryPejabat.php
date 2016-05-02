<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category_pejabat".
 *
 * @property string $id
 * @property string $nmcategory
 *
 * @property Penandatangan[] $penandatangans
 */
class CategoryPejabat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_pejabat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nmcategory'], 'required'],
            [['nmcategory'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nmcategory' => 'Nmcategory',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenandatangans()
    {
        return $this->hasMany(Penandatangan::className(), ['category' => 'id']);
    }
}
