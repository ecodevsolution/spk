<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblRole */

$this->title = 'Create Tbl Role';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-role-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
