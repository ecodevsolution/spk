<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblPenawaran;

/**
 * TblPenawaranSearch represents the model behind the search form about `backend\models\TblPenawaran`.
 */
class TblPenawaranSearch extends TblPenawaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpenawaran', 'idrequest'], 'safe'],
            [['total_penawaran'], 'number'],
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
        $query = TblPenawaran::find();

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
            'total_penawaran' => $this->total_penawaran,
        ]);

        $query->andFilterWhere(['like', 'idpenawaran', $this->idpenawaran])
            ->andFilterWhere(['like', 'idrequest', $this->idrequest]);

        return $dataProvider;
    }
}
