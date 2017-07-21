<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblRequest */

$this->title = 'Create Form Request';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-request-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
