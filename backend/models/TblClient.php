<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $idjabatan
 * @property integer $idrole
 * @property string $name
 * @property string $no_ktp
 * @property string $alamat_ktp
 * @property string $alamat
 * @property string $tgl_lahir
 * @property string $jenis_kelamin
 * @property string $agama
 * @property string $no_telp
 * @property string $perusahaan
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class TblClient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'idjabatan', 'name', 'no_ktp', 'alamat_ktp', 'alamat', 'tgl_lahir', 'jenis_kelamin', 'agama', 'no_telp', 'perusahaan', 'email', 'password_hash', 'auth_key', 'created_at'], 'required'],
            [['idrole', 'status', 'created_at', 'updated_at'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['username', 'email', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['idjabatan', 'agama'], 'string', 'max' => 8],
            [['name'], 'string', 'max' => 25],
            [['no_ktp'], 'string', 'max' => 16],
            [['alamat_ktp', 'alamat'], 'string', 'max' => 50],
            [['jenis_kelamin'], 'string', 'max' => 9],
            [['no_telp'], 'string', 'max' => 14],
            [['perusahaan'], 'string', 'max' => 30],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'idjabatan' => 'Idjabatan',
            'idrole' => 'Idrole',
            'name' => 'Name',
            'no_ktp' => 'No Ktp',
            'alamat_ktp' => 'Alamat Ktp',
            'alamat' => 'Alamat',
            'tgl_lahir' => 'Tgl Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'no_telp' => 'No Telp',
            'perusahaan' => 'Perusahaan',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
