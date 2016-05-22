<?php

namespace backend\modules\penyelesaian\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bcf15Penyelesaian;

/**
 * Bcf15PenyelesaianSearch represents the model behind the search form about `backend\models\Bcf15Penyelesaian`.
 */
class Bcf15PenyelesaianSearch extends Bcf15Penyelesaian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'petugas_penerima_dok'], 'integer'],
            [['nomor_permohonan', 'tgl_permohonan', 'hal_permohonan', 'tgl_masuk', 'tgl_dikembalikan', 'tgl_terima_lengkap', 'nama_pemohon', 'alamat_pemohon', 'kota_pemohon', 'no_telp_petugas_ppjk', 'nama_petugas_ppjk', 'email_pemohon', 'nip_petugas_penerima', 'status_lengkap', 'status_penyelesaian', 'ur_kekurangan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Bcf15Penyelesaian::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tgl_permohonan' => $this->tgl_permohonan,
            'tgl_masuk' => $this->tgl_masuk,
            'tgl_dikembalikan' => $this->tgl_dikembalikan,
            'tgl_terima_lengkap' => $this->tgl_terima_lengkap,
            'petugas_penerima_dok' => $this->petugas_penerima_dok,
        ]);

        $query->andFilterWhere(['like', 'nomor_permohonan', $this->nomor_permohonan])
            ->andFilterWhere(['like', 'hal_permohonan', $this->hal_permohonan])
            ->andFilterWhere(['like', 'nama_pemohon', $this->nama_pemohon])
            ->andFilterWhere(['like', 'alamat_pemohon', $this->alamat_pemohon])
            ->andFilterWhere(['like', 'kota_pemohon', $this->kota_pemohon])
            ->andFilterWhere(['like', 'no_telp_petugas_ppjk', $this->no_telp_petugas_ppjk])
            ->andFilterWhere(['like', 'nama_petugas_ppjk', $this->nama_petugas_ppjk])
            ->andFilterWhere(['like', 'email_pemohon', $this->email_pemohon])
            ->andFilterWhere(['like', 'nip_petugas_penerima', $this->nip_petugas_penerima])
            ->andFilterWhere(['like', 'status_lengkap', $this->status_lengkap])
            ->andFilterWhere(['like', 'status_penyelesaian', $this->status_penyelesaian])
            ->andFilterWhere(['like', 'ur_kekurangan', $this->ur_kekurangan]);

        return $dataProvider;
    }
}
