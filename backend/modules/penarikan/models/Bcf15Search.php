<?php

namespace backend\modules\penarikan\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\penarikan\models\Bcf15;

/**
 * Bcf15Search represents the model behind the search form about `backend\modules\penarikan\models\Bcf15`.
 */
class Bcf15Search extends Bcf15
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'penandatangan_id', 'sp', 'pejabat_sp', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status_bcf15','skep_penetapan_bcf15_id'], 'integer'],
            [['bcf15no', 'kd_bcf15', 'bcf15tgl', 'no_sp', 'tgl_sp', 'tahun'], 'safe'],
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
        $query = Bcf15::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'bcf15tgl' => $this->bcf15tgl,
            'penandatangan_id' => $this->penandatangan_id,
            'sp' => $this->sp,
            'skep_penetapan_bcf15_id' => $this->skep_penetapan_bcf15_id,
            'tgl_sp' => $this->tgl_sp,
            'pejabat_sp' => $this->pejabat_sp,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status_bcf15' => $this->status_bcf15,
        ]);

        $query->andFilterWhere(['like', 'bcf15no', $this->bcf15no])
            ->andFilterWhere(['like', 'kd_bcf15', $this->kd_bcf15])
            ->andFilterWhere(['like', 'no_sp', $this->no_sp])
            ->andFilterWhere(['like', 'tahun', $this->tahun]);

        return $dataProvider;
    }
}
