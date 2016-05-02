<?php

namespace backend\modules\setting\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mdm\autonumber\NextValueValidator;
use mdm\autonumber\AutoNumber;
/**
 * This is the model class for table "identitas_kantor".
 *
 * @property string $id
 * @property string $kementerian
 * @property string $eseloni
 * @property string $kanwil
 * @property string $kppbc
 * @property string $alamat1
 * @property string $alamat2
 * @property string $alamat3
 */
class IdentitasKantor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'identitas_kantor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kementerian', 'eseloni', 'kanwil', 'kppbc', 'alamat1', 'alamat2', 'alamat3'], 'required'],
            [['org_logo'], 'required', 'on'=>'insert'],
	    [['org_logo'], 'file', 'extensions' => 'jpg, jpeg, gif, png', 'skipOnEmpty' => true, 
'checkExtensionByMimeType'=>false],
             [['org_logo'], 'string'],
            [['org_logo_type'], 'string', 'max' => 35],
            [['kementerian', 'eseloni', 'kanwil', 'kppbc'], 'string', 'max' => 200],
            [['alamat1', 'alamat2', 'alamat3'], 'string', 'max' => 250],
            [['created_at','updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kementerian' => 'Kementerian',
            'eseloni' => 'Eseloni',
            'kanwil' => 'Kanwil',
            'kppbc' => 'Kppbc',
            'alamat1' => 'Alamat1',
            'alamat2' => 'Alamat2',
            'alamat3' => 'Alamat3',
        ];
    }
    public function getUserCreated() {
        return $this->hasOne(\common\models\User::className(), ['id' => 'created_by']);
    }

    public function getUserUpdated() {
        return $this->hasOne(\common\models\User::className(), ['id' => 'updated_by']);
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
