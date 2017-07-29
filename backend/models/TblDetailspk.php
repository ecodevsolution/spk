<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_detailspk".
 *
 * @property string $idspk
 * @property string $id
 */
class TblDetailspk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_detailspk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idspk', 'id'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idspk' => 'Idspk',
            'id' => 'Id',
        ];
    }
}
