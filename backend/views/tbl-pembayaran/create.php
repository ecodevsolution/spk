<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPembayaran */

$this->title = 'Create Tbl Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pembayaran-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'noInvoice'=>$noInvoice,
    ]) ?>

</div>
