<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPenawaran */

$this->title = 'Update Tbl Penawaran: ' . $model->idpenawaran;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Penawarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpenawaran, 'url' => ['view', 'id' => $model->idpenawaran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-penawaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetail' => (empty($modeldetail)) ? [new TblDetailpenawaean] : $modeldetail,
    ]) ?>

</div>
