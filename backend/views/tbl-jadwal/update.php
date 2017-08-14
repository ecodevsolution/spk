<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblJadwal */

$this->title = 'Edit Jadwal: ' . $model->idjadwal;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjadwal, 'url' => ['view', 'id' => $model->idjadwal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-jadwal-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
