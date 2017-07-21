<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblJadwal */

$this->title = 'Update Tbl Jadwal: ' . $model->idjadwal;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjadwal, 'url' => ['view', 'id' => $model->idjadwal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-jadwal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
