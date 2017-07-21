<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSpkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-spk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idspk') ?>

    <?= $form->field($model, 'idpegawai') ?>

    <?= $form->field($model, 'idpenawaran') ?>

    <?= $form->field($model, 'area_pekerjaan') ?>

    <?php // echo $form->field($model, 'tgl_mulai') ?>

    <?php // echo $form->field($model, 'tgl_selesai') ?>

    <?php // echo $form->field($model, 'harga_pekerjaan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
