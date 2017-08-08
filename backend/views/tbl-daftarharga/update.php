<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDaftarharga */

$this->title = 'Update Daftar Harga: ' . $model->kode_pekerjaan;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Daftarharga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_pekerjaan, 'url' => ['view', 'id' => $model->kode_pekerjaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-daftarharga-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
