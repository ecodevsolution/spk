<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSpk */

$this->title = 'Edit SPK: ' . $model->idspk;
$this->params['breadcrumbs'][] = ['label' => 'Surat Perintah Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idspk, 'url' => ['view', 'id' => $model->idspk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-spk-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetail' => (empty($modeldetail)) ? [new TblDetailspk] : $modeldetail,
    ]) ?>

</div>
