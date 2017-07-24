<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_spk".
 *
 * @property string $idspk
 * @property string $idpegawai
 * @property string $idpenawaran
 * @property string $area_pekerjaan
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property double $harga_pekerjaan
 */
class TblSpk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_spk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idspk'], 'required'],
            [['tgl_mulai', 'tgl_selesai'], 'safe'],
            [['harga_pekerjaan'], 'number'],
            [['idspk', 'idpegawai','idpenawaran'], 'string', 'max' => 8],
            [['area_pekerjaan'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idspk' => 'Idspk',
            'idpegawai' => 'Idpegawai',
            'idpenawaran' => 'Idpenawaran',
            'area_pekerjaan' => 'Area Pekerjaan',
            'tgl_mulai' => 'Tgl Mulai',
            'tgl_selesai' => 'Tgl Selesai',
            'harga_pekerjaan' => 'Harga Pekerjaan',
        ];
    }
    public function getTblPenawaran()
    {
        return $this->hasOne(TblPenawaran::className(), ['idpenawaran' => 'idpenawaran']);
    }
    
}
