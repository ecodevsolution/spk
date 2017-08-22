<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\TblSpk;

/* @var $this yii\web\View */
/* @var $model backend\models\TblJadwal */

$this->title = $model->idjadwal;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jadwal-view">
    <?php
        $mode = TblSpk::findOne($model->idspk);
    ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->idjadwal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->idjadwal], [
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
            'idjadwal',
            'idspk',
            [
                'label' => 'Tanggal Mulai',
                'value' => date('d-m-Y',strtotime($mode->tgl_mulai))
            ],
            [
                'label' => 'Tanggal Selesai',
                'value' => date('d-m-Y',strtotime($mode->tgl_selesai))
            ],
            'status_jadwal',
        ],
    ]) ?>

</div>
