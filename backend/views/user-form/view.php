<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Data Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

use backend\models\TblJabatan;

$mode = TblJabatan::findOne($model->idjabatan);
?>
<div class="user-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',            
            [
                'label' => 'Jabatan',
                'value' => $mode->nama_jabatan
            ],
            'name',
            'no_ktp',
            'alamat_ktp',
            'alamat',
             [
                'label'=>'tgl Lahir',
                'value'=>date('d-m-Y',strtotime($model->tgl_lahir))
            ] , 
            
            'jenis_kelamin',
            'agama',
            'no_telp',
            // 'auth_key',
            // 'perusahaan',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'idrole',
        ],
    ]) ?>

</div>
