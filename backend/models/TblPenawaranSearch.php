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
    public $request;

    public function rules()
    {
        return [
            [['request','idpenawaran', 'idrequest'], 'safe'],
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
        $query->joinWith(['tblRequest']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['request']=[ 
			'asc'=>['tbl_request.nama_pekerjaan' => SORT_ASC],
			'desc'=>['tbl_request.nama_pekerjaan'=> SORT_DESC],
		];		

         if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'total_penawaran' => $this->total_penawaran,
            'idrequest' => $this->idrequest,
            'request' => $this->request,
        ]);

        $query->andFilterWhere(['like', 'idpenawaran', $this->idpenawaran])
            ->andFilterWhere(['like', 'request', $this->idrequest])
            ->andFilterWhere(['like', 'idrequest', $this->idrequest]);

        return $dataProvider;
    }
}
