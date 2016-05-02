<?php


namespace backend\modules\bcf15\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bcf15DetailCont;

/**
 * Bcf15DetailContSearch represents the model behind the search form about `backend\models\Bcf15DetailCont`.
 */
class Bcf15DetailContSearch extends Bcf15DetailCont
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bcf15_detail_id', 'jenis_pk'], 'integer'],
            [['ukuran', 'nomor_pk', 'keterangan'], 'safe'],
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
        $query = Bcf15DetailCont::find();

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
            'bcf15_detail_id' => $this->bcf15_detail_id,
            'jenis_pk' => $this->jenis_pk,
        ]);

        $query->andFilterWhere(['like', 'ukuran', $this->ukuran])
            ->andFilterWhere(['like', 'nomor_pk', $this->nomor_pk])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
