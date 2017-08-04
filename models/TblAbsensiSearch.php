<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblAbsensi;

/**
 * TblAbsensiSearch represents the model behind the search form about `backend\models\TblAbsensi`.
 */
class TblAbsensiSearch extends TblAbsensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idabsensi'], 'integer'],
            [['idspk', 'verifikasi_1', 'verifikasi_2'], 'safe'],
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
        $query = TblAbsensi::find();

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
            'idabsensi' => $this->idabsensi,
        ]);

        $query->andFilterWhere(['like', 'idspk', $this->idspk])
            ->andFilterWhere(['like', 'verifikasi_1', $this->verifikasi_1])
            ->andFilterWhere(['like', 'verifikasi_2', $this->verifikasi_2]);

        return $dataProvider;
    }
}
