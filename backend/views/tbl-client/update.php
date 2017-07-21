<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblClient */

$this->title = 'Update Tbl Client: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-client-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
