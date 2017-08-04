<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblDaftarharga;

/**
 * TblDaftarhargaSearch represents the model behind the search form about `backend\models\TblDaftarharga`.
 */
class TblDaftarhargaSearch extends TblDaftarharga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_pekerjaan'], 'integer'],
            [['item_pekerjaan', 'satuan'], 'safe'],
            [['harga_pekerjaan'], 'number'],
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
        $query = TblDaftarharga::find();

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
            'kode_pekerjaan' => $this->kode_pekerjaan,
            'harga_pekerjaan' => $this->harga_pekerjaan,
        ]);

        $query->andFilterWhere(['like', 'item_pekerjaan', $this->item_pekerjaan])
            ->andFilterWhere(['like', 'satuan', $this->satuan]);

        return $dataProvider;
    }
}
