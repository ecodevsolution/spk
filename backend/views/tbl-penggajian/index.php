<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPenggajianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Penggajians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-penggajian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Penggajian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idgaji',
            'idabsensi',
            'total_gaji',
            'tgl_gaji',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
