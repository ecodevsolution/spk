<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_absensi".
 *
 * @property integer $idabsensi
 * @property string $idspk
 * @property string $verifikasi_1
 * @property string $verifikasi_2
 */
class TblAbsensi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idspk', 'verifikasi_1', 'verifikasi_2'], 'required'],
            [['idspk'], 'string', 'max' => 8],
            [['verifikasi_1', 'verifikasi_2'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idabsensi' => 'Idabsensi',
            'idspk' => 'Idspk',
            'verifikasi_1' => 'Verifikasi 1',
            'verifikasi_2' => 'Verifikasi 2',
        ];
    }
}
