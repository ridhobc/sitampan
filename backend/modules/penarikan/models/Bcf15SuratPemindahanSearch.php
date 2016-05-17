<?php

namespace backend\modules\penarikan\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bcf15SuratPemindahan;

/**
 * Bcf15SuratPemindahanSearch represents the model behind the search form about `backend\models\Bcf15SuratPemindahan`.
 */
class Bcf15SuratPemindahanSearch extends Bcf15SuratPemindahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_surat', 'tgl_surat', 'nd_dari_kasipab', 'nd_daftar_bcf15', 'nd_daftar_sp', 'nd_penandatangan_kasipab', 'surat_penandatangan_kakantor', 'no_nd_kasipab', 'tgl_nd_kasipab'], 'safe'],
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
        $query = Bcf15SuratPemindahan::find();

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
            'tgl_surat' => $this->tgl_surat,
            'tgl_nd_kasipab' => $this->tgl_nd_kasipab,
        ]);

        $query->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['like', 'nd_dari_kasipab', $this->nd_dari_kasipab])
            ->andFilterWhere(['like', 'nd_daftar_bcf15', $this->nd_daftar_bcf15])
            ->andFilterWhere(['like', 'nd_daftar_sp', $this->nd_daftar_sp])
            ->andFilterWhere(['like', 'nd_penandatangan_kasipab', $this->nd_penandatangan_kasipab])
            ->andFilterWhere(['like', 'surat_penandatangan_kakantor', $this->surat_penandatangan_kakantor])
            ->andFilterWhere(['like', 'no_nd_kasipab', $this->no_nd_kasipab]);

        return $dataProvider;
    }
}
