<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserForm;

/**
 * UserFormSearch represents the model behind the search form about `backend\models\UserForm`.
 */
class UserFormSearch extends UserForm
{
    /**
     * @inheritdoc
     */
    public $jabatan;
    public function rules()
    {
        return [
            [['id', 'idrole', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username','jabtan', 'idjabatan', 'name', 'no_ktp', 'alamat_ktp', 'alamat', 'tgl_lahir', 'jenis_kelamin', 'agama', 'no_telp', 'auth_key',  'perusahaan', 'password_hash', 'password_reset_token', 'email'], 'safe'],
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
        $query = UserForm::find();
        $query->joinWith(['tblJabatan']);
        $query->Where(['idrole'=> 1]);
        

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

         if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idrole' => $this->idrole,
            'tgl_lahir' => $this->tgl_lahir,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'idjabatan', $this->idjabatan])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'alamat_ktp', $this->alamat_ktp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'perusahaan', $this->perusahaan])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
