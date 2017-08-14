<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPembayaran */

$this->title = 'Tambah Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pembayaran-create">

    <h2><?= Html::encode($this->title) ?></h2> 

    <?= $this->render('_form', [
        'model' => $model,
        'noInvoice'=>$noInvoice,
    ]) ?>

</div>
