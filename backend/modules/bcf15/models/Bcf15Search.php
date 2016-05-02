<?php

namespace backend\modules\bcf15\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bcf15;

/**
 * Bcf15Search represents the model behind the search form about `backend\models\Bcf15`.
 */
class Bcf15Search extends Bcf15
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'penandatangan_id','status_bcf15'], 'integer'],
            [['bcf15no', 'bcf15tgl','tahun','no_sp'], 'safe'],
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
            'status_bcf15' => $this->status_bcf15,
        ]);

        $query->andFilterWhere(['like', 'bcf15no', $this->bcf15no])
                ->andFilterWhere(['like', 'tahun', $this->tahun])
                ->andFilterWhere(['like', 'no_sp', $this->no_sp]);

        return $dataProvider;
    }
}
