<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblRequest */

$this->title = 'Update Tbl Request: ' . $model->idrequest;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Request', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idrequest, 'url' => ['view', 'id' => $model->idrequest]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'req' => $req,
    ]) ?>

</div>
