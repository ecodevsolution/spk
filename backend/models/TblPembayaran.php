<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_pembayaran".
 *
 * @property string $idpembayaran
 * @property string $idspk
 * @property string $tgl_bayar
 * @property double $total_bayar
 */
class TblPembayaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_pembayaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpembayaran', 'idspk', 'tgl_bayar', 'total_bayar'], 'required'],
            [['tgl_bayar'], 'safe'],
            [['total_bayar'], 'number'],
            [['idpembayaran', 'idspk'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpembayaran' => 'Idpembayaran',
            'idspk' => 'Idspk',
            'tgl_bayar' => 'Tgl Bayar',
            'total_bayar' => 'Total Bayar',
        ];
    }
}
