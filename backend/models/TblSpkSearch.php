<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblSpk;

/**
 * TblSpkSearch represents the model behind the search form about `backend\models\TblSpk`.
 */
class TblSpkSearch extends TblSpk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idspk', 'id', 'idpenawaran', 'area_pekerjaan', 'tgl_mulai', 'tgl_selesai'], 'safe'],
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
        $mod = TblPenawaran::find()
                ->joinWith('tblRequest')
                ->Where(['idclient'=>Yii::$app->user->identity->id])
                ->One();
        $query = TblSpk::find();
         if(Yii::$app->user->identity->idrole == 2){
             if(isset($mod)){
                $query->where(['idpenawaran'=>$mod->idpenawaran]);
             }
         }

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
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_selesai' => $this->tgl_selesai,
            'harga_pekerjaan' => $this->harga_pekerjaan,
        ]);

        $query->andFilterWhere(['like', 'idspk', $this->idspk])
            ->andFilterWhere(['like', 'idpenawaran', $this->idpenawaran])
            ->andFilterWhere(['like', 'area_pekerjaan', $this->area_pekerjaan]);

        return $dataProvider;
    }
}
