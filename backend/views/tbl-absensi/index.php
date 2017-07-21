<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblAbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Absensis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-absensi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Absensi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idabsensi',
            'idspk',
            'verifikasi_1',
            'verifikasi_2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
