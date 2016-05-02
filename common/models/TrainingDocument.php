<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "training_document".
 *
 * @property integer $training_id
 * @property string $filename
 * @property string $upload_at
 * @property integer $upload_by
 *
 * @property Training $training
 */
class TrainingDocument extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'training_document';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['upload_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['upload_at'],
                ],
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['upload_by'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['upload_by'],
                ],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['training_id', 'filename'], 'required'],
            [['training_id', 'upload_by', 'upload_at'], 'integer'],
            //[['filename'], 'string', 'max' => 255],
            [['filename'], 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'training_id' => 'Training ID',
            'filename' => 'Filename',
            'upload_at' => 'Upload At',
            'upload_by' => 'Upload By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTraining()
    {
        return $this->hasOne(Training::className(), ['id' => 'training_id']);
    }
}
