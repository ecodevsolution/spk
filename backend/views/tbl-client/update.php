<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblClient */

$this->title = 'Update Data Client: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-client-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
