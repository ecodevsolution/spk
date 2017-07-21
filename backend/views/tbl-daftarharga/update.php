<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDaftarharga */

$this->title = 'Update Tbl Daftarharga: ' . $model->kode_pekerjaan;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Daftarhargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_pekerjaan, 'url' => ['view', 'id' => $model->kode_pekerjaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-daftarharga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
