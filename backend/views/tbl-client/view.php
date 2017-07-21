<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblClient */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-client-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            // 'idjabatan',
            // 'idrole',
            'name',
            // 'no_ktp',
            // 'alamat_ktp',
            // 'alamat',
            'tgl_lahir',
            'jenis_kelamin',
            // 'agama',
            'no_telp',
            'perusahaan',
            'email:email',
            // 'password_hash',
            // 'auth_key',
            // 'password_reset_token',
            // 'status',
            // 'created_at',
            // 'updated_at',
        ],
    ]) ?>

</div>
