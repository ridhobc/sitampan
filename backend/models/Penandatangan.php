<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mdm\autonumber\NextValueValidator;
use mdm\autonumber\AutoNumber;
/**
 * This is the model class for table "penandatangan".
 *
 * @property integer $id
 * @property string $jabatan
 * @property string $namapejabat
 * @property string $nippejabat
 * @property string $category
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $is_status
 *
 * @property Bcf15[] $bcf15s
 * @property CategoryPejabat $category0
 */
class Penandatangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penandatangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jabatan', 'namapejabat', 'nippejabat'], 'required'],
            [['category', 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_status'], 'integer'],
            [['jabatan', 'namapejabat', 'nippejabat'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jabatan' => 'Jabatan',
            'namapejabat' => 'Nama',
            'nippejabat' => 'NIP',
            'category' => 'Category',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Is Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBcf15s()
    {
        return $this->hasMany(Bcf15::className(), ['penandatangan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(CategoryPejabat::className(), ['id' => 'category']);
    }
    public function getUserCreated() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUserUpdated() {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    
    public function behaviors() {
        return [
            
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_at', 'created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            'bleamble' => [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_by', 'created_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],
            ]
        ];
    }
}

