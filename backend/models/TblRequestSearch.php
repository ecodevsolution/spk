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
    public $client;

    public function rules()
    {
        return [
            [['client','idrequest', 'idclient', 'nama_pekerjaan', 'status'], 'safe'],
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
        $query->joinWith(['userForm']);
        if(Yii::$app->user->identity->idrole == 2){
            $query->where(['id'=>Yii::$app->user->identity->id]);
        }
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //category
		$dataProvider->sort->attributes['client']=[ 
			'asc'=>['user.name' => SORT_ASC],
			'desc'=>['user.name'=> SORT_DESC],
		];		

         if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

          // grid filtering conditions
        $query->andFilterWhere([
            'idrequest' => $this->idrequest,
			'idclient' => $this->idclient,
			'client' => $this->idclient,
            'nama_pekerjaan' => $this->nama_pekerjaan,
            'status' => $this->status            
        ]);

        // grid filtering conditions
        $query->andFilterWhere(['like', 'idrequest', $this->idrequest])
            ->andFilterWhere(['like', 'idclient', $this->idclient])
            ->andFilterWhere(['like', 'client', $this->idclient])
            ->andFilterWhere(['like', 'nama_pekerjaan', $this->nama_pekerjaan])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
