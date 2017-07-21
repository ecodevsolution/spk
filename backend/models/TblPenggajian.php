<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_penggajian".
 *
 * @property integer $idgaji
 * @property string $idabsensi
 * @property double $total_gaji
 * @property string $tgl_gaji
 */
class TblPenggajian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_penggajian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_gaji'], 'number'],
            [['tgl_gaji'], 'safe'],
            [['idabsensi'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idgaji' => 'Idgaji',
            'idabsensi' => 'Idabsensi',
            'total_gaji' => 'Total Gaji',
            'tgl_gaji' => 'Tgl Gaji',
        ];
    }
}
