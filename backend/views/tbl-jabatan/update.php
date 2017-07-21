<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblJabatan */

$this->title = 'Update Tbl Jabatan: ' . $model->idjabatan;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjabatan, 'url' => ['view', 'id' => $model->idjabatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-jabatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
