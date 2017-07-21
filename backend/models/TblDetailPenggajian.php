<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_detail_penggajian".
 *
 * @property string $idgaji
 * @property string $idpegawai
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
            [['idgaji', 'idpegawai'], 'string', 'max' => 8],
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
        ];
    }
}
