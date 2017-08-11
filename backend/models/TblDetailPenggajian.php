<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_detail_penggajian".
 *
 * @property integer $idgaji
 * @property integer $idpegawai
 * @property double $total_gaji
 */
class TblDetailPenggajian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_detail_penggajian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idgaji', 'idpegawai'], 'required'],
            [['idgaji', 'idpegawai'], 'integer'],
            [['total_gaji'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idgaji' => 'Idgaji',
            'idpegawai' => 'Idpegawai',
            'total_gaji' => 'Total Gaji',
        ];
    }
}
