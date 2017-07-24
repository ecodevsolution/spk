<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPenawaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Penawarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-penawaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Penawaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpenawaran',
             [
				'attribute'=>'request',
				'value'=>'tblRequest.nama_pekerjaan',
			],
            'total_penawaran',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
