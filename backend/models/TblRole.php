<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_role".
 *
 * @property integer $idrole
 * @property string $nama
 */
class TblRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 50],
            [['nama'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrole' => 'Idrole',
            'nama' => 'Nama',
        ];
    }
}
