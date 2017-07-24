<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_request".
 *
 * @property string $idrequest
 * @property string $idclient
 * @property string $nama_pekerjaan
 * @property string $status
 */
class TblRequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_request';
    }

    /**
     * @inheritdoc
     */
     public function getUserForm()
    {
        return $this->hasOne(UserForm::className(), ['id' => 'idclient']);
    }
    
    public function rules()
    {
        return [
            [['idrequest', 'idclient', 'nama_pekerjaan', 'status'], 'required'],
            [['nama_pekerjaan'], 'string'],
            [['idrequest', 'idclient'], 'string', 'max' => 8],
            [['status'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrequest' => 'Idrequest',
            'idclient' => 'Idclient',
            'nama_pekerjaan' => 'Nama Pekerjaan',
            'status' => 'Status',
        ];
    }
}
