<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_daftarharga".
 *
 * @property integer $kode_pekerjaan
 * @property string $item_pekerjaan
 * @property double $harga_pekerjaan
 * @property string $satuan
 */
class TblDaftarharga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_daftarharga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['harga_pekerjaan'], 'number'],
            [['item_pekerjaan'], 'string', 'max' => 20],
            [['satuan'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_pekerjaan' => 'Kode Pekerjaan',
            'item_pekerjaan' => 'Item Pekerjaan',
            'harga_pekerjaan' => 'Harga Pekerjaan',
            'satuan' => 'Satuan',
        ];
    }
}
