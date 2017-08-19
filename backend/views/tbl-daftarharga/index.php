<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblDaftarhargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Harga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-daftarharga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Daftar Harga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'kode_pekerjaan',
            'item_pekerjaan',            
             [
				'attribute' =>  'harga_pekerjaan',
				'format' => 'raw',
				'value' => function ($model) {		 
					return  'Rp. '.number_format($model->harga_pekerjaan,0,".",".");
				
				},
			],	
            'satuan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
