<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPembayaran */

$this->title = 'Update Tbl Pembayaran: ' . $model->idpembayaran;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpembayaran, 'url' => ['view', 'id' => $model->idpembayaran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pembayaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
