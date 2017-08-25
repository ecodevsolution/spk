<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblJadwal;

/**
 * TblJadwalSearch represents the model behind the search form about `backend\models\TblJadwal`.
 */
class TblJadwalSearch extends TblJadwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idjadwal'], 'integer'],
            [['idspk', 'status_jadwal'], 'safe'],
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

        $spk = TblJadwal::find()
                ->joinWith('tblSpk')
                ->where(['idpenawaran'=>$mod->idpenawaran])
                ->One();

        $query = TblJadwal::find();
         if(Yii::$app->user->identity->idrole == 2){
            $query->where(['idspk'=> $spk->idspk]);
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
            'idjadwal' => $this->idjadwal,
        ]);

        $query->andFilterWhere(['like', 'idspk', $this->idspk])
            ->andFilterWhere(['like', 'status_jadwal', $this->status_jadwal]);

        return $dataProvider;
    }
}
