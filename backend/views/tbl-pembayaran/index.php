<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Pembayarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpembayaran',
            'idspk',
            'tgl_bayar',
            'total_bayar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
