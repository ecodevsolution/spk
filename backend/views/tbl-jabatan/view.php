<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblJabatan */

$this->title = $model->idjabatan;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jabatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->idjabatan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->idjabatan], [
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
            'idjabatan',
            'nama_jabatan',
             [
                'attribute' =>  'gaji',
                'format' => 'raw',
                'value' => function ($model) {       
                    return  'Rp. '.number_format($model->gaji,0,".",".");
                
                },
            ],
        ],
    ]) ?>

</div>
