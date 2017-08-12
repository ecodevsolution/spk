<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblSpkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Spk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-spk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Spk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
             [
				'attribute' =>  'idspk',
				'format' => 'raw',
				'value' => function ($model) {		 
					return  '<a href="?r=tbl-spk/cetak&id='.$model->idspk.'">'.$model->idspk.'</a>';
				
				},
			],                       
            'area_pekerjaan',
            'tgl_mulai',
            'tgl_selesai',
            // 'harga_pekerjaan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
