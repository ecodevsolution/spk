<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_penawaran".
 *
 * @property string $idpenawaran
 * @property string $idrequest
 * @property double $total_penawaran
 */
class TblPenawaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_penawaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_penawaran'], 'number'],
            [['idpenawaran', 'idrequest',], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpenawaran' => 'Idpenawaran',
            'idrequest' => 'Idrequest',
            'total_penawaran' => 'Total Penawaran',
        ];
    }

    public function getTblSpk0()
    {
        return $this->hasOne(TblSpk::className(), ['idpenawaran' => 'idpenawaran']);
    }
    public function getTblRequest()
    {
        return $this->hasOne(TblRequest::className(), ['idrequest' => 'idrequest']);
    }
}
