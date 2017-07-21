<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_detailabsensi".
 *
 * @property integer $idabsensi
 * @property string $idpegawai
 * @property string $tanggal
 * @property string $jam_masuk
 * @property string $jam_keluar
 * @property string $pengganti
 */
class TblDetailabsensi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_detailabsensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal', 'jam_masuk', 'jam_keluar'], 'safe'],
            [['idpegawai'], 'string', 'max' => 8],
            [['pengganti'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idabsensi' => 'Idabsensi',
            'idpegawai' => 'Idpegawai',
            'tanggal' => 'Tanggal',
            'jam_masuk' => 'Jam Masuk',
            'jam_keluar' => 'Jam Keluar',
            'pengganti' => 'Pengganti',
        ];
    }
}
