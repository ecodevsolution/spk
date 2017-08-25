<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_jadwal".
 *
 * @property integer $idjadwal
 * @property string $idspk
 * @property string $status_jadwal
 */
class TblJadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_jadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idspk'], 'string', 'max' => 8],
            [['status_jadwal'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjadwal' => 'Idjadwal',
            'idspk' => 'Idspk',
            'status_jadwal' => 'Status Jadwal',
        ];
    }

     public function getTblSpk()
    {
        return $this->hasOne(TblSpk::className(), ['idspk' => 'idspk']);
    }
}
