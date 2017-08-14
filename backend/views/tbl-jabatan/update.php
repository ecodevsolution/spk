<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblJabatan */

$this->title = 'Edit Jabatan: ' . $model->idjabatan;
$this->params['breadcrumbs'][] = ['label' => 'Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjabatan, 'url' => ['view', 'id' => $model->idjabatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-jabatan-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
