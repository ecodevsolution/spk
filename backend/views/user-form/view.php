<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-form-view">

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
            'idjabatan',
            'name',
            'no_ktp',
            'alamat_ktp',
            'alamat',
            'tgl_lahir',
            'jenis_kelamin',
            'agama',
            'no_telp',
            'auth_key',
            'perusahaan',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
            'idrole',
        ],
    ]) ?>

</div>
