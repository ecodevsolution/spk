<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblPembayaran;

/**
 * TblPembayaranSearch represents the model behind the search form about `backend\models\TblPembayaran`.
 */
class TblPembayaranSearch extends TblPembayaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpembayaran', 'idspk', 'tgl_bayar'], 'safe'],
            [['total_bayar'], 'number'],
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
        $query = TblPembayaran::find();

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
            'tgl_bayar' => $this->tgl_bayar,
            'total_bayar' => $this->total_bayar,
        ]);

        $query->andFilterWhere(['like', 'idpembayaran', $this->idpembayaran])
            ->andFilterWhere(['like', 'idspk', $this->idspk]);

        return $dataProvider;
    }
}
