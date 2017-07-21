<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblJabatan;

/**
 * TblJabatanSearch represents the model behind the search form about `backend\models\TblJabatan`.
 */
class TblJabatanSearch extends TblJabatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idjabatan'], 'integer'],
            [['nama_jabatan'], 'safe'],
            [['gaji'], 'number'],
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
        $query = TblJabatan::find();

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
            'idjabatan' => $this->idjabatan,
            'gaji' => $this->gaji,
        ]);

        $query->andFilterWhere(['like', 'nama_jabatan', $this->nama_jabatan]);

        return $dataProvider;
    }
}
