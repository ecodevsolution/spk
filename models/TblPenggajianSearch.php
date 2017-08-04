<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblPenggajian;

/**
 * TblPenggajianSearch represents the model behind the search form about `backend\models\TblPenggajian`.
 */
class TblPenggajianSearch extends TblPenggajian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idgaji'], 'integer'],
            [['idabsensi', 'tgl_gaji'], 'safe'],
            [['total_gaji'], 'number'],
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
        $query = TblPenggajian::find();

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
            'idgaji' => $this->idgaji,
            'total_gaji' => $this->total_gaji,
            'tgl_gaji' => $this->tgl_gaji,
        ]);

        $query->andFilterWhere(['like', 'idabsensi', $this->idabsensi]);

        return $dataProvider;
    }
}
