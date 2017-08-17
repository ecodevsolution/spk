<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_jabatan".
 *
 * @property integer $idjabatan
 * @property string $nama_jabatan
 * @property double $gaji
 */
class TblJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gaji'], 'number'],
            [['nama_jabatan','gaji'],'required'],
            [['nama_jabatan'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idjabatan' => 'Idjabatan',
            'nama_jabatan' => 'Nama Jabatan',
            'gaji' => 'Gaji',
        ];
    }
}
