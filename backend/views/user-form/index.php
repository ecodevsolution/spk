<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="display:inline">
        <?= Html::a('Create Data Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p style="float:right">
        <?= Html::a('', ['cetak'], ['class' => 'fa fa-file-pdf-o fa-2x']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'idjabatan',
            // 'idrole',
            'username',
            'name',
            // 'no_ktp',
            // 'alamat_ktp',
            // 'alamat',
            // 'tgl_lahir',
            'jenis_kelamin',
            // 'agama',
             'no_telp',
            // 'auth_key',
            // 'idclient',
            // 'perusahaan',
            // 'password_hash',
            // 'password_reset_token',
             'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
