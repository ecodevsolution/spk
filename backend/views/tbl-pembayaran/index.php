<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

              [
				'attribute' =>  'idpembayaran',
				'format' => 'raw',
				'value' => function ($model) {		 
					return  '<a href="?r=tbl-pembayaran/cetak&id='.$model->idpembayaran.'">'.$model->idpembayaran.'</a>';
				
				},
			],               
            'idspk',
            'tgl_bayar',            
            [
				'attribute' =>  'total_bayar',
				'format' => 'raw',
				'value' => function ($model) {		 
					return  'Rp. '.number_format($model->total_bayar,0,".",".");
				
				},
			],

            ['class' => 'yii\grid\ActionColumns'],
        ],
    ]); ?>
</div>
