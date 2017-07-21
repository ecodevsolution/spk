<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSpk */

$this->title = 'Update Tbl Spk: ' . $model->idspk;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Spks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idspk, 'url' => ['view', 'id' => $model->idspk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-spk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetail' => (empty($modeldetail)) ? [new TblDetailspk] : $modeldetail,
    ]) ?>

</div>
