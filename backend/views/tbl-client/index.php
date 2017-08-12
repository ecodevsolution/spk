<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Client';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <p style="display:inline">
        <?= Html::a('Create data Client', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'username',
            // 'idjabatan',
            // 'idrole',
            'name',
            // 'no_ktp',
            // 'alamat_ktp',
            // 'alamat',
            // 'tgl_lahir',
             'jenis_kelamin',
            // 'agama',
            'perusahaan',
            'no_telp',
            'email:email',
            // 'password_hash',
            // 'auth_key',
            // 'password_reset_token',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
