<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblRequest;

/**
 * TblRequestSearch represents the model behind the search form about `backend\models\TblRequest`.
 */
class TblRequestSearch extends TblRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrequest', 'idclient', 'nama_pekerjaan', 'status'], 'safe'],
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
        $query = TblRequest::find();

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
        $query->andFilterWhere(['like', 'idrequest', $this->idrequest])
            ->andFilterWhere(['like', 'idclient', $this->idclient])
            ->andFilterWhere(['like', 'nama_pekerjaan', $this->nama_pekerjaan])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
