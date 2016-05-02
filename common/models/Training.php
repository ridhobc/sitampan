<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "training".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $start
 * @property string $end
 * @property integer $create_at
 * @property integer $create_by
 * @property integer $update_at
 * @property integer $update_by
 *
 * @property TrainingDocument $trainingDocument
 * @property TrainingUser[] $trainingUsers
 */
class Training extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'training';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['update_at','create_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
                ],
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['update_by','create_by'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['update_by'],
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
            [['name', 'start', 'end'], 'required'],
            [['description'], 'string'],
            [['start', 'end'], 'safe'],
            [['create_at', 'create_by', 'update_at', 'update_by'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'start' => 'Start',
            'end' => 'End',
            'create_at' => 'Create At',
            'create_by' => 'Create By',
            'update_at' => 'Update At',
            'update_by' => 'Update By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingDocument()
    {
        return $this->hasOne(TrainingDocument::className(), ['training_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingUsers()
    {
        return $this->hasMany(TrainingUser::className(), ['training_id' => 'id']);
    }
}
