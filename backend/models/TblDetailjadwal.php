<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_detailjadwal".
 *
 * @property integer $idjadwal
 * @property string $idpegawai
 */
class TblDetailjadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_detailjadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpegawai'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjadwal' => 'Idjadwal',
            'idpegawai' => 'Idpegawai',
        ];
    }
}
