<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblAbsensi */

$this->title = 'Update Tbl Absensi: ' . $model->idabsensi;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Absensis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idabsensi, 'url' => ['view', 'id' => $model->idabsensi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-absensi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
