<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblRequest */

$this->title = 'Edit Data Request: ' . $model->idrequest;
$this->params['breadcrumbs'][] = ['label' => 'Request Pekerjaan', 'url' => ['index']];
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
