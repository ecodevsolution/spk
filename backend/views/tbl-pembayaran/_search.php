<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPembayaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pembayaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpembayaran') ?>

    <?= $form->field($model, 'idspk') ?>

    <?= $form->field($model, 'tgl_bayar') ?>

    <?= $form->field($model, 'total_bayar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
