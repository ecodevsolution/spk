<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblJadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jadwal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="display:inline">
        <?= Html::a('Tambah Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     <p style="float:right">
        <?= Html::a('', ['cetak'], ['class' => 'fa fa-file-pdf-o fa-2x']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjadwal',
            'idspk',
            'status_jadwal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
