<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPenggajian */

$this->title = 'Update Tbl Penggajian: ' . $model->idgaji;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Penggajians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idgaji, 'url' => ['view', 'id' => $model->idgaji]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-penggajian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
