<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPenggajianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-penggajian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idgaji') ?>

    <?= $form->field($model, 'idabsensi') ?>

    <?= $form->field($model, 'total_gaji') ?>

    <?= $form->field($model, 'tgl_gaji') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
