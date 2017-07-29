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
 * @property string $auth_key
 * @property string $nama_client
 * @property string $perusahaan
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserForm extends \yii\db\ActiveRecord
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

        public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function rules()
    {
        return [
            [['username', 'idjabatan', 'name', 'no_ktp', 'alamat_ktp', 'alamat', 'tgl_lahir', 'jenis_kelamin', 'agama', 'no_telp', 'auth_key', 'perusahaan', 'password_hash', 'email', 'created_at'], 'required'],
            [['idrole', 'status', 'created_at', 'updated_at'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['idjabatan', 'agama'], 'string', 'max' => 8],
            [['name'], 'string', 'max' => 25],
            [['no_ktp'], 'string', 'max' => 16],
            [['alamat_ktp', 'alamat'], 'string', 'max' => 50],
            [['jenis_kelamin'], 'string', 'max' => 9],
            [['no_telp'], 'string', 'max' => 14],
            [['auth_key'], 'string', 'max' => 32],
            [['perusahaan'], 'string', 'max' => 30],
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
            'alamat' => 'Alamat Korespondensi',
            'tgl_lahir' => 'Tgl Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'no_telp' => 'No Telp',
            'auth_key' => 'Auth Key',
            'nama_client' => 'Nama Client',
            'perusahaan' => 'Perusahaan',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
