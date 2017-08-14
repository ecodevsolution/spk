<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblRole */

$this->title = 'Edit Role: ' . $model->idrole;
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idrole, 'url' => ['view', 'id' => $model->idrole]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
