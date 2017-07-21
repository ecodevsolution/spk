<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDaftarhargaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-daftarharga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_pekerjaan') ?>

    <?= $form->field($model, 'item_pekerjaan') ?>

    <?= $form->field($model, 'harga_pekerjaan') ?>

    <?= $form->field($model, 'satuan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
