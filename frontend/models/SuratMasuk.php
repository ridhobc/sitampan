<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "surat_masuk".
 *
 * @property string $id
 * @property string $agenda_bukus
 * @property string $tgl_terima
 * @property string $no_surat
 * @property string $tgl_surat
 * @property string $asal
 * @property string $hal
 * @property string $rinci
 * @property string $Keterangan
 * @property string $agenda_ip
 * @property string $create_at
 * @property string $create_by
 * @property string $update_at
 * @property string $update_by
 */
class SuratMasuk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_masuk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_terima', 'tgl_surat'], 'safe'],
            [['hal', 'Keterangan'], 'string'],
            [['agenda_ip'], 'required'],
            [['create_by', 'update_by'], 'integer'],
            [['agenda_bukus', 'agenda_ip', 'create_at', 'update_at'], 'string', 'max' => 45],
            [['no_surat'], 'string', 'max' => 200],
            [['asal', 'rinci'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agenda_bukus' => 'Agenda Bukus',
            'tgl_terima' => 'Tgl Terima',
            'no_surat' => 'No Surat',
            'tgl_surat' => 'Tgl Surat',
            'asal' => 'Asal',
            'hal' => 'Hal',
            'rinci' => 'Rinci',
            'Keterangan' => 'Keterangan',
            'agenda_ip' => 'Agenda Ip',
            'create_at' => 'Create At',
            'create_by' => 'Create By',
            'update_at' => 'Update At',
            'update_by' => 'Update By',
        ];
    }
}
