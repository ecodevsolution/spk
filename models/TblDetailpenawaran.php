<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_detailpenawaran".
 *
 * @property string $idpenawaran
 * @property string $kode_pekerjaan
 * @property string $quantity
 * @property double $satuan_harga
 */
class TblDetailpenawaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_detailpenawaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['satuan_harga'], 'number'],
            [['idpenawaran', 'quantity'], 'string', 'max' => 8],
            [['kode_pekerjaan'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpenawaran' => 'Idpenawaran',
            'kode_pekerjaan' => 'Kode Pekerjaan',
            'quantity' => 'Quantity',
            'satuan_harga' => 'Satuan Harga',
        ];
    }
}
