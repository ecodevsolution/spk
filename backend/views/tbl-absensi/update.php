<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblAbsensi */

$this->title = 'Edit Absensi: ' . $model->idabsensi;
$this->params['breadcrumbs'][] = ['label' => 'Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idabsensi, 'url' => ['view', 'id' => $model->idabsensi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-absensi-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
