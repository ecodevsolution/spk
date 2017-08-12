<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Form Request';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="display:inline">
        <?= Html::a('Create Form Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     <p style="float:right">
        <?= Html::a('', ['cetak'], ['class' => 'fa fa-file-pdf-o fa-2x']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idrequest',
            [
				'attribute'=>'client',
				'value'=>'userForm.name',
			],
            'nama_pekerjaan',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
