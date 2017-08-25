<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPenawaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penawaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-penawaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
        if(Yii::$app->user->identity->idrole == 1){
    ?>
    <p>
        <?= Html::a('Tambah Tbl Penawaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        
            [
				'attribute' =>  'idpenawaran',
				'format' => 'raw',
				'value' => function ($model) {		 
					return  '<a href="?r=tbl-penawaran/cetak&id='.$model->idpenawaran.'">'.$model->idpenawaran.'</a>';
				
				},
			],	
             [
				'attribute'=>'request',
				'value'=>'tblRequest.nama_pekerjaan',
			],
            [
				'attribute' =>  'total_penawaran',
				'format' => 'raw',
				'value' => function ($model) {		 
					return  'Rp. '.number_format($model->total_penawaran,0,".",".");
				
				},
			],	

            ['class' => 'yii\grid\ActionColumns'],
        ],
    ]); ?>
</div>
