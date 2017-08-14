<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDaftarharga */

$this->title = 'Edit Daftar Harga: ' . $model->kode_pekerjaan;
$this->params['breadcrumbs'][] = ['label' => 'Master Daftar harga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_pekerjaan, 'url' => ['view', 'id' => $model->kode_pekerjaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-daftarharga-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
